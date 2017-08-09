<?php
$updatedStok = $allStok = 0;
$kd_brg = $_POST['kd_brg'];
$jlh_brg = $_POST['jlh_brg'];
$barang = $_POST['item'];
$kasir = $_SESSION['user'];

include dirname(__DIR__).'/connect.php';
//include 'esc-pos/example/receipt-with-logo.php';

for ($i=0; $i < count($kd_brg); $i++) {
	$tjlh_brg = split('x', $jlh_brg[$i]);
	$njlh_brg = $tjlh_brg[0];

	$stok = mysql_query("SELECT * FROM tb_stok WHERE kd_brg = '$kd_brg[$i]'");
 	$fetch = mysql_fetch_array($stok);
	$data = mysql_query("INSERT INTO tb_transaksi SET nama_brg='$barang[$i]',
		 unit=$njlh_brg, nama_kasir='$kasir'") or die(mysql_error());

 	$updatedStok = ($fetch['jlh_stok'] - $jlh_brg[$i]);
	$update = mysql_query("UPDATE tb_stok SET jlh_stok = $updatedStok WHERE kd_brg = '$kd_brg[$i]'");
	$updatedStok = 0;
}

// if ($data && $update) {
// 	echo 1;
// }else{
// 	echo 0;
// }
?>