<?php $this->layout('master', ['title'=>'rompe-muros'])?>
<?php $this->start('extra_style')?>
<?php $this->stop()?>
<?php $this->start('page')?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>TOP 5</h3>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="row">



			</div>
	</div>
</div>
<?php $this->stop()?>
<?php $this->start('extra_js')?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php $this->stop()?>