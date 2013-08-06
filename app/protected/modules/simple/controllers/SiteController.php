<?php namespace app\modules\simple\controllers; 
 
class SiteController extends \application\core\FrontController
{ 
 
	function init(){
		parent::init(); 
	}
  
	public function actionIndex()
	{     
		$this->theme = 'app';
		return $this->render('index');
	}

	 
}
