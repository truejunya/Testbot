<?php
 
$data = file_get_contents('php://input');
$data = json_decode($data, true);
  

function sendTelegram($method, $response)
{
	$ch = curl_init('https://api.telegram.org/bot1642222509:AAHGvcpHjEMeaSZRNUZvpHL3QaON-odQ0tY/' . $method);  
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);
	curl_close($ch); 
	return $res;
}
 
		sendTelegram(
			'ForwardMessage', 
			array(
				'chat_id' => $data['message']['chat']['id'],
				'from_chat_id' => $data['message']['chat']['id'],
				'message_id' => $data['message']['message_id']
			)
		);
 
		exit();	
	 
?>