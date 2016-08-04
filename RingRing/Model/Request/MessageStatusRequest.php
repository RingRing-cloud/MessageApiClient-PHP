<?php namespace RingRing\Model\Request;

	class MessageStatusRequest extends BaseRequest {
		
		public $messageID;
		
		function __construct($param = array()) {
			$this->messageID = $param['messageID'] ?? null;
		}
		
	}

?>