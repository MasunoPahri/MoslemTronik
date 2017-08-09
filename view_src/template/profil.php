<?php
if (isset($_SESSION['msg'])) {
	if ($_SESSION['msg']  == "sukses") {
	?>
	<div class="alert alert-success" role="alert">Berhasil diganti!</div>
	<?php
	}else{
	?>
		<div class="alert alert-danger" role="alert">Gagal diganti!</div>
	<?php
	}
	unset($_SESSION['msg']);
}
$user = $_GET['user'];
?>
<div class="page-header">
	<h1>
		Profil Pengguna <?php echo $user; ?>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<div class="">
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active">
							<a data-toggle="tab" href="#home">
								<i class="green ace-icon fa fa-user bigger-120"></i>
								Profil
							</a>
						</li>
					</ul>

					<div class="tab-content no-border padding-24">
						<?php 
						$profil = mysql_query("SELECT tb_users.id_user, username, 
							password, role, email, phone, fb, avatar 
							FROM tb_users INNER JOIN tb_detailuser
							ON tb_users.id_user = tb_detailuser.ref_idUser
							WHERE tb_users.username='$user'");
						$r = mysql_fetch_array($profil);
						?>
						<div id="home" class="tab-pane in active">
							<div class="row">
								<div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo $base_url ?>view_src/assets/images/avatars/profile-pic.jpg" />
									</span>

									<div class="space space-4"></div>

									<a href="<?php echo $base_url.'ubah-password/'. $user; ?>" class="btn btn-sm btn-block btn-primary">
										<i class="ace-icon fa fa-key bigger-110"></i>
										<span class="bigger-110">Ubah Password</span>
									</a>
								</div><!-- /.col -->

								<div class="col-xs-12 col-sm-9">
									<h4 class="blue">
										<span class="middle">Alex M. Doe</span>
									</h4>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Username </div>

											<div class="profile-info-value">
												<span><?php echo $user ?></span>
							
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Email </div>

											<div class="profile-info-value">
												<i class="fa fa-envelope light-orange bigger-110"></i>
												<span><?php echo $r['email'] ?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Terdaftar pada </div>

											<div class="profile-info-value">
												<span>2010/06/20</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Terakhir Online </div>

											<div class="profile-info-value">
												<span>3 hours ago</span>
											</div>
										</div>
									</div>

									<div class="hr hr-8 dotted"></div>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Website </div>

											<div class="profile-info-value">
												<a href="#" target="_blank">www.alexdoe.com</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="#">Find me on Facebook</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="#">Follow me on Twitter</a>
											</div>
										</div>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->

						</div><!-- /#home -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>