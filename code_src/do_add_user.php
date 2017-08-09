<?php
include dirname(__DIR__).'/connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = mysql_real_escape_string($_POST['username']);
	$role = mysql_real_escape_string($_POST['role']);
	$pass = mysql_real_escape_string($_POST['password']);
	$repass = mysql_real_escape_string($_POST['repass']);
	$email = mysql_real_escape_string($_POST['email']);
	$phone = mysql_real_escape_string($_POST['phone']);
	$fb = mysql_real_escape_string($_POST['userfb']);

	function createSalt()
	{
	    $string = md5(uniqid(rand(), true));
	    return substr($string, 0, 8);
	}
	
	if ($pass == $repass) {
		$hash = hash('sha256', $pass);
		$salt = createSalt();
		$hash = hash('sha256', $salt . $hash);
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/userlist/gagal'</script>";
	}


	$data = mysql_query("INSERT INTO tb_users SET username='$username', password='$hash', 
		salt='$salt', role='$role'") or die(mysql_error());

	$dataUser = mysql_query("SELECT * FROM tb_users WHERE username='$username'") or die(mysql_error());
	$get = mysql_fetch_array($dataUser);
	$id_ref = $get['id_user'];

	$data2 = mysql_query("INSERT INTO tb_detailuser SET email='$email', phone='$phone', fb='$fb', 
		ref_idUser='$id_ref'") or die(mysql_error());

	if ($data && $data2) {
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/userlist/sukses'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/userlist/gagal'</script>";
	}
}
	

?>