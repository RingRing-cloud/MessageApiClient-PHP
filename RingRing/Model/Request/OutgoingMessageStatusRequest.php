<?php namespace RingRing\Model\Request;


	class OutgoingMessageStatusRequest extends BaseRequest {
		
		public $maxRecords;

		function __construct($param = array()) {
			
			$this->maxRecords = $param['maxRecords'] ?? null;
			
		}

	}
	
?>