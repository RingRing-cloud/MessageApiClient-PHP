<?php namespace RingRing\Common;

	class Authentication {
	
		private $apiKey;

		public function __construct($apiKey) {
			$this->apiKey = $apiKey;
		}
		
		public function getApiKey() {
			return $this->apiKey;
		}

	}

?>