<?php $this->layout('master', ['title'=>'rompe-muros::Clientes'])?>
<?php $this->start('extra_style')?>
	<link href="<?php echo base_url('resources/bootstrap-table/bootstrap-table.min.css')?>" rel="stylesheet">
<?php $this->stop()?>
<?php $this->start('page')?>

<div id="toolbar">
	<button type="button" class="btn btn-success" id="btnAlta"><i class="fa fa-user-plus"></i>Alta</button>
	<button type="button" class="btn btn-success" id="btnEditar"><i class="fa fa-edit"></i> Editar</button>
	<button type="button" class="btn btn-success" ><i class="fa fa-times"></i> Suspender</button>
</div>

<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="fa users"></i> Cliente</h4>
			</div>
			<form method="POST" id="formCliente">
				<input type="hidden" name="accion" id="accion" value="">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="control-label" for="cve_usuario">Usuario</label>
								<input type="text" class="form-control" name="cve_usuario" id="cve_usuario">
							</div>
							<div class="form-group">
								<label class="control-label" for="contrasenia">Contraseña</label>
								<input type="password" class="form-control" name="contrasenia" id="contrasenia">
							</div>
							<div class="form-group">
								<label class="control-label" for="confirmar_contrasenia">Confirmar Contraseña</label>
								<input type="password" class="form-control" name="confirmar_contrasenia" id="confirmar_contrasenia">
							</div>
							<input type="hidden" name="cve_perfil" id="cve_perfil" value="002">
							<div class="form-group">
								<label class="control-label" for="nombre">Nombre</label>
								<input type="text" class="form-control" name="nombre" id="nombre">
							</div>
							<div class="form-group">
								<label class="control-label" for="correo">Correo</label>
								<input type="text" class="form-control" name="correo" id="correo">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label class="control-label" for="facebook"><i class="fa fa-facebook"></i> Usuario Facebook</label>
								<input type="text" class="form-control" name="facebook" id="facebook">
							</div>
							<div class="form-group">
								<label class="control-label" for="twitter"><i class="fa fa-twitter"></i> Usuario Twitter</label>
								<input type="text" class="form-control" name="twitter" id="twitter">
							</div>
							<div class="form-group">
								<label class="control-label" for="instagram"><i class="fa fa-instagram"></i> Usuario Instagram</label>
								<input type="text" class="form-control" name="instagram" id="instagram">
							</div>
							<div class="form-group">
								<label class="control-label" for="paginaweb"><i class="fa fa-globe"></i> Página de Intenet</label>
								<input type="text" class="form-control" name="paginaweb" id="paginaweb">
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
					<h2><i class="fa fa-users"></i> Administración de Clientes</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="tclientes" class="jambo_table bulk_action"></table>
				</div>
			</div>
	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>
	<script src="<?php echo base_url('resources/bootstrap-table/bootstrap-table.min.js')?>"></script>
	<script src="<?php echo base_url('resources/bootstrap-table/locale/bootstrap-table-es-MX.min.js')?>"></script>
	<script src="<?php echo base_url('public/js/administracion-clientes.js')?>"></script>
<?php $this->stop()?>