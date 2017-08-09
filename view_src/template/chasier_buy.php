<div class="page-header">
	<div class="row">
		<div class="col-md-6">
			<h1>
				Transaksi Pembelian
			</h1>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-5">
					<h5>Total Belanja: <b id="viewCash">0</b></h5>
				</div>
				<div class="col-md-4">
					<input type="number" class="form-control" id="putCash" 
					    placeholder="Jumlah uang (Rp.)" >
				</div>
				<div class="col-sm-3">
					<button class="btn btn-block btn-success btn-bold bayar">
						<i class="ace-icon fa fa-floppy-o bigger-120"></i>
						Bayar
					</button>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
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
			
			<div class="row itemBrg">
				<div class="col-sm-7">
					<label for="form-field-select-3">Nama Barang</label>
					<select class="chosen-select form-control itemUnits" id="form-field-select-3" 
						data-placeholder="Pilih vendor..." name="vendor[]" required>
						<option data-brg="1">-Pilih Barang-</option>
						<?php
						$data = mysql_query("SELECT *
								FROM tb_stok INNER JOIN tb_detailvendor
								ON tb_stok.kd_brg=tb_detailvendor.kd_brg");
						while ($get = mysql_fetch_array($data)) {
						?>
						<option 
							data-kd = "<?php echo $get['kd_brg']; ?>"
							data-brg= "<?php echo $get['nama_vendor'].'#'.$get['kuota'].'GB' ?>"
							data-price="<?php echo $get['harga_perunit']; ?>"
							value="<?php echo $get['nama_vendor'].'#'.$get['kuota'].'GB - '.$get['harga_perunit']; ?>">
							<?php 
							echo $get['nama_vendor'].' '.$get['kuota'].'GB - ';
							echo 'Rp.'.$get['harga_perunit'].' --- ';
							echo '<b>(Stok: '.$get['jlh_stok'].')</b>'; 
							?>
						</option>
						<?php
						}
						$data2 = mysql_query("SELECT *
								FROM tb_stok INNER JOIN tb_detailhp
								ON tb_stok.kd_brg=tb_detailhp.kd_brg");
						while ($get2 = mysql_fetch_array($data2)) {
						?>
						<option 
							data-kd = "<?php echo $get2['kd_brg']; ?>"
							data-brg= "<?php echo $get2['merk_hp'].'#'.$get2['tipe'] ?>"
							data-price="<?php echo $get2['harga_perunit']; ?>"
							value="<?php echo $get2['merk_hp'].'#'.$get2['tipe'].' - '.$get2['harga_perunit']; ?>">
							<?php 
							echo $get2['merk_hp'].' '.$get2['tipe'].' - ';
							echo 'Rp.'.$get2['harga_perunit'].' --- ';
							echo '<b>(Stok: '.$get2['jlh_stok'].')</b>'; 
							?>
						</option>
						<?php
						}
						$data3 = mysql_query("SELECT *
								FROM tb_stok INNER JOIN tb_detailacc
								ON tb_stok.kd_brg=tb_detailacc.kd_brg");
						while ($get3 = mysql_fetch_array($data3)) {
						?>
						<option 
							data-kd = "<?php echo $get3['kd_brg']; ?>"
							data-brg= "<?php echo $get3['nama_acc'].'#'.$get3['kd_brg'] ?>"
							data-price="<?php echo $get3['harga_perunit']; ?>"
							value="<?php echo $get3['merk_hp'].'#'.$get3['kd_brg'].' - '.$get3['harga_perunit']; ?>">
							<?php 
							echo $get3['nama_acc'].' '.$get3['kd_brg'].' - ';
							echo 'Rp.'.$get3['harga_perunit'].' --- ';
							echo '<b>(Stok: '.$get3['jlh_stok'].')</b>'; 
							?>
						</option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-sm-1">
					<label>Banyak</label>
					<input name="unit[]" class="unitBrg form-control" required type="number">
				</div>
				<div class="col-sm-2">
					<br>
					<div class="space-2"></div>
					<button class="btn btn-block btn-info btn-round addBrg">
						<i class="ace-icon fa fa-plus "></i>
						Tambahkan
					</button>
				</div>
				<div class="col-sm-2">
					<br>
					<div class="space-2"></div>
					<button class="btn btn-block btn-white btn-danger btn-round dltBrg">
						<i class="ace-icon fa fa-times red2"></i>
						Hapus
					</button>
				</div>
			</div>

			<div class="space-4"></div><div class="space-4"></div>

			<div class="row dataBrg">
				<div class="col-md-12">
					<table id="simple-table" class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 65%">Nama Barang</th>
								<th style="width: 18%">Harga Satuan</th>
								<th style="width: 12%">Jumlah Barang</th>
								<th style="width: 4%; text-align:center">
									<label>
										<input name="form-field-checkbox" type="checkbox" class="ace select_all">
										<span class="lbl"></span>
									</label>
								</th>
							</tr>
						</thead>
						<tbody class="allItems">
						</tbody>
					</table>
				</div>
			</div>

			<form class="formDataBrg" method="post">
				<input type="hidden" name="cash" id="cash">
			</form>
			
			<div id="dialog-confirm" class="hide">
				<div class="alert alert-info bigger-110">
					Pastikan barang yang dibeli sudah benar.
				</div>

				<div class="space-6"></div>

				<p class="bigger-110 bolder center grey">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					Apakah anda yakin?
				</p>
			</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->