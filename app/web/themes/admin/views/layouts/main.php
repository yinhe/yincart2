<?php
use yii\helpers\Html;
use yii\widgets\Menu;   
yii\web\JqueryAsset::register($this);
application\asset\BootStrap::register($this); 
js_file('js/admin.js');
widget('select2'); 
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title><?php echo __('backend admin'); ?></title>
	<?php $this->head(); 
	css_file('misc/bootstrap/css/docs.css'); 
	css_file('css/admin.css');
	css_file(theme_url().'css.css');   
	?>
 
</head>
<body>
<?php if(uid() == 1){?>
<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav"> 
	     <div class="container"> 
		      <a class="navbar-brand" href="<?php echo url('core/site/index');?>"><?php echo __('backend admin');?></a>
		      <div class="nav-collapse collapse"> 
		    		<?php 
					
						echo Menu::widget(array(
							'options' => array('class' => 'nav navbar-nav'), 
							'activateParents'=>true,
							'submenuTemplate'=>'<ul class="dropdown-menu">{items}</ul>',
							'items' => \application\core\Menu::admin()?:array(),
						)); 
					
					?> 
					<div  class='pull-right'>	
						<span class='span'>
							<a href="<?php echo url('auth/user/change');?>">
								<span class="glyphicon glyphicon-user"></span>
								<?php echo identity('username');?>  
							</a>
							<a href="<?php echo url('auth/open/logout');?>" onclick="return confirm('<?php echo __('logout');?>');"> <span class="glyphicon glyphicon-off" ></span></a>	
						</span>
						<?php echo widget('switchlanguage'); ?>
					</div>
		      </div><!--/.nav-collapse -->  
	   </div>
</div>
<?php }else if(uid()>0){?>

<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav"> 
	     <div class="container"> 
		      <a class="navbar-brand" href="<?php echo url('core/site/index');?>"><?php echo __('backend admin');?></a>
		      <div class="nav-collapse collapse"> 
		    		<ul class="nav navbar-nav">
					    <?php 
					    $all = \application\modules\content\Classes::cck_list();
					    $active = \application\core\Menu::active(); 
					    foreach($all as $vo){ 
					    ?>
					      <li <?php if($active && in_array('content/node/cck/'.$vo['slug'] , $active)){ ?>
					        	class="active" <?php }?>
					      ><a href="<?php echo url('content/node/index',array('name'=>$vo['slug']));?>#table"><?php echo $vo['name'];?></a></li>
					    <?php } ?>
				    </ul>
					<div  class='pull-right'>	
						<span class='span'>
							<a href="<?php echo url('auth/user/change');?>"> 
								<span class="glyphicon glyphicon-user"></span>
								[<?php echo identity('username');?>]  
							</a>
							<a href="<?php echo url('auth/open/logout');?>" onclick="return confirm('<?php echo __('logout');?>');"> <span class="glyphicon glyphicon-off" ></span></a>	
						</span>
						<?php echo widget('switchlanguage'); ?>
					</div>
		      </div><!--/.nav-collapse -->  
	   </div>
</div>

<?php }?>

<div id='main' class="container">
	<?php $this->beginBody(); ?> 
	<?php echo \yii\widgets\Breadcrumbs::widget(array(
		'homeLink'=>array('label'=>__('home'),'url'=>array('/core/config/index')),
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : array(),
		'itemTemplate'=>"<li>{link}</li>\n",
	)); ?>
 	 
	<?php 
		//显示flash message
		foreach(array('success','error') as $type){
		if(has_flash($type)){?>
		<div class="alert alert-<?php echo $type;?> flash-message"><?php echo flash($type);?></div>
	<?php }}?>
	<div id='update' class='alert alert-success' style='display:none'></div>		
	<?php echo $content; ?>

	

	<?php $this->endBody(); ?>
</div>
<div id='toTop' class='hander' style="display:none;z-index:999;position: fixed;right: 10px;bottom: 10px;background: #000;color: #fff;padding: 4px 15px;">TOP</div>
<?php js("
 
	$(window).scroll(function() {
	    if ($(this).scrollTop()) {
	        $('#toTop').fadeIn(); 
	    } else {
	        $('#toTop').fadeOut(); 
	    }
	});
	$('#toTop').click(function () {   
	   $('html, body').animate({scrollTop: 0}, 1000);
	});		
");?>	
<footer class="bs-footer" style="padding-top: 15px;">
<?php 
$all = \application\modules\content\Classes::cck_list();
$active = \application\core\Menu::active(); 
if($all){
	$n = count($all);
?>	
<div class="footer-links" style="text-align: left;">
	<div class='container'>
  	  <?php  
  		$i=1;
	    foreach($all as $vo){ 
	    ?>
	      <span <?php if($active && in_array('content/node/cck/'.$vo['slug'] , $active)){ ?>
	        	class="active" <?php }?>
	      ><a href="<?php echo url('content/node/index',array('name'=>$vo['slug']));?>#table"><?php echo $vo['name'];?></a></span>
	      <?php if($i<$n){?>
		      <li class="muted">·</li>
	      <?php }?>
	    <?php $i++;} ?>  
	 </div> 
</div> 
<?php } ?>  	
<div class="bs-social">
  <ul class="bs-social-buttons">
    <li>
      <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=mincms&repo=mincms&type=watch&count=true" 
    	allowtransparency="true" frameborder="0" scrolling="0" width="100px" height="20px"></iframe>
    </li>
    <li>
      <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=mincms&repo=mincms&type=fork&count=true" 
    	allowtransparency="true" frameborder="0" scrolling="0" width="102px" height="20px"></iframe>
    </li> 
    <li>
      	<?php echo copyRight();?>
    </li>
    <li>	
    	Template by <a href="http://getbootstrap.com/" target='_blank'>Twitter Bootstrap</a>	 
    </li>
    
  </ul>
</div> 
 
 </footer>
    	  
</body>

</html>
<?php $this->endPage(); ?>
