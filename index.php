<?php  

$token = '1527145402:AAEp7sF_daSULJruolH4zr11f7OQE7o7_YY';

$link1 = 'https://api.telegram.org/bot' . $token;

$updates = file_get_contents('php://input');
$updates = json_decode($updates, TRUE);

$msgID = $updates['message']['from']['id'];
$name = $updates['message']['from']['first_name'];
$text = $updates['message']['text'];

switch ($text) {
	case '/start':
		sendmsg($msgID, "Welcome $name");
		break;
	case 'hello':
		sendmsg($msgID, "Hello $name");
		break;
}


function sendmsg($msgID, $text) {
	$url = $GLOBALS[link1] . '/sendMessage?chat_id=' . $msgID . '&text=' . urldecode($text);
	file_get_contents($url);
}



?>