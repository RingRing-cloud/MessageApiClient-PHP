<?php namespace RingRing\Model\Request;


	class IncomingMessageStatusRequest extends BaseRequest {
		
		private $maxRecords;

		function __construct($param = array()) {
			
			$this->maxRecords = $param['maxRecords'] ?? null;
			
		}

	}
	
?>