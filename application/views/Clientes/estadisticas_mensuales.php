<?php $this->layout('master', ['title'=>'rompe-muros'])?>
<?php $this->start('extra_style')?>
<?php $this->stop()?>
<?php $this->start('page')?>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Plain Page</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
					Add content to the page ...
			</div>
		</div>
	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>
<?php $this->stop()?>