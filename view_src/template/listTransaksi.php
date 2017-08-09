<div class="page-header">
	<div class="row">
		<div class="col-sm-8">
			<h1>
				Transaksi
				<?php
				$actived = split('-', $segmen3);
				echo $actived[1];
				?>
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Daftar Transaksi
				</small>
			</h1>
		</div>
		<div class="col-sm-2 col-sm-offset-2">
			<button type="button" class="dateRange btn btn-white btn-info btn-bold">
				<i class="ace-icon fa fa-calendar bigger-120 blue"></i>
				Pilih Tanggal
			</button>
		</div>

	</div>
</div><!-- /.page-header -->

<?php
if ($actived[1] == "pembelian") {
	$transType = "buy";
}else{
	$transType = "back";
}
?>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div id="timeline-1">
			<div class="row">
				<div class="list col-xs-12 col-sm-10 col-sm-offset-1">
					<?php
					if ($actived[1] == "pembelian") {
						include dirname(__DIR__).'/partials/buy_timeline.php';
					}else{
						include dirname(__DIR__).'/partials/retur_timeline.php';
					}
					?>

				</div>
			</div>
		</div>

		<div id="dialog-confirm2" class="hide">
			<?php
			$startDate = 1; $endDate = 31;
			$month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Julu',
				'Agustuis', 'September', 'Oktober', 'November', 'Desember'];
			$startYear = 1970; $endYear = 2100;
			?>
			<form class="formTgl" method="post">
				<div class="col-xs-8 col-sm-12">
					<select name="date" class="form-control">
						<option value="">Tanggal</option>
						<?php
						for ($i=$startDate; $i <= $endDate ; $i++) { 
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
						}

						if ($actived[1] == "pembelian") {
						?>
						<input type="hidden" name="j_trans" value="buy">
						<?php
						}else{
						?>
						<input type="hidden" name="j_trans" value="back">
						<?php
						}
						?>
					</select>
					<div class="space-6"></div>
					<select name="month" class="form-control">
						<option value="">Bulan</option>
						<?php
						for ($i=0; $i < count($month) ; $i++) { 
						?>
						<option value="<?php echo $i+1; ?>"><?php echo $month[$i]; ?></option>
						<?php
						}
						?>
					</select>
					<div class="space-6"></div>
					<select name="year" class="form-control">
						<option value="">Tahun</option>
						<?php
						for ($i=$endYear; $i >= $startYear ; $i--) { 
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</form>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->