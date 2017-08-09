<?php
if (isset($_SESSION['msg'])) {
	if ($_SESSION['msg']  == "sukses") {
	?>
	<div class="alert alert-success" role="alert">Kategori hp berhasil ditambahkan!</div>
	<?php
	}else{
	?>
		<div class="alert alert-danger" role="alert">Kategori hp gagal ditambahkan!</div>
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
			Input stok hp
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<form class="form-horizontal" role="form" method="post">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Kode Barang</label>

				<div class="col-sm-9">
					<input data-rel="tooltip" type="text" required
						 placeholder="Tooltip on hover" title="" data-placement="right" 
						 data-original-title="Hanya huruf a-z & A-Z" class="col-xs-10 col-sm-5"
						 id="form-field-icon-1" name="code" >	
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">
					Merk HP</label>

				<div class="col-sm-9">
					<input type="text" name="vendor" required
						class="col-xs-10 col-sm-5" id="form-field-icon-1" />
				</div>
			</div>


			<input type="hidden" name="jns" value="hp">
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
							<th>Kode Kartu</th>
							<th>Vendor</th>

							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php
						$data = mysql_query("SELECT * FROM tb_katevendor 
							WHERE jns_brg = 'hp'
							ORDER BY id_cate DESC");
						while ($get = mysql_fetch_array($data)) {
						?>
						<tr>
							<td style="display: none;"></td>
							<td style="display: none;"></td>
							<td style="display: none;"></td>
							<td class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								<a href="#">
									<?php echo $get['kd_brg']?>
								</a>
							</td>
							<td><?php echo $get['vendor']; ?></td>

							<td>
								<div class="hidden-sm hidden-xs action-buttons">

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