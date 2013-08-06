<?php 
namespace app\modules\simple; 
class Menu
{
	static function add(){
		$menu['extend'] = array( 
			'simple module'=>array('simple/site/index'), 
		); 
	 
		return $menu;
	}
}