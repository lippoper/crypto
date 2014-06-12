<?php

$url = "http://pubapi.cryptsy.com/api.php?method=singlemarketdata&marketid=";

if(isset($_POST['marketid'])) {
	$marketid = $_POST['marketid'];
	$url .= $marketid;
	header('Content-type: application/xml');
	echo file_get_contents($url);
}
else {
	$url .= "132"; // Default DOGE market id
	header('Content-type: application/xml');
	echo "$url";
}
?>