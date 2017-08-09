<?php
if (isset($_SESSION['msg'])) {
	if ($_SESSION['msg']  == "sukses") {
	?>
		<div class="alert alert-success" role="alert">Transaksi Berhasil!</div>
	<?php
	}else{
	?>
		<div class="alert alert-danger" role="alert">Transaksi Gagal!</div>
	<?php	
	}
	unset($_SESSION['msg']);
}
?>
<div class="alert alert-danger checkField hide" role="alert">Pastikan tidak ada field yang kosong!</div>
<form action="#" class="formItem kartu" name="brg" method="post">
	<div id="acc" class="itemBuy">
		<div class="row itemBrg">
			<div class="col-sm-4">
				<label for="form-field-select-3">Kartu Paket</label>
				<select class="chosen-select form-control" id="form-field-select-3" 
					data-placeholder="Pilih vendor..." name="vendor[]" required>
					<option data-brg="1" id="default">-Pilih Vendor-</option>
					<?php
					$data = mysql_query("SELECT *
							FROM tb_stokkartu INNER JOIN tb_katevendor
							ON tb_stokkartu.vendor=tb_katevendor.kd_vendor");
					while ($get = mysql_fetch_array($data)) {
					?>
					<option 
						data-brg= "<?php echo $get['id_kartu']; ?>"
						data-price="<?php echo $get['harga_perunit']; ?>"
						value="<?php echo $get['vendor'].'#'.$get['kuota'].'GB - '.$get['harga_perunit']; ?>">
						<?php 
						echo $get['vendor'].$get['kuota'].'GB - ';
						echo 'Rp.'.$get['harga_perunit'].' --- ';
						echo '<b>(Stok: '.$get['unit'].')</b>'; 
						?>
					</option>
					<?php
					}
					?>
				</select>
			</div>
			<div class="col-sm-2">
				<label for="unit">Banyak</label>
				<input name="unit[]" class="form-control unitBrg" id="acc" required type="number">
			</div>
			<div class="col-sm-2">
				<br>
				<div class="space-2"></div>
				<button id="btnCancel" class="btn btn-white btn-danger btn-round">
					<i class="ace-icon fa fa-times red2"></i>
					Cancel
				</button>
			</div>
		</div>
		<div class="space-4"></div>
	</div>

	<div class="row barang">
	</div>

	<div class="space-4"></div>
	<div class="row item">
		<div class="col-sm-3">
			<label for="unit">Total Belanja (Rp)</label>
			<input id="viewGrand" name="viewGrand" disabled 
				class="form-control" type="number">
			<input id="grand" name="grand" 
				class="form-control" type="hidden">
		</div>
	</div>

	<div class="space-4"></div>
	<div class="row item">
		<div class="col-sm-3">
			<label for="unit">Tunai (Rp)</label>
			<input id="cash" name="cash" required class="form-control" type="number">
		</div>
	</div>
	<input type="hidden" value="acc" name="barang">
</form>

<p>
	<button type="button" id="acc" class="btn btn-white btn-primary addMore">
		<i class="ace-icon fa fa-plus bigger-120"></i>
		Tambah Barang
	</button>

	<button type="button" id="acc" class="btn btn-white btn-success bayar">
		<i class="ace-icon fa fa-dollar bigger-120 green2"></i>
		Bayar
	</button>
</p>