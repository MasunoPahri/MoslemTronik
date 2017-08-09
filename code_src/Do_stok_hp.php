<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$vendor		= mysql_real_escape_string($_POST['vendor']);
	$tipe_hp	= mysql_real_escape_string($_POST['tipe_hp']);
	$jlh_unit 		= mysql_real_escape_string($_POST['jpn']);
	$min_stok 		= mysql_real_escape_string($_POST['minjpn']);
	$harga_perunit  = mysql_real_escape_string($_POST['hpn']);

	$vendName = split("_", $vendor);
	$new_kd_brg = $vendName['0'].$tipe_hp;

	$cekVendor = mysql_query("SELECT * FROM tb_stok WHERE kd_brg='$new_kd_brg'");
	$r = mysql_fetch_array($cekVendor);
	$g = mysql_num_rows($cekVendor);

	//echo $vendName[1].' '.$new_kd_brg.' '.$tipe_hp;

	//CEK JIKA ADA NAMA VENDOR YANG SAMA, MAKA JUMLAH STOK AKAN DI UPADATE
	//JIKA TIDAK MAKA AKAN DITAMBAHKAN RECORD BARU
	if ($g < 1) {
		$data = mysql_query("INSERT INTO tb_stok SET kd_brg='$new_kd_brg', jlh_stok = $jlh_unit, 
			stok_min = $min_stok, harga_perunit = $harga_perunit") or die(mysql_error());

		$data2 = mysql_query("INSERT INTO tb_detailhp SET kd_brg='$new_kd_brg', 
			merk_hp = '$vendName[1]', tipe = '$tipe_hp'") or die(mysql_error());
	}else{
		$upStok = $r['jlh_stok'] + $jlh_unit;
		$data = mysql_query("UPDATE tb_stok SET jlh_stok = $upStok WHERE kd_brg='$new_kd_brg'");
		$data2 = mysql_query("UPDATE tb_detailhp SET kd_brg='$new_kd_brg', 
			merk_hp = '$vendName[1]', tipe = '$tipe_hp' WHERE kd_brg='$new_kd_brg'") or die(mysql_error());
	}


	if ($data && $data2) {
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/stok-hp/sukses'</script>";
	}else{
		echo "<script>window.location.href = 'http://localhost/mtronik/redirect/stok-hp/gagal'</script>";
	}
}
?>