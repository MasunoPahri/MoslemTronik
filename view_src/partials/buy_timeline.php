<?php
$tperDay = mysql_query("SELECT DISTINCT(DATE(buy_at)) AS tgl FROM tb_transaksi
	ORDER BY buy_at DESC 
	LIMIT 20");
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
		$transaksi = mysql_query("SELECT * FROM tb_transaksi 
			WHERE buy_at LIKE '$show[tgl]%'
			ORDER BY buy_at DESC");
		while ($get=mysql_fetch_array($transaksi)) {
		$users = mysql_query("SELECT tb_users.id_user, avatar 
			FROM tb_users INNER JOIN tb_detailuser
			ON tb_users.id_user = tb_detailuser.ref_idUser
			WHERE username = '$get[nama_kasir]'");
		$r = mysql_fetch_array($users);
		?>
		<div class="timeline-item clearfix">
			<div class="timeline-info">
				<img alt="Susan't Avatar" 
					src="<?php echo $base_url ?>view_src/assets/images/avatars/avatar
					<?php echo $r['avatar']; ?>.png" />
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
						<span class="grey">
							menangani pembelian produk
						</span>
					</h5>
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