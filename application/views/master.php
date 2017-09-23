<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $this->e($title)?></title>
		<link rel='icon' type='image/jpeg' href="<?php echo base_url('resources/images/site-ico-2.png')?>" />
		<link rel="stylesheet" href="<?php echo base_url('resources/bootstrap/dist/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/font-awesome/css/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/nprogress/nprogress.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/datetimepicker/build/css/bootstrap-datetimepicker.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/toastr/toastr.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/font-awesome/css/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/switchery/dist/switchery.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('public/css/custom.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('public/css/comun.css')?>">
		<?php echo $this->section('extra_style')?>
	</head>
	<body class="nav-md">

		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="<?php echo site_url('Inicio') ?>" class="site_title"><img src="<?php echo base_url('resources/images/site-ico.png')?>" class="img-responsive" alt="..."></a>
						</div>
						<div class="clearfix"></div>
						<!-- menu profile quick info -->
						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="<?php echo base_url('resources/images/user.png')?>" alt="..." class="img-circle profile_img">
							</div>
							<div class="profile_info">
								<span>Bienvenido,</span>
								<h2><?php echo $_SESSION['nickname'] ?></h2>
							</div>
							<div class="clearfix"></div>
						</div>
						<!-- /menu profile quick info -->
						<br />
						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<h3>Menu principal</h3>
								<ul class="nav side-menu">
									<li><a><i class="fa fa-line-chart"></i> Clientes <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="<?php echo site_url('Inicio/Top5') ?>">Top 5</a></li>
											<li><a href="<?php echo site_url('Inicio/calendarioMensual') ?>">Calendario Mensual</a></li>
											<li><a href="<?php echo site_url('Inicio/estadisticasMensuales') ?>">Estadísticas Mensuales</a></li>
											<li><a href="<?php echo site_url('Inicio/estadisticasAnuales') ?>">Estadísticas Anuales</a></li>
										</ul>
									</li>
									<li><a><i class="fa fa-cogs"></i> Administración <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="<?php echo site_url('Administracion/Clientes') ?>">Clientes</a></li>
											<li><a href="<?php echo site_url('Administracion/Top5') ?>">Top 5</a></li>
											<li><a href="<?php echo site_url('Administracion/Estadisticas') ?>">Estadísticas</a></li>
											<li><a href="#">Usuarios</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<!-- /sidebar menu -->
					</div>
				</div>
				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<nav>
							<div class="nav toggle">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>
							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<img src="<?php echo base_url('resources/images/user.png')?>" alt=""><?php echo $_SESSION['nickname'] ?>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li><a href="javascript:;"> Perfil</a></li>
										<li><a href="javascript:;">Ayuda</a></li>
										<li><a href="<?php echo site_url('Login/Salir') ?>"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->

				<!-- page content -->
				<?php echo $this->section('page')?>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						rompemurosmx Copyright © 2017. All Right Reserved.
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>
		<script src="<?php echo base_url('resources/jquery/dist/jquery.min.js')?>"></script>
		<script src="<?php echo base_url('resources/bootstrap/dist/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('resources/fastclick/lib/fastclick.js')?>"></script>
		<script src="<?php echo base_url('resources/nprogress/nprogress.js')?>"></script>
		<script src="<?php echo base_url('resources/moment/min/moment.min.js')?>"></script>
		<script src="<?php echo base_url('resources/moment/locale/es.js')?>"></script>
		<script src="<?php echo base_url('resources/datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>
		<script src="<?php echo base_url('resources/Chart.js/dist/Chart.min.js')?>"></script>


		<!-- jQuery Sparklines -->
		<script src="<?php echo base_url('resources/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
		<!-- Flot -->
		<script src="<?php echo base_url('resources/Flot/jquery.flot.js')?>"></script>
		<script src="<?php echo base_url('resources/Flot/jquery.flot.pie.js')?>"></script>
		<script src="<?php echo base_url('resources/Flot/jquery.flot.time.js')?>"></script>
		<script src="<?php echo base_url('resources/Flot/jquery.flot.stack.js')?>"></script>
		<script src="<?php echo base_url('resources/Flot/jquery.flot.resize.js')?>"></script>
		<!-- Flot plugins -->
		<script src="<?php echo base_url('resources/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
		<script src="<?php echo base_url('resources/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
		<script src="<?php echo base_url('resources/flot.curvedlines/curvedLines.js')?>"></script>

		<!-- DateJS -->
		<script src="<?php echo base_url('resources/DateJS/build/date.js')?>"></script>

		<script src="<?php echo base_url('resources/toastr/toastr.min.js')?>"></script>
		<script src="<?php echo base_url('resources/switchery/dist/switchery.min.js')?>"></script>
		<script src="<?php echo base_url('/public/js/custom.js')?>"></script>
		<script src="<?php echo base_url('/public/js/comun.js')?>"></script>
		<?php echo $this->section('extra_js')?>
	</body>
</html>
