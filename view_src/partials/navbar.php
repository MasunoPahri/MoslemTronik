<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="<?php echo $base_url; ?>" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					Ace Admin
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<?php
				$jlhstok = mysql_query("SELECT COUNT(*) as jlh FROM tb_stok WHERE jlh_stok <= stok_min");
				$res = mysql_fetch_array($jlhstok);
				if ($res['jlh'] != 0 ) {
					$animated = "icon-animated-vertical";
				}
				?>
				<li class="purple dropdown-modal">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-envelope <?php echo $animated; ?>"></i>
						<span class="badge badge-important">
							<?php
							echo $res['jlh'];
							?>
						</span>
					</a>

					<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-envelope-o"></i>
							<?php echo $res['jlh']." Pemberitahuan Stok "; ?>
						</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar">
								<?php
								$stok = mysql_query("SELECT * FROM tb_stok INNER JOIN tb_detailvendor
									ON tb_stok.kd_brg = tb_detailvendor.kd_brg
									WHERE tb_stok.jlh_stok <= tb_stok.stok_min
									ORDER BY tb_stok.jlh_stok");
								while ($get = mysql_fetch_array($stok)) {
								?>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												Stok Kartu <?php echo $get['nama_vendor'].' '.$get['kuota']."GB"; ?>
											</span>
											<span class="pull-right badge badge-danger">
												Sisa: <?php echo $get['jlh_stok']; ?>
											</span>
										</div>
									</a>
								</li>
								<?php
								}
								?>
							</ul>
						</li>
					</ul>
				</li>

				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" 
							src="<?php echo $base_url ?>view_src/assets/images/avatars/user.jpg" />
						<span class="user-info">
							<small>Welcome,</small>
							<?php echo $_SESSION['user'] ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

						<li>
							<a href="<?php echo $base_url.'profil/'.$_SESSION['user']?>">
								<i class="ace-icon fa fa-user"></i>
								Profil
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo $base_url; ?>logout">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>