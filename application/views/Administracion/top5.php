<?php $this->layout('master', ['title'=>'rompe-muros::Clientes'])?>
<?php $this->start('extra_style')?>
	<link href="<?php echo base_url('resources/bootstrap-table/bootstrap-table.min.css')?>" rel="stylesheet">
	<style type="text/css">
		blockquote {
			padding: 2px 2px;
			margin: 0 0 2px;
			font-size: 14px;
			border-left: 5px solid #eee;
		}
	</style>
<?php $this->stop()?>
<?php $this->start('page')?>

<div class="modal fade" id="modalTop5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="fa users"></i> Top 5</h4>
			</div>
			<form method="POST" id="formTop5">
				<input type="hidden" name="accion" id="accion">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label" for="codigo"><i class="fa fa-code"></i> Código de Inserción</label>
						<textarea class="form-control" rows="10" name="codigo" id="codigo" placeholder="Pega aquí el código de la publicación"></textarea>
						<div class="row">
							<div class="col-xs-offset-8 col-xs-4">
								<div class="form-group">
									<label class="control-label" for="estatus"> Estatus</label>
									<select class="form-control" name="estatus" id="estatus">
										<option value="A">Usar en Top</option>
										<option value="X">No Usar en Top</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

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
		<div class="clearfix"></div>
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-users"></i> Administración de Publicaciones del Top</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id="toolbar row">
						<select class="form-control" id="cve_usuario" style="display: inline; width: 25%">
							<option value="">Cliente...</option>
						</select>
						<select class="form-control" id="tipo" style="display: inline; width: 15%">
							<option value="">Red Social...</option>
							<option value="f">Facebook</option>
							<option value="t">Twitter</option>
							<option value="i">Instagram</option>
						</select>
						<button type="button" class="btn btn-success" id="btnGenerar"><i class="fa fa-send"></i> Generar</button>
						<button type="button" class="btn btn-success" id="btnAlta"><i class="fa fa-plus-square-o"></i> Alta</button>
						<button type="button" class="btn btn-success" id="btnEditar"><i class="fa fa-edit"></i> Editar</button>
					</div>
					<table id="tpublicaciones" class="jambo_table bulk_action"></table>
				</div>
			</div>
	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>
	<script src="<?php echo base_url('resources/bootstrap-table/bootstrap-table.min.js')?>"></script>
	<script src="<?php echo base_url('resources/bootstrap-table/locale/bootstrap-table-es-MX.min.js')?>"></script>
	<script src="<?php echo base_url('public/js/administracion-top.js')?>"></script>
<?php $this->stop()?>