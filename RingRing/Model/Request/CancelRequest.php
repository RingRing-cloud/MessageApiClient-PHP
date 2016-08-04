<?php namespace RingRing\Model\Request;

	class CancelRequest extends BaseRequest {
		
		public $messageID;
		
		function __construct($param = array()) {
			$this->messageID = $param['messageID'] ?? null;
		}
		
	}

?>