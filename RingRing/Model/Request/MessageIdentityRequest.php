<?php namespace RingRing\Model\Request;

	class MessageIdentityRequest extends BaseRequest {

		private $messageID;
		
		public function MessageIdentityRequest(int $messageID) {
			$this->messageID = $messageID;
			
		}
		
	}

?>