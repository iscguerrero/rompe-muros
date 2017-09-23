<?php $this->layout('master', ['title'=>'rompe-muros::Inicio'])?>
<?php $this->start('extra_style')?>
<?php $this->stop()?>
<?php $this->start('page')?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h2>Top 5 de las Mejores Publicaciones</h2><small>A continuación, las publicaciones más destacadas del mes...</small></h2>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-facebook"></i> Facebook</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-xs-12 col-lg-4" id="seccionUnoF"></div>
							<div class="col-xs-12 col-lg-4" id="seccionDosF"></div>
							<div class="col-xs-12 col-lg-4" id="seccionTresF"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-twitter"></i> Twitter</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-xs-12 col-lg-4" id="seccionUnoT"></div>
							<div class="col-xs-12 col-lg-4" id="seccionDosT"></div>
							<div class="col-xs-12 col-lg-4" id="seccionTresT"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-instagram"></i> Instagram</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-xs-12 col-lg-4" id="seccionUnoI"></div>
							<div class="col-xs-12 col-lg-4" id="seccionDosI"></div>
							<div class="col-xs-12 col-lg-4" id="seccionTresI"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// Obtenemos el top5 de las publicaciones del usuario logueado
		tf = ajax('../Top5/obtenerTop5', null);
		fPublicaciones = tf.f;
		tPublicaciones = tf.t;
		iPublicaciones = tf.i;
		// Pintamos el top5 de las publicaciones
		$('#seccionUnoF').html(
			(typeof fPublicaciones[0] != 'undefined' ? fPublicaciones[0].codigo : '' + '<hr>') +
			(typeof fPublicaciones[3] != 'undefined' ? fPublicaciones[3].codigo : '')
		);
		$('#seccionDosF').html(
			(typeof fPublicaciones[1] != 'undefined' ? fPublicaciones[1].codigo : '' + '<hr>') +
			(typeof fPublicaciones[4] != 'undefined' ? fPublicaciones[4].codigo : '')
		);
		$('#seccionTresF').html(typeof fPublicaciones[2] != 'undefined' ? fPublicaciones[2].codigo : '' + '<hr>');

		$('#seccionUnoT').html(
			(typeof tPublicaciones[0] != 'undefined' ? tPublicaciones[0].codigo : '' + '<hr>') +
			(typeof tPublicaciones[3] != 'undefined' ? tPublicaciones[3].codigo : '')
		);
		$('#seccionDosT').html(
			(typeof tPublicaciones[1] != 'undefined' ? tPublicaciones[1].codigo : '' + '<hr>') +
			(typeof tPublicaciones[4] != 'undefined' ? tPublicaciones[4].codigo : '')
		);
		$('#seccionTresT').html(typeof tPublicaciones[2] != 'undefined' ? tPublicaciones[2].codigo : '' + '<hr>');

		$('#seccionUnoI').html(
			(typeof iPublicaciones[0] != 'undefined' ? iPublicaciones[0].codigo : '' + '<hr>') +
			(typeof iPublicaciones[3] != 'undefined' ? iPublicaciones[3].codigo : '')
		);
		$('#seccionDosI').html(
			(typeof iPublicaciones[1] != 'undefined' ? iPublicaciones[1].codigo : '' + '<hr>') +
			(typeof iPublicaciones[4] != 'undefined' ? iPublicaciones[4].codigo : '')
		);
		$('#seccionTresI').html(typeof iPublicaciones[2] != 'undefined' ? iPublicaciones[2].codigo : '' + '<hr>');

	});
</script>
<?php $this->stop()?>