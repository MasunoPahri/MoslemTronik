<?php
if (isset($_SESSION['msg'])) {
	if ($_SESSION['msg']  == "sukses") {
	?>
	<div class="alert alert-success" role="alert">Stok kartu berhasil ditambahkan!</div>
	<?php
	}else{
	?>
		<div class="alert alert-danger" role="alert">Stok kartu gagal ditambahkan!</div>
	<?php
	}
	unset($_SESSION['msg']);
}
?>
<div class="page-header">
	<h1>
		Stok Barang
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Input stok kartu paket
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<form class="form-horizontal" role="form" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" 
					for="form-field-select-1">Nama Vendor</label>
				<div class="col-sm-9">
					<select class="col-xs-10 col-sm-5" name="vendor" id="vendor">
						<option value="">-Pilih Vendor-</option>
						<?php
						$vendor = mysql_query("SELECT * FROM tb_katevendor WHERE jns_brg='kartu'");
						while ($get = mysql_fetch_array($vendor)) {
						?>
						<option value="<?php echo $get['kd_brg'].'_'.$get['vendor']; ?>">
							<?php echo $get['vendor']; ?>
						</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Jumlah Kuota (GB)</label>

				<div class="col-sm-9">
					<input type="text" name="kuota" class="col-xs-10 col-sm-5" id="kuota" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Jumlah Stok Kartu (Unit)</label>

				<div class="col-sm-9">
					<input type="number" name="jpn" class="col-xs-10 col-sm-5" id="unit" />
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Stok Minimal</label>

				<div class="col-sm-9">
					<input type="text" name="minjpn" class="col-xs-10 col-sm-5" id="stokmin" />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" 
					for="form-field-1">Harga per unit (Rp)</label>
				<div class="col-sm-9">
					<input type="text" name="hpn" id="hpn" class="col-xs-10 col-sm-5" />
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Tambahkan
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>
		</form>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="page-header">
	<h1>
		Stok Barang
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Daftar stok kartu paket
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				Results for "Latest Registered Domains"
			</div>

			<!-- div.table-responsive -->

			<!-- div.dataTables_borderWrap -->
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</th>
							<th>Kartu Paket</th>
							<th>
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Stok Minimal
							</th>
							<th>Stok Tersedia</th>
							<th class="hidden-480">Harga per Unit</th>

							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php
						$kartu = mysql_query("SELECT * FROM tb_stok INNER JOIN tb_detailvendor
							ON tb_stok.kd_brg = tb_detailvendor.kd_brg
							ORDER BY tb_stok.jlh_stok");
						while ($get = mysql_fetch_array($kartu)) {
						?>
						<tr>
							<td style="display: none;"></td>
							<td class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								<a href="#">
									<?php echo $get['nama_vendor']." ".$get['kuota']."GB"; ?>
								</a>
							</td>
							<td><b><?php echo $get['stok_min']; ?></b></td>
							<td><b>
								<?php 
								if ($get['jlh_stok'] <= $get['stok_min']) {
								?>
								<span class="red">
									<?php echo $get['jlh_stok']; ?>
								</span>
								<?php
								}else{
								?>
								<span class="green">
									<?php echo $get['jlh_stok']; ?>
								</span>
								<?php
								}
								?></b>
							</td>
							<td>Rp. <?php echo $get['harga_perunit']; ?></td>

							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="#">
										<i class="ace-icon fa fa-search-plus bigger-130"></i>
									</a>

									<a class="green" href="#">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="#">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>

								<div class="hidden-md hidden-lg">
									<div class="inline pos-rel">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
													<span class="blue">
														<i class="ace-icon fa fa-search-plus bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>	
						<?php
						}
						?>

					</tbody>
				</table>
			</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->