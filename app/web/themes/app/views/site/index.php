<?php global $app;  
use yii\helpers\Markdown; 
 
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
 
<div class="bs-header" style="width:100%;">
  <div class="container">
   	 <h1 style="width:100%;">Welcome MinCMS</h1>
   	 
			A Powerfull Content System. Many Modules Support, Like auth, cart,payment,oauth,i18n ETC.	
  </div>
</div>
<div class="container">
<?php  if(true === $flag){ 
?> 

<p class='alert alert-danger' style="width:100%;">
	We guess it's not installed. click Install for <a href="<?php echo url('install/index');?>" style="font:16px;">install</a> MinCMS
</p>
<?php }else{?>
	<p class='alert alert-success' style="width:100%;">
	Visit Admin <a href="<?php echo url('core/config/index');?>" target='_blank'>Admin </a>	
	</p>
<?php }?>
</div>
	
 
