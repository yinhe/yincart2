<?php
use yii\helpers\Html;
use yii\widgets\Menu;  
yii\web\JqueryAsset::register($this);
js_file(http().'js/holder.js');
js_file(http().'misc/bootstrap/js/bootstrap.js');
css_file(http().'misc/bootstrap/css/bootstrap.css'); 
css_file(http().'misc/bootstrap-glyphicons/css/bootstrap-glyphicons.css');
css_file(http().'misc/bootstrap/css/docs.css'); 
js_file(theme_url().'/app.js');
css_file(theme_url().'/app.css');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Welcome to MinCMS</title>
	<?php $this->head();  ?> 
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
  <div class="container">
    <a href="<?php echo url('site/index');?>" class="navbar-brand">MinCMS 2.0.1</a>
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="nav-collapse collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <!--<li>
          <a href="http://mincms.com/docs" target='_blank'>Getting started</a>
        </li>-->
         
      </ul>
    </div>
  </div>
</div>
 
    
<div  class="container bs-docs-container"> 
	<?php $this->beginBody(); ?>   
	<?php echo $content; ?> 
	<?php $this->endBody(); ?>
</div>

</body>
</html>
<?php $this->endPage(); ?>
