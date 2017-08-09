<?php 
if (!isset($_SESSION['msg'])) {
	session_start();
}
$page = htmlentities(stripcslashes($_GET['pg']));
$msg = htmlentities(stripcslashes($_GET['msg']));

$_SESSION['msg'] = $msg;
$msg2 = $_SESSION['msg'];
// echo $page

header("Location: ../../".$page);
?>