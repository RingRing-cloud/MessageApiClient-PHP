<?php namespace RingRing\Common;

	use RingRing\Exceptions\HTTPException;
	use RingRing\Util\Debug;

	class HTTPClient {
		
		private $url;
		private $version;
		private $authentication;
		
		function __construct($endpoint, $target = "V1") {
			self::setEndpoint($endpoint, $target);
		}
		
		public function setEndpoint($endpoint, $target) {
			$this->url = sprintf($endpoint, $target);
		}
		
		public function setVersion($version) {
			$this->version = $version;
		}
		
		public function setAuthentication(Authentication $authentication) {
			$this->authentication = $authentication;
		}
		
		public function getAuthenticationKey() {
			return $this->authentication->getApiKey();
		}
		
		public function doPostRequest($data, string $endpoint) {
			Debug::dump($data, "Request");
			$curl = curl_init($this->url.$endpoint);
					
			curl_setopt($curl, CURLOPT_HEADER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				"User-Agent: API ".$this->version." - PHP ".phpversion(),
				"Content-Type: application/json",
				"Content-Charset : UTF-8",
				"Accepts: application/json",
				"Accept-Charset: UTF-8"
			));
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 10);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
			
			// Some servers have outdated or incorrect certificates, Use the included CA-bundle
			$certificate = realpath(dirname(__FILE__) . "/ca-bundle.crt");
			if ( ! file_exists($certificate)) {
				throw new HttpException('Unable to find CA-bundle file: ' . $certificate);
			}
			curl_setopt($curl, CURLOPT_CAINFO, $certificate);
			
			$response = curl_exec($curl);
			
			if ($response === false) {
				throw new HTTPException(curl_error($curl), curl_errno($curl));
			}
			
			$responseStatus = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);

			// Split the header and body
			$parts = explode("\r\n\r\n", $response, 3);
			list($responseHeader, $responseBody) = ($parts[0] == 'HTTP/1.1 100 Continue') ? array ($parts[1], $parts[2]) : array ($parts[0], $parts[1]);

			curl_close($curl);
			
			return array('status' => $responseStatus, 'header' => $responseHeader, 'body' => $responseBody);
		}
		
	}

?>