<?php
include dirname(__DIR__).'/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$role = mysql_real_escape_string($_POST['role']);

	function message($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$query = mysql_query("SELECT * FROM tb_users WHERE username='$username' AND role = '$role'");
	$userData = mysql_fetch_array($query);

	$hash = hash('sha256', $password);
	$salt = $userData['salt'];

	$Pass = hash('sha256', $salt.$hash);

	if ($username == $userData['username'] && $Pass == $userData['password']) {
		$secRole = message($role);
		$secName = message($username);
		$_SESSION['role'] = $secRole;
		$_SESSION['user'] = $secName;

		if ($secRole == "kasir") {
			echo "<script>window.location.href = 'http://localhost/mtronik/pembelian'</script>";
		}else{
			echo "<script>window.location.href = 'http://localhost/mtronik/'</script>";
		}
	}
}
?>