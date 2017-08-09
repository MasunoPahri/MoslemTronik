<?php
include dirname(__DIR__).'/connect.php';
$user = $_GET['user'];

$data = mysql_query("SELECT *
	FROM tb_users INNER JOIN tb_detailuser
	ON tb_users.id_user = tb_detailuser.ref_idUser
	WHERE username = '$user'");
$r = mysql_fetch_array($data);

$dlt = mysql_query("DELETE FROM tb_users WHERE username='$r[username]'");
$dlt = mysql_query("DELETE FROM tb_detailuser WHERE ref_idUser='$r[ref_idUser]'");

//echo $user;
echo "<script>window.location.href = 'http://localhost/mtronik/userlist'</script>";
?>