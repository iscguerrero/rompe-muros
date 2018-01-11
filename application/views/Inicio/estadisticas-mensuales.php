<?php $this->layout('clientes', ['title'=>'rompe-muros::Clientes'])?>
<?php $this->start('extra_style')?>

<?php $this->stop()?>
<?php $this->start('page')?>

<div id="modalAlerta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="fa fa-gears"></i> MENSAJE DEL SISTEMA</h4>
			</div>
			<div class="modal-body">
				<strong id="msjAlerta"></strong>
			</div>
		</div>
	</div>
</div>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Reporte de Estadísticas de Facebook</h3>
			</div>
		</div>
		<div class="clearfix"></div>


		<div class="x_panel">
			<div class="x_title">
				<h2>Métricas clave</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Definir periodo</a></li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<div class="row top_tiles">
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-users"></i></div>
							<div class="count">179</div>
							<h3>Fans totales</h3>
							<p>de la página.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-user-plus"></i></div>
							<div class="count">12</div>
							<h3>Nuevos usuarios</h3>
							<p>en el periodo.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-bullhorn"></i></div>
							<div class="count">1,790</div>
							<h3>Impresiones orgánicas</h3>
							<p>en el periodo.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-file-o"></i></div>
							<div class="count">7,910</div>
							<h3>Impresiones</h3>
							<p>en el periodo.</p>
						</div>
					</div>
				</div>

				<div class="row top_tiles">
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-image-o"></i></div>
							<div class="count">19</div>
							<h3>Publicaciones</h3>
							<p>en el periodo.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-comment"></i></div>
							<div class="count">124</div>
							<h3>Comentarios</h3>
							<p>en el periodo.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-share-alt"></i></div>
							<div class="count">75</div>
							<h3>Compartir</h3>
							<p>en el periodo.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-thumbs-up"></i></div>
							<div class="count">112</div>
							<h3>Me gusta</h3>
							<p>en el periodo.</p>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="x_panel">
			<div class="x_title">
				<h2>Crecimiento de fans</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Definir periodo</a></li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<div class="row tile_count text-center">

					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						<span class="count_top"><i class="fa fa-user"></i> Fans totales</span>
						<div class="count">179</div>
						<span class="count_bottom"><i class="green">14% </i> en el periodo</span>
					</div>

					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						<span class="count_top"><i class="fa fa-user-plus"></i> Fans agregados</span>
						<div class="count green">9</div>
						<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> en el periodo</span>
					</div>

					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						<span class="count_top"><i class="fa fa-user-times"></i> Fans removidos</span>
						<div class="count">2</div>
						<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>3% </i> en el periodo</span>
					</div>

					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						<span class="count_top"><i class="fa fa-user"></i> Crecimiento neto de fans</span>
						<div class="count">6</div>
						<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>24% </i> en el periodo</span>
					</div>

				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
						<canvas id="lineChart"></canvas>
					</div>
				</div>

			</div>
		</div>


		<div class="x_panel">
			<div class="x_title">
				<h2>Impresiones de la página</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Definir periodo</a></li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<div class="row top_tiles">

					<div class="animated flipInY col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-user"></i></div>
							<div class="count">1,790</div>
							<h3>Impresiones orgánicas</h3>
							<p>en el periodo.</p>
						</div>
					</div>

					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-users"></i></div>
							,<div class="count">7,210</div>
							<h3>Impresiones virales</h3>
							<p>en el periodo.</p>
						</div>
					</div>

					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-money"></i></div>
							<div class="count">12</div>
							<h3>Impresiones pagadas</h3>
							<p>en el periodo.</p>
						</div>
					</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-0 col-lg-9">
						<canvas id="lineChart2"></canvas>
					</div>
				</div>

			</div>
		</div>

		<div class="x_panel">
			<div class="x_title">
				<h2>Visitas a la página</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Definir periodo</a></li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<div class="row top_tiles">

					<div class="animated flipInY col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-search"></i></div>
							<div class="count">3,010</div>
							<h3>Visitas a la página</h3>
							<p>en el periodo.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
						<div id="chart_plot_02" class="demo-placeholder"></div>
					</div>
				</div>
		</div>

		<div class="x_panel">
			<div class="x_title">
				<h2>Actividad de la página</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Definir periodo</a></li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<div class="row top_tiles">
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-file-o"></i></div>
							<div class="count">18</div>
							<h3>publicaciones</h3>
							<p>de la página.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-comment"></i></div>
							<div class="count">12</div>
							<h3>Comentarios</h3>
							<p>de la página.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-comments"></i></div>
							<div class="count">18</div>
							<h3>Mensajes</h3>
							<p>de la página.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-file-o"></i></div>
							<div class="count">18</div>
							<h3>publicaciones</h3>
							<p>de los fans.</p>
						</div>
					</div>
				</div>

				<div class="row top_tiles">
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-comment"></i></div>
							<div class="count">12</div>
							<h3>Comentarios</h3>
							<p>de los fans.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-comments"></i></div>
							<div class="count">18</div>
							<h3>Mensajes</h3>
							<p>de los fans.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-share-alt"></i></div>
							<div class="count">9</div>
							<h3>Compartir</h3>
							<p>de los fans.</p>
						</div>
					</div>
					<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-thumbs-up"></i></div>
							<div class="count">9</div>
							<h3>Me gusta</h3>
							<p>de los fans.</p>
						</div>
					</div>

				</div>


		</div>


	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>

<?php $this->stop()?>