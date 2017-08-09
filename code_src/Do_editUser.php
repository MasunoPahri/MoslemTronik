<?php
include dirname(__DIR__).'/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = $_GET['user'];
	$uname = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$phone = mysql_real_escape_string($_POST['phone']);
	$usrfb = mysql_real_escape_string($_POST['userfb']);

	$data = mysql_query("UPDATE tb_users INNER JOIN tb_detailuser
				ON tb_users.id_user = tb_detailuser.ref_idUser
				SET tb_users.username='$uname', tb_detailuser.email='$email', 
				tb_detailuser.phone='$phone', tb_detailuser.fb='$usrfb'
				WHERE username='$user'") or die(mysql_error());

	if ($data) {
		echo "<script>window.location.href = 'http://localhost/mtronik/userlist'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/userlist'</script>";
	}
}
?>