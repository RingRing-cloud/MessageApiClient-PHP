<?php namespace RingRing\Services;
	
	use RingRing\Common\HTTPClient;
	use RingRing\Exception\AuthenticationException;
	use RingRing\Model\Request\MessageRequest;
	use RingRing\Model\Request\CancelRequest;
	use RingRing\Model\Request\MessageStatusRequest;
	use RingRing\Model\Request\OutgoingMessageStatusRequest;
	use RingRing\Model\Request\IncomingMessageStatusRequest;
	use RingRing\Util\Debug;
	use RingRing\Util\Converter;
	
	/**
	 * MessageService provide method for calling The RingRing MessageAPI.
	 * This is not the entry point for user. the class RingRing\Client is the correct entry point.
	 * @Author Pirotte Ludovic - The RingRing Company
	**/
	
	class MessageService {
		
		private $httpClient;
		
		/**
		 * Constructor
		**/
		function __construct($httpClient) {
			$this->httpClient = $httpClient;
		}
		
		/**
		 * Send a message SMS.
		 * @param $request The MessageRequest datamodel.
		 * @return Return the response on JSON format.
		**/
		function sendMessage(MessageRequest $request) {
			$json = self::formatRequest($request);
			return $this->httpClient->doPostRequest($json, "/Message")['body'];
		}
		
		/**
		 * Cancel a specified message if it isn't yet delivered.
		 * @param $request The CancelRequest datamodel
		 * @return Return the response on JSON format
		**/
		function cancelMessage(CancelRequest $request) {
			$json = self::formatRequest($request);
			return $this->httpClient->doPostRequest($json, "/Cancel")['body'];
		}
		
		/**
		 * Retrieve the status of a speficied message.
		 * @param $request The MessageStatusRequest datamodel.
		 * @return Return the response on JSON format.
		**/
		function getMessageStatus(MessageStatusRequest $request) {
			$json = self::formatRequest($request);
			return $this->httpClient->doPostRequest($json, "/StatusMessage")['body'];
		}
		
		/**
		 * Retrieve the status of a list of outgoing messages.
		 * @param $request The OutgoingStatusRequest datamodel.
		 * @return Return the response on JSON format.
		**/
		function getOutgoingMessageStatus(OutgoingMessageStatusRequest $request) {
			$json = self::formatRequest($request);
			return $this->httpClient->doPostRequest($json, "/Status")['body'];
		}
		
		/**
		 * Retrieve the status of a list of incoming messages.
		 * @param $request The IncomingStatusRequest datamodel.
		 * @return Return the response on JSON format.
		**/
		function getIncomingMessageStatus(IncomingMessageStatusRequest $request) {
			$json = self::formatRequest($request);
			return $this->httpClient->doPostRequest($json, "/Incoming")['body'];
		}
		
		
		// format object into json filtering null values.
		private function formatRequest($request) {
			$request->setApiKey($this->httpClient->getAuthenticationKey());
			return Converter::toJSON($request, array('NOT_NULL'=>true));
		}
		
	}

?>