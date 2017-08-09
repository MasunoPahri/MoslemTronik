<div id="sidebar" class="sidebar responsive-min ace-save-state sidebar-fixed">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<?php 
	if ($_SESSION['role'] == "kasir") {
	?>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a href="<?php echo $base_url; ?>pembelian" class="btn btn-success">
				<i class="ace-icon fa fa-dollar"></i>
			</a>

			<a href="<?php echo $base_url; ?>retur" class="btn btn-info">
				<i class="ace-icon fa fa-reply"></i>
			</a>

			<a href="#" class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</a>

			<a href="#" class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</a>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->
	<?php
	}if ($_SESSION['role'] == "manajer") {
	?>
	<ul class="nav nav-list">
		<li class="">
			<a href="<?php echo $base_url; ?>">
				<i class="menu-icon fa fa-desktop"></i>
				<span class="menu-text"> Beranda </span>
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-download"></i>
				<span class="menu-text">
					Stok Barang
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="<?php echo $base_url; ?>stok-kartu">
						<i class="menu-icon fa fa-caret-right"></i>
						Kartu Paket
					</a>
				</li>

				<li class="">
					<a class="dropdown-toggle" href="#">
						<i class="menu-icon fa fa-caret-right"></i>
						HP & Aksesoris

						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li class="">
							<a href="<?php echo $base_url; ?>stok-hp">
								<i class="menu-icon fa fa-caret-right"></i>
								Handphone
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="<?php echo $base_url; ?>stok-aksesoris">
								<i class="menu-icon fa fa-caret-right"></i>
								Aksesoris
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Transaksi </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo $base_url; ?>list-pembelian">
						<i class="menu-icon fa fa-caret-right"></i>
						Pembelian
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo $base_url; ?>list-retur">
						<i class="menu-icon fa fa-caret-right"></i>
						Retur
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Kategori </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo $base_url; ?>kategori-kartu">
						<i class="menu-icon fa fa-caret-right"></i>
						Kartu Paket
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo $base_url; ?>kategori-hp">
						<i class="menu-icon fa fa-caret-right"></i>
						Handphone
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="<?php echo $base_url; ?>userlist">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Daftar Pengguna </span>
			</a>

			<b class="arrow"></b>
		</li>
	</ul><!-- /.nav-list -->
	<?php
	}
	?>

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<div class="sidebar-toggle sidebar-expand" id="sidebar-expand">
		<i class="ace-icon fa fa-angle-double-right" data-icon1="ace-icon fa fa-angle-double-right" data-icon2="ace-icon fa fa-angle-double-left"></i>
	</div>
</div>