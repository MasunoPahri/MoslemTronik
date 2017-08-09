<?php
$vend = $_GET['vendor'];
include dirname(__DIR__).'/connect.php';
//echo "vendor : ".$vend;

$data = mysql_query("SELECT * FROM tb_stokkartu WHERE vendor = '$vend'");
$get = mysql_fetch_array($data);

echo json_encode($get);
?>