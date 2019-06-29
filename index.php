<!DOCTYPE html>
<html>
<head>
	<title>PRUEBA BOT RSS</title>
</head>
<body>
	<?php
		$botToken = "883869979:AAHz87uoLDAngUOo5FxvhzM9PuIjQDk6J3E";
		$website = "https://api.telegram.org/bot".$botToken;
	
		$update = file_get_contents('php://input');
		$update = json_decode($update, TRUE);
	
		$chatId = $update["message"]["chat"]["id"];
		$chatType = $update["message"]["chat"]["type"];
	
		$message = $update["message"]["text"];
	
		switch($message){
			case '/ayuda':
				$response = "Vale";
				sendMessage($chatId, $response);
				break;
		}
		
		function sendMessage($chatId, $response){
			$url = 	$GLOBALS[website] '/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
			file_get_contents($url);
		}
		
	?>
</body>
</html>
