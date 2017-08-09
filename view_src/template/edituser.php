<?php
if (isset($_SESSION['msg'])) {
	if ($_SESSION['msg']  == "sukses") {
	?>
	<div class="alert alert-success" role="alert">Berhasil!</div>
	<?php
	}else{
	?>
		<div class="alert alert-danger" role="alert">Gagal!</div>
	<?php
	}
	unset($_SESSION['msg']);
}
$user = $_GET['user'];
?>
<div class="page-header">
	<h1>
		Ubah Profil <?php echo $user; ?>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
			<?php
			$usr = mysql_query("SELECT tb_users.id_user, username, 
				password, role, email, phone, fb, avatar 
				FROM tb_users INNER JOIN tb_detailuser
				ON tb_users.id_user = tb_detailuser.ref_idUser
				WHERE username='$user'");
			$r = mysql_fetch_array($usr);
			?>
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">
						Nama Pengguna</label>

					<div class="col-sm-9">
						<input type="text" name="username" required
							class="col-xs-10 col-sm-5" id="form-field-icon-1"
							value="<?php echo $r['username']; ?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">
						Email</label>

					<div class="col-sm-9">
						<input type="email" name="email" required
							class="col-xs-10 col-sm-5" id="form-field-icon-1" 
							value="<?php echo $r['email']; ?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">
						No. Hp / WA</label>

					<div class="col-sm-9">
						<input type="text" name="phone" required
							class="col-xs-10 col-sm-5" id="form-field-icon-1" 
							value="<?php echo $r['phone']; ?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">
						Facebook (opsional)</label>

					<div class="col-sm-9">
						<input type="text" name="userfb"
							class="col-xs-10 col-sm-5" id="form-field-icon-1" 
							value="<?php echo $r['fb']; ?>" />
					</div>
				</div>

				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-info" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Simpan
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