<?php
include 'urlsegment.php';

switch ($segmen3) {
	case 'logout':
		include '../code_src/logout.php';
		break;

	case 'testPrint':
		include '../code_src/esc-pos/example/receipt-with-logo.php';
		break;

	case 'saveTransc':
		include '../code_src/doBuy.php';
		break;

	case 'profil':
		include 'template/profil.php';
		break;

	case 'ubah-password':
		include '../code_src/Do_changePass.php';
		include 'template/changePass.php';
		break;

	case 'ubah-profil':
		include '../code_src/Do_editUser.php';
		include 'template/edituser.php';
		break;

	case 'hapus':
		include '../code_src/hapusUser.php';
		break;

	case 'stok-kartu':
		include '../code_src/Do_stok_kartu.php';
		include 'template/input_stok_kartu.php';
		break;
	
	case 'stok-hp':
		include '../code_src/Do_stok_hp.php';
		include 'template/input_stok_hp.php';
		break;

	case 'stok-aksesoris':
		include '../code_src/Do_stok_aksesoris.php';
		include 'template/input_stok_aksesoris.php';
		break;

	case 'pembelian':
		include 'template/chasier_buy.php';
		break;

	case 'retur':
		include '../code_src/Do_retur.php';
		include 'template/chasier_retur.php';
		break;

	case 'kategori-kartu':
		include '../code_src/Do_add_kategori.php';
		include 'template/kategori_kartu.php';
		break;

	case 'kategori-hp':
		include '../code_src/Do_add_kategori.php';
		include 'template/kategori_hp.php';
		break;

	case 'list-pembelian':
		//include '../code_src/Do_add_kategori.php';
		include 'template/listTransaksi.php';
		break;

	case 'list-retur':
		//include '../code_src/Do_add_kategori.php';
		include 'template/listTransaksi.php';
		break;

	case 'userlist':
		include '../code_src/do_add_user.php';
		include 'template/userlist.php';
		break;

	default:
		if ($_SESSION['role'] != "kasir") {
			include 'template/beranda.php';
			break;
		}else{
			echo "<script>window.location.href = 'http://localhost/mtronik/pembelian'</script>";
		}
}

?>