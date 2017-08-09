<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$kd_brg		= mysql_real_escape_string($_POST['kd_brg']);
	$name_acc	= mysql_real_escape_string($_POST['acc_name']);
	$jlh_unit 	= mysql_real_escape_string($_POST['jpn']);
	$min_stok 	= mysql_real_escape_string($_POST['minjpn']);
	$harga_perunit  = mysql_real_escape_string($_POST['hpn']);

	$cekVendor = mysql_query("SELECT * FROM tb_stok WHERE kd_brg='$kd_brg'");
	$r = mysql_fetch_array($cekVendor);
	$g = mysql_num_rows($cekVendor);

	if ($g < 1) {
		$data = mysql_query("INSERT INTO tb_stok SET kd_brg='$kd_brg', jlh_stok = $jlh_unit, 
			stok_min = $min_stok, harga_perunit = $harga_perunit") or die(mysql_error());

		$data2 = mysql_query("INSERT INTO tb_detailacc SET kd_brg='$kd_brg',
			nama_acc = '$name_acc'") or die(mysql_error());
	}else{
		$upStok = $r['jlh_stok'] + $jlh_unit;
		$data = mysql_query("UPDATE tb_stok SET jlh_stok = $upStok WHERE kd_brg='$kd_brg'");
		$data2 = mysql_query("UPDATE tb_detailacc SET nama_acc = '$name_acc'  
			WHERE kd_brg='$kd_brg'") or die(mysql_error());
	}

	if ($data && $data2) {
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/stok-aksesoris/sukses'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/stok-aksesoris/gagal'</script>";
	}
}
?>