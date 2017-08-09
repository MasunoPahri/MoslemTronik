<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$vendor		= mysql_real_escape_string($_POST['vendor']);
	$kuota		= mysql_real_escape_string($_POST['kuota']);
	$jlh_unit 		= mysql_real_escape_string($_POST['jpn']);
	$min_stok 		= mysql_real_escape_string($_POST['minjpn']);
	$harga_perunit  = mysql_real_escape_string($_POST['hpn']);

	$vendName = split("_", $vendor);
	$new_kd_brg = $vendName['0'].$kuota;

	$cekVendor = mysql_query("SELECT * FROM tb_stok WHERE kd_brg='$new_kd_brg'");
	$r = mysql_fetch_array($cekVendor);
	$g = mysql_num_rows($cekVendor);

	//CEK JIKA ADA NAMA VENDOR YANG SAMA, MAKA JUMLAH STOK AKAN DI UPADATE
	//JIKA TIDAK MAKA AKAN DITAMBAHKAN RECORD BARU
	if ($g < 1) {
		$data = mysql_query("INSERT INTO tb_stok SET kd_brg='$new_kd_brg', jlh_stok = $jlh_unit, 
			stok_min = $min_stok, harga_perunit = $harga_perunit") or die(mysql_error());
		$data2 = mysql_query("INSERT INTO tb_detailvendor SET kd_brg='$new_kd_brg', 
			nama_vendor = '$vendName[1]', kuota = '$kuota'") or die(mysql_error());
	}else{
		$upKuota = $r['jlh_stok'] + $jlh_unit;
		$data = mysql_query("UPDATE tb_stok SET jlh_stok = $upKuota WHERE kd_brg='$new_kd_brg'");
		$data2 = mysql_query("UPDATE tb_detailvendor SET kd_brg='$new_kd_brg', 
			nama_vendor = '$vendName[1]', kuota = '$kuota' WHERE kd_brg='$new_kd_brg'") or die(mysql_error());
	}

	if ($data && $data2) {
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/stok-kartu/sukses'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/stok-kartu/gagal'</script>";
	}
}
?>