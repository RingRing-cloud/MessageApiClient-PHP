<?php namespace RingRing\Model\Request;

	class MessageRequest extends BaseRequest {
		
		public $to;
		public $message;
		public $from;
		public $senderID;
		public $timeValidity;
		public $timeScheduled;
		public $reference;
		public $replaceIfPresent;
		public $statusURL;
		public $statusMethod;
		public $statusFormat;
		public $messageEncoding;
		
		function __construct($param = array()) {
			$this->to = $param['to'] ?? null;
			$this->message = $param['message'] ?? null;
			$this->from = $param['from'] ?? null;
			$this->senderID = $param['senderID'] ?? null;
			$this->timeValidity = $param['timeValidity'] ?? null;
			$this->timeScheduled = $param['timeScheduled'] ?? null;
			$this->reference = $param['reference'] ?? null;
			$this->replaceIfPresent = $param['replaceIfPresent'] ?? null;
			$this->statusURL = $param['statusURL'] ?? null;
			$this->statusMethod = $param['statusMethod'] ?? null;
			$this->statusFormat = $param['statusFormat'] ?? null;
			$this->messageEncoding = $param['messageEncoding'] ?? null;
		}
		
	}

?>