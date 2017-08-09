<?php 
session_start();
include 'urlsegment.php';
include dirname(__DIR__).'../connect.php';
$base_url = "http://localhost/mtronik/";

?>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Moeslim Tronik</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<?php include dirname(__DIR__).'/view_src/partials/styles.php'; ?>
		<script src="view_src/assets/js/jquery-2.1.4.min.js"></script>
	</head>
	<?php
	if ($segmen3 != "login" && isset($_SESSION['role'])) {
	?>
	<body class="no-skin">
		<?php include dirname(__DIR__).'/view_src/partials/navbar.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<a href="#" class="menu-toggler invisible" id="menu-toggler" data-target="#sidebar"></a>

			<?php include dirname(__DIR__).'/view_src/partials/sidebar.php'; ?>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<?php //include 'partials/pageSettings.php'; ?>
						<?php include dirname(__DIR__).'/view_src/router.php'; ?>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include dirname(__DIR__).'/view_src/partials/footer.php'; ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<?php include dirname(__DIR__).'/view_src/partials/scripts.php'; ?>
		
	</body>
	<?php
	}
	else{
		$partialsDir = dirname(__DIR__);
		include dirname(__DIR__).'/code_src/Do_login.php';
		include dirname(__DIR__).'/view_src/template/userlogin.php';
	}
	?>
</html>