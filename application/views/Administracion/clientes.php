<?php $this->layout('master', ['title'=>'rompe-muros::Clientes'])?>
<?php $this->start('extra_style')?>
<?php $this->stop()?>
<?php $this->start('page')?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h2>Administración de Clientes</h2>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-users"></i> Clientes</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="tclientes"></table>
				</div>
			</div>
	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>

<?php $this->stop()?>