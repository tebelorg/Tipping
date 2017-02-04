<?php

/* TA.PING SCRIPT TO CHECK WEBSITE OR WEBSERVICE AVAILABILITY ~ TEBEL.ORG */

// set what site to check and what string to check for
$URL = $argv[1]; $CHECK = $argv[2];

// alternative usage to call directly from web url instead
// $URL = $_GET['URL']; $CHECK = $_GET['CHECK'];

// call helper to fetch website in html and without cache
$content = get_data($URL); // echo $content . "\n"; // for debugging

// check for presence of string on webpage
if (strpos($content, $CHECK) !== false)
	echo date('Y-m-d H:i:s') . " - PASS\n"; // show timestamp
else
{
	echo date('Y-m-d H:i:s') . " - FAIL\n"; // show timestamp
	$_GET['OUTPUT'] = "TEXT"; // set mail result output as text
	$_GET['SENDTO'] = "your_email@gmail.com"; // set to alert recipient
	$_GET['SENDFROM'] = "Your Name <your_email@gmail.com>"; // set from
	$_GET['SUBJECT'] = $URL . " down"; // set subject for email alert
	// set message in email alert below or leave commented for no email body
	// $_GET['MESSAGE'] = "Cannot find '" . $CHECK . "' at " . $URL . " website.";
	sendmail_service();
}

/* SENDMAIL SERVICE */
function sendmail_service() { // call mailer REST API to send email
	$_GET['APIKEY'] = "random_long_string_mailer_api_key";
	ob_start(); include('/full_path_on_your_server/mailer.php');
	$php_result = ob_get_contents(); ob_end_clean(); echo $php_result;
}

/* GET DATA FROM URL */
function get_data($url) {
	$ch = curl_init();
	$timeout = 60;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$headers = array("Cache-Control: no-cache","Pragma: no-cache");	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

?>
