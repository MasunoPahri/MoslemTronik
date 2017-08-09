<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$kd_kategori = mysql_real_escape_string($_POST['code']);
	$vendor = mysql_real_escape_string($_POST['vendor']);
	$jns_brg = mysql_real_escape_string($_POST['jns']);
	//echo $base_url;
	$insert = mysql_query("INSERT INTO tb_katevendor SET vendor = '$vendor', 
		kd_brg = '$kd_kategori', jns_brg = '$jns_brg'");

	if ($insert) {
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/kategori-".$jns_brg."/sukses'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/kategori-".$jns_brg."/gagal'</script>";
	}
}

?>