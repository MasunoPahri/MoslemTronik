<?php
$url = explode("/",$_SERVER["REQUEST_URI"]);

$segmen1   = '';
$segmen2   = '';
$segmen3   = '';
$segmen4   = '';
$segmen5   = ''; 
$segmen6   = ''; 

if(isset($url[0])) {
	$segmen1   = $url[0];
}
if(isset($url[1])) {
	$segmen2   = $url[1];
}
if(isset($url[2])) {
	$segmen3   = $url[2];
}
if(isset($url[3])) {
	$segmen4   = $url[3];
}
if(isset($url[4])) {
	$segmen5   = $url[4];
}
if(isset($url[5])) {
	$segmen6   = $url[5]; 
}

?>