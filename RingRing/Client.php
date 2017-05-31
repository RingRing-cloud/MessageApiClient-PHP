<?php namespace RingRing;
	
	use RingRing\Common\HTTPClient;
	use RingRing\Common\Authentication;
	use RingRing\Model\Request\MessageRequest;
	use RingRing\Model\Request\CancelRequest;
	use RingRing\Model\Request\MessageStatusRequest;
	use RingRing\Model\Request\OutgoingMessageStatusRequest;
	use RingRing\Model\Request\IncomingMessageStatusRequest;
	use RingRing\Services\MessageService;
	
	const ENDPOINT = "https://api.ringring.be/sms/%s";
	const VERSION = "1.1.0";
	
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
		
		public function sendMessage(MessageRequest $request) {
			return $this->messageService->sendMessage($request);
		}
		
		public function cancelMessage(CancelRequest $request) {
			return $this->messageService->cancelMessage($request);
		}
		
		public function getOutgoingMessageStatus(OutgoingMessageStatusRequest $request) {
			return $this->messageService->getOutgoingMessageStatus($request);
		}
		
		public function getIncomingMessageStatus(IncomingMessageStatusRequest $request) {
			return $this->messageService->getIncomingMessageStatus($request);
		}
		
		public function getMessageStatus(MessageStatusRequest $request) {
			return $this->messageService->getMessageStatus($request);
		}
		
	}

?>
