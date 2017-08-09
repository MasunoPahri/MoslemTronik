<?php
include dirname(__DIR__).'/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = mysql_real_escape_string($_POST['user']);
	$oldpass = mysql_real_escape_string($_POST['oldpass']);
	$newpass = mysql_real_escape_string($_POST['newpass']);
	$renewpass = mysql_real_escape_string($_POST['renewpass']);

	function createSalt()
	{
	    $string = md5(uniqid(rand(), true));
	    return substr($string, 0, 8);
	}

	//CEK KEABSAHAN PASSWORD LAMA
	$query = mysql_query("SELECT * FROM tb_users WHERE username='$user'");
	$userData = mysql_fetch_array($query);

	$hash = hash('sha256', $oldpass);
	$salt = $userData['salt'];

	$Pass = hash('sha256', $salt.$hash);

	if ($Pass == $userData['password']) {
		if ($newpass == $renewpass) {
			$newSalt = createSalt();
			$newHash = hash('sha256', $newpass);
			$thePass = hash('sha256', $newSalt.$newHash);

			$up = mysql_query("UPDATE tb_users SET password='$thePass', salt='$newSalt'
				WHERE username='$user'");
			if ($up) {
				if ($user != $_SESSION['user']) {
					echo "<script>window.location.href = 'http://localhost/mtronik/ubah-password/".$user."'</script>";
				}else{
					echo "<script>window.location.href = 'http://localhost/mtronik/logout'</script>";
				}
			}
		}
	}
}
?>