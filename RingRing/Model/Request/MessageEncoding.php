<?php namespace RingRing\Model\Request;

	class MessageEncoding {
		
		static $unicode;
		static $gsm;
		
		private $value;
		
		function __construct($value) {
			$this->value = $value;
		}
		
		public function value() {
			return $this->value;
		}
		
	}
	
	MessageEncoding::$gsm = new MessageEncoding(0);
	MessageEncoding::$unicode = new MessageEncoding(8);
	
?>