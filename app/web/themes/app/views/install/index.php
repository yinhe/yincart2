<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;  
global $app;
$flag = true;
if($app['_db']->id){
	$flag = true;
	$rows = \application\core\DB::queryAll("SHOW TABLES");
	if($rows){
		foreach($rows as $r){
			foreach($r as $v)
				$li[] = $v;
		}
	}
	if($li && in_array('auth_access',$li)){
		$flag = false;
	}	
}
 
?>
 
<div style='margin-top:20px;'>
	
	<?php  if(false === $flag){
		 
	?>
	<p class='alert alert-danger' style="width:100%;">
		We guess it's  installed. Visit Admin <a href="<?php echo url('core/config/index');?>" target='_blank'>Admin </a>	
	</p>
<?php }else{?> 
		
<?php $form = ActiveForm::begin(array(
		'options' => array('class' => 'form-horizontal'),
		'fieldConfig' => array('inputOptions' => array('class' => 'input-xlarge')),
	)); ?>
<?php if($error){?>
	<div class='alert alert-danger'><?php echo $error;?></div>
<?php }?>
<div class="row">
  <div class="col-lg-4">
	  <fieldset>
	    <legend>Install MinCMS </legend>
	    <?php echo $form->field($model, 'host')->textInput();?>
	    <?php echo $form->field($model, 'host_db')->textInput();?>
	    <?php echo $form->field($model, 'host_user')->textInput();?>
	    <?php echo $form->field($model, 'host_pwd')->textInput();?>
	 </fieldset>
 </div>
 <div class="col-lg-6">
	 	<fieldset >
		    <legend>Suppuer User Account </legend>
			<?php echo $form->field($model, 'username')->textInput();?>
		    <?php echo $form->field($model, 'email')->textInput();?>
		    <?php echo $form->field($model, 'password')->textInput();?>  
	  </fieldset>
  </div>
<div style="clear:both;padding-top:20px;margin-left:13px;"> 
	<?php echo Html::submitButton(__('install'), array('class' => 'btn btn-default')); ?>
 
</div> 
  <?php ActiveForm::end(); ?>
  <?php }?>
</div>
	