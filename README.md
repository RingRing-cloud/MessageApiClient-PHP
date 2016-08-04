# MessageApiClient for PHP

RingRing provides simple and fast API for sending and receiving text messages (SMS), calls and emails all over the world.  We take care of the telecom infrastructure and bring additional services such as Cloud Call Center solutions, Transactional emails, SIP trunking, ...

# How to use

- Contact us at sales@ringring.be, we will create an account for you.
- Once you have access to your account, you will be able to access to interface at https://portal.ringring.be. Here you will see all account information you need to send real messages through the API.
- Lastly, download the code source from Github.

# Example

```php
<?php

	require_once("lib/autoload.php");

	$client = new Client(APIKEY);
	
	try {
		$result = $client->sendMessage(
			new MessageRequest(array(
				"to" => "PHONE_NUMBER",
				"message" => "YOUR_MESSAGE",
				"timeScheduled"=> "DD/MM/YYYY"
			))
		);
	} catch(HTTPException $e) {
		// ...
	}
	
?>
```

# Version

PHP >= 7

# Installation

You have to activate the php_curl extension to use the lib.

# Documentation

http://docs.ringring.be 

