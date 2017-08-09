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
		Ganti Password <?php echo $user; ?>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<form class="form-horizontal changepass" role="form" method="post">
			<input type="hidden" name="user" value="<?php echo $user; ?>">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Password Lama</label>

				<div class="col-sm-9">
					<input type="password" name="oldpass" class="col-xs-10 col-sm-5"/>
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Password Baru</label>

				<div class="col-sm-9">
					<input type="password" name="newpass" class="col-xs-10 col-sm-5"/>
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right"
					for="form-field-icon-1">Konfirmasi Password Baru</label>

				<div class="col-sm-9">
					<input type="password" name="renewpass" class="col-xs-10 col-sm-5"/>
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Ganti Password
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn showPass" type="button">
						<i class="ace-icon fa fa-eye bigger-110"></i>
						<span id="text">Lihat</span> Password
					</button>
				</div>
			</div>
		</form>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->