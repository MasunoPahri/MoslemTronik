<?php
$dat = $_POST['date'];
$bln = $_POST['month'];
$thn = $_POST['year'];
$jtr = $_POST['j_trans'];

if ($jtr == "buy") {
	$tblName = "tb_transaksi";
}else{
	$tblName = "tb_retur";
}

if (count($bln) == 1) {
	$bln = '0'.$bln;
}

$dt_tgl = $thn.'-'.$bln.'-'.$dat;
//echo $dt_tgl;

include dirname(__DIR__).'/connect.php';
$tperDay = mysql_query("SELECT DISTINCT(DATE(buy_at)) AS tgl FROM $tblName
	WHERE buy_at LIKE '$dt_tgl%'
	ORDER BY buy_at DESC");
while ($show = mysql_fetch_array($tperDay)) {
$tgl = $show['tgl'];
$tgl = date('d-M-Y', strtotime($tgl));
?>
<div class="timeline-container">
	<div class="timeline-label">
		<span class="label label-primary arrowed-in-right label-lg">
			<b><?php echo $tgl; ?></b>
		</span>
	</div>

	<div class="timeline-items">
		<?php
		$transaksi = mysql_query("SELECT * FROM $tblName 
			WHERE buy_at LIKE '$show[tgl]%'
			ORDER BY buy_at DESC");
		while ($get=mysql_fetch_array($transaksi)) {
		?>
		<div class="timeline-item clearfix">
			<div class="timeline-info">
				<img alt="Susan't Avatar" src="view_src/assets/images/avatars/avatar1.png" />
				<span class="label label-info label-sm">
					<?php 
						$time = $get['buy_at'];
						echo date('H:i', strtotime($time)); 
					?>
				</span>
			</div>

			<div class="widget-box transparent">
				<div class="widget-header widget-header-small">
					<h5 class="widget-title smaller">
						<a href="#" class="blue"><?php echo $get['nama_kasir']; ?></a>
						<span class="grey">menangani pembelian produk</span>
					</h5>

					<span class="widget-toolbar no-border">
						<span>
							<i class="ace-icon fa fa-times red bigger-125"></i>
						</span>
					</span>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php 
							echo $get['nama_brg']."<br>"; 
							echo $get['unit']." Buah";
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div><!-- /.timeline-items -->
</div><!-- /.timeline-container -->
<?php
}
?>