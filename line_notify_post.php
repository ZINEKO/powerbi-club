<?php
// Get POST body content
$content = htmlspecialchars($_POST["Text1"]);
$data = array('message' => $content); 

// Prepare Token
$notifyURL = "https://notify-api.line.me/api/notify";
$accToken = "SQcXQnD7tXAxd5fLzhB2PcqqMsFwu4nSipJamj4MxE4";
$headers = array(
 'Content-Type: application/x-www-form-urlencoded',
 'Authorization: Bearer '.$accToken
);

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $notifyURL);
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 2); 
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 1); 
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec( $ch );
curl_close( $ch );
 
var_dump($result);
$result = json_decode($result,TRUE);
