

<div class="container">
 <h1 style="width:100%;"><?php echo __('install complate infomation');?></h1>
 	 	<h3><?php echo flash('success');?>
 		
 		<?php echo flash('error');?></h3>
 	 	<p>
 			Please remove Install Controller<code>protected/controllers/InstallController.php</code>
 		</p>
 		<p>
 			Please remove install view <code>web/themes/app/views/install</code>
 		</p>
		Visit Admin <a href="<?php echo url('core/config/index');?>">Admin </a>
	</p>
	
</div>
