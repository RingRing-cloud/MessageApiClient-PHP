<?php namespace RingRing;
	
	use RingRing\Common\HTTPClient;
	use RingRing\Common\Authentication;
	use RingRing\Services\MessageService;
	
	const ENDPOINT = "https://api.ringring.be/sms/%s";
	const VERSION = "1.0.0";
	
	/**
	 * @package RingRing
	 * @version 1.0.0
	 * @author  The RingRing Company
	**/
	
	class Client {
					
		private $messageService;
		
		function __construct(string $apiKey, HTTPClient $httpClient = null) {
			
			$httpClient = $httpClient ?? new HTTPClient(ENDPOINT);
			$httpClient->setAuthentication(new Authentication($apiKey));
			$httpClient->setVersion(VERSION);
			
			$this->messageService = new MessageService($httpClient);
		}
		
		public function sendMessage($request) {
			return $this->messageService->sendMessage($request);
		}
		
		public function cancelMessage($request) {
			return $this->messageService->cancelMessage($request);
		}
		
		public function getOutgoingMessageStatus($request) {
			return $this->messageService->getOutgoingMessageStatus($request);
		}
		
		public function getIncomingMessageStatus($request) {
			return $this->messageService->getIncomingMessageStatus($request);
		}
		
		public function getMessageStatus($request) {
			return $this->messageService->getMessageStatus($request);
		}
		
	}

?>
