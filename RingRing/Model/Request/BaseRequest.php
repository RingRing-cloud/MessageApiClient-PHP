<?php namespace RingRing\Model\Request;

	class BaseRequest {
		
		public $apiKey;
		
		public function setApiKey(string $apiKey) {
			$this->apiKey = $apiKey;
		}
		
	}

?>