<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Rompe-Muros</title>
		<link rel='icon' type='image/jpeg' href="<?php echo base_url('resources/images/site-ico-2.png')?>" />
		 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		<link rel="stylesheet" href="<?php echo base_url('resources/bootstrap/dist/css/bootstrap.min.css') ?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/font-awesome/css/font-awesome.min.css') ?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/form-elements.css') ?>">
		<link rel="stylesheet" href="<?php echo base_url('public/css/login.css') ?>">
	</head>
	<body>
		<div class="top-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 text">
						<h1><strong>Rompe Muros</strong> Marketing Digital</h1>
						<div class="description">
							<strong>ROMPE LOS MUROS QUE CUBREN TU EMPRESA DE TU MERCADO</strong>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 form-box">
						<div class="form-top">
							<div class="form-top-left">
								<h3><strong>Acceso al sitio</strong></h3>
								<p><strong>Ingresa tu usuario y contraseña para acceder:</strong></p>
							</div>
							<div class="form-top-right">
								<i class="fa fa-lock"></i>
							</div>
						</div>
						<div class="form-bottom">
							<form role="form" action="Login/Acceder" method="post" class="login-form">
								<div class="form-group">
									<label class="sr-only" for="cve_usuario">Username</label>
									<input type="text" name="cve_usuario" id="cve_usuario" placeholder="Usuario..." class="form-username form-control">
								</div>
								<div class="form-group">
									<label class="sr-only" for="contrasenia">Contraseña</label>
									<input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña..." class="form-password form-control">
								</div>
								<button type="submit" class="btn"><strong>Acceder</strong> <i class="fa fa-sign-in"></i></button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 social-login">
						<h3>Visitanos en nuestras redes sociales:</h3>
						<div class="social-login-buttons">
							<a class="btn btn-link-2" href="https://www.facebook.com/" target="_blank">
								<i class="fa fa-facebook"></i> Facebook
							</a>
							<a class="btn btn-link-2" href="https://twitter.com/?lang=es" target="_blank">
								<i class="fa fa-twitter"></i> Twitter
							</a>
							<a class="btn btn-link-2" href="https://plus.google.com/" target="_blank">
								<i class="fa fa-google-plus"></i> Google Plus
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url('resources/jquery/dist/jquery.min.js')?>"></script>
		<script src="<?php echo base_url('resources/bootstrap/dist/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('resources/jquery.backstretch.min.js')?>"></script>
		<script src="<?php echo base_url('public/js/login.js')?>"></script>
		<div class="backstretch" style="background-color: #2A3F54; left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 589px; width: 1349px; z-index: -999999; position: fixed;"><img src="<?php echo base_url('resources/images/login-bg-5.png') ?>" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1349px; height: 899.333px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -155.167px;"></div>
	</body>
</html>