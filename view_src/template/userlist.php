<?php
if (isset($_SESSION['msg'])) {
	if ($_SESSION['msg']  == "sukses") {
	?>
	<div class="alert alert-success" role="alert">Pengguna berhasil ditambahkan!</div>
	<?php
	}else{
	?>
		<div class="alert alert-danger" role="alert">Pengguna gagal ditambahkan!</div>
	<?php
	}
	unset($_SESSION['msg']);
}
?>
<div class="page-header">
	<h1>
		Admin Corner
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			kontrol admin
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<div class="">
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">

						<li class="active">
							<a data-toggle="tab" href="#friends">
								<i class="blue ace-icon fa fa-users bigger-120"></i>
								Pengguna
							</a>
						</li>
					</ul>

					<div class="tab-content no-border padding-24">
						<div id="friends" class="tab-pane in active">
							<div class="row">
								<div class="col-xs-12">
									<div class="clearfix">
										<div class="pull-right">
											<a href="#" class="addUser btn btn-primary">Tambah pengguna</a>
										</div>
									</div>
								</div>
							</div>

							<div class="space-8"></div>
							
							<div class="covCtn">
								<div class="profile-users clearfix">
									<?php
									$users = mysql_query("SELECT tb_users.id_user, username, 
										password, role, email, phone, fb, avatar 
										FROM tb_users INNER JOIN tb_detailuser
										ON tb_users.id_user = tb_detailuser.ref_idUser");
									while ($get = mysql_fetch_array($users)) {
									?>
									<div class="memberdiv col-xs-4 col-sm-1">
										<div class="inline pos-rel">
											<div class="user">
												<a href="#">
													<img src="view_src/assets/images/avatars/avatar<?php echo $get['avatar']; ?>.png" 
													alt="Bob Doe's avatar" />
												</a>
											</div>

											<div class="body">
												<div class="name">
													<a href="#" data-user="<?php echo $get['username']; ?>">
														<span class="user-status status-online"></span>
														<?php echo $get['username']; ?>
													</a>
												</div>
											</div>

											<div class="popover">
												<div class="arrow"></div>

												<div class="popover-content">
													<div class="bolder"><?php echo $get['role']; ?></div>

													<div class="time">
														<i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
														<span class="green"> 20 mins ago </span>
													</div>

													<div class="hr dotted hr-8"></div>

													<div class="tools action-buttons">
														<a href="#" class="editPass"
															data-user="<?php echo $get['username']; ?>">
															<i class="ace-icon fa fa-key light-blue bigger-150"></i>
														</a>

														<a href="#" class="delete" 
															data-user="<?php echo $get['username']; ?>">
															<i class="ace-icon fa fa-times red bigger-150"></i>
														</a>

														<a href="#" class="editProfil"
															data-user="<?php echo $get['username']; ?>">
															<i class="ace-icon fa fa-pencil blue bigger-150"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="space-6"></div>
									</div>
									<?php
									}
									?>
								</div>

								<div class="formAddUser hide">
									<h3>Tambah Pengguna</h3>
									<div class="hr hr10 hr-double"></div>
									<div class="space-8"></div>
									<form class="form-horizontal" role="form" method="post">
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Nama Pengguna</label>

											<div class="col-sm-9">
												<input type="text" name="username" required
													class="col-xs-10 col-sm-5" id="form-field-icon-1" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Peran</label>

											<div class="col-sm-9">
												<select name="role" required class="col-xs-10 col-sm-5">
													<option value="">-- Pilih Peran --</option>
													<option value="kasir">-- Kasir --</option>
													<option value="manajer">-- Manajer --</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Email</label>

											<div class="col-sm-9">
												<input type="email" name="email" required
													class="col-xs-10 col-sm-5" id="form-field-icon-1" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Kata Sandi</label>

											<div class="col-sm-9">
												<input type="password" name="password" required
													class="col-xs-10 col-sm-5" id="form-field-icon-1" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Ulangi Kata Sandi</label>

											<div class="col-sm-9">
												<input type="password" name="repass" required
													class="col-xs-10 col-sm-5" id="form-field-icon-1" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												No. Hp / WA</label>

											<div class="col-sm-9">
												<input type="text" name="phone" required
													class="col-xs-10 col-sm-5" id="form-field-icon-1" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Facebook (opsional)</label>

											<div class="col-sm-9">
												<input type="text" name="userfb"
													class="col-xs-10 col-sm-5" id="form-field-icon-1" />
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												Avatar</label>

											<div class="col-sm-9">
												<a href="#" class="btn btn-white btn-info btn-sm btn-bold">
													Pilih Avatar 
												</a>
											</div>
										</div>

										<input type="hidden" name="avatar" value="0">

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
								</div>
							</div>
						</div><!-- /#friends -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>