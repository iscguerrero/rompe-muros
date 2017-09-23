<?php $this->layout('master', ['title'=>'rompe-muros::Clientes'])?>
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

		<div class="row top_tiles">
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
					<div class="count">179</div>
					<h3>New Sign ups</h3>
					<p>Lorem ipsum psdea itgum rixt.</p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-comments-o"></i></div>
					<div class="count">179</div>
					<h3>New Sign ups</h3>
					<p>Lorem ipsum psdea itgum rixt.</p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
					<div class="count">179</div>
					<h3>New Sign ups</h3>
					<p>Lorem ipsum psdea itgum rixt.</p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-check-square-o"></i></div>
					<div class="count">179</div>
					<h3>New Sign ups</h3>
					<p>Lorem ipsum psdea itgum rixt.</p>
				</div>
			</div>
		</div>

		<div class="row tile_count">
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total Users</span>
				<div class="count">2500</div>
				<span class="count_bottom"><i class="green">4% </i> From last Week</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
				<div class="count">123.50</div>
				<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total Males</span>
				<div class="count green">2,500</div>
				<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total Females</span>
				<div class="count">4,567</div>
				<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
				<div class="count">2,315</div>
				<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
				<div class="count">7,325</div>
				<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Transaction Summary <small>Weekly progress</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="demo-container" style="height:280px">
								<div id="chart_plot_02" class="demo-placeholder"></div>
							</div>
							<div class="tiles">
								<div class="col-md-4 tile">
									<span>Total Sessions</span>
									<h2>231,809</h2>
									<span class="sparkline11 graph" style="height: 160px;">
											 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
									</span>
								</div>
								<div class="col-md-4 tile">
									<span>Total Revenue</span>
									<h2>$231,809</h2>
									<span class="sparkline22 graph" style="height: 160px;">
												<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
									</span>
								</div>
								<div class="col-md-4 tile">
									<span>Total Sessions</span>
									<h2>231,809</h2>
									<span class="sparkline11 graph" style="height: 160px;">
												 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
									</span>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>



	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>

<?php $this->stop()?>