<?php   
$file = __DIR__.'/../../../packages/application/config/web-prod.php';
$prod = include $file;
$db = include __DIR__.'/database.php';
$main = array(  
	'timeZone'=>'Asia/Shanghai', 
	'basePath' => dirname(__DIR__),
	'preload' => array('log'),  
	'components' => array(  
		'cache' => array(
			'class' => 'yii\caching\FileCache', 
		),  
		/*'log' => array(
			'targets' => array(
				array(
					'class' => 'yii\log\FileTarget',
					'levels' => array('error', 'warning'),
				),
			),
		), */  
	), 
	'params' => require(__DIR__ . '/params.php'),
);
$main['components']['db'] = $db['db'];
 
return merge( $prod ,$main); 