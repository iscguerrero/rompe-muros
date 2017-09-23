<?php $this->layout('master', ['title'=>'rompe-muros::Clientes'])?>
<?php $this->start('extra_style')?>
	<link href="<?php echo base_url('resources/handsontable/dist/handsontable.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('resources/handsontable/dist/pikaday/pikaday.css')?>" rel="stylesheet">
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
				<h3>Captura de Estadísticas Mensuales</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="x_panel">
			<div class="x_content">
				<div id="tCaptura" style="overflow-x: scroll; height: 1200px"></div>
			</div>
		</div>
	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>
	<script src="<?php echo base_url('resources/handsontable/dist/pikaday/pikaday.js')?>"></script>
	<script src="<?php echo base_url('resources/handsontable/dist/numbro/numbro.js')?>"></script>
	<script src="<?php echo base_url('resources/handsontable/dist/handsontable.js')?>"></script>
	<script src="<?php echo base_url('public/js/administracion-estadisticas.js')?>"></script>
<?php $this->stop()?>