<?php
include dirname(__DIR__).'/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name 	= mysql_real_escape_string($_POST['name']);
	$jpn 	= mysql_real_escape_string($_POST['jpn']);
	$renew 	= mysql_real_escape_string($_POST['renew']);
	$ket 	= mysql_real_escape_string($_POST['ket']);
	$kasir 	= $_SESSION['user'];

	$data = mysql_query("INSERT INTO tb_retur SET nama_brg='$name',
		 unit=$jpn, nama_kasir='$kasir', brg_renew='$renew', keterangan='$ket'") or die(mysql_error());

	if ($data) {
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/retur/sukses'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/retur/gagal'</script>";
	}
}
?>