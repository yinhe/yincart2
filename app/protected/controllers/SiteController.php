<?php namespace app\controllers; 
use application\core\MongoDB;

class SiteController extends \application\core\FrontController
{ 
	public $minify = false;
	function init(){
		parent::init();
		$this->theme = 'app';
		 
	}
	public function actions()
	{
		return array(
			'captcha' => array(
				'class' => 'yii\web\CaptchaAction',
				'fixedVerifyCode' => YII_ENV === 'test' ? 'testme' : null,
			),
		);
	}
 
	public function actionIndex()
	{     
		$data['url'] = $url;
		return $this->render('index',$data);
	}
	
	
	 
 
 
	 
}
