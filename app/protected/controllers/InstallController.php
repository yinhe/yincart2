<?php namespace app\controllers; 
use app\models\Install;
use application\core\DB;
use application\modules\auth\models\User;
class InstallController extends \application\core\FrontController
{ 
	public $minify = false; 
	public $bin;
 
	function init(){
		parent::init();  
		$this->theme = 'app'; 
	}
	 
 
	public function actionIndex()
	{      
		$model = new Install();
		$file = base_path().'config/database.php'; 
		if(!is_writable($file)){
			$data['error'] = __('config/database.php is not writable');
		}
		$model->host = "localhost";
		if ($model->load($_POST)){ 
			if(!$data['error']) {
				$dsn = "mysql:host=".trim($model->host).";dbname=".trim($model->host_db);
				$username = trim($model->host_user);
				$model->host_pwd = $password = trim($_POST['Install']['host_pwd']);  
				$db = new \db;  
				$db->connect($dsn,$username,$password); 
				if(!$db->id){
					$data['error'] = __('connect host failed');
				}else{
					$content = \Yii::getAlias('@application/config/database.php');
					$content = file_get_contents($content);
					$content = str_replace('{dsn}',$dsn,$content);
					$content = str_replace('{user}',$username,$content);
					$content = str_replace('{pwd}',$password,$content);  
					file_put_contents($file,$content); 
					$rows = $db->query("SHOW TABLES")->all(); 
					if($rows){
						foreach($rows as $r){
							foreach($r as $v)
								$li[] = $v;
						}
					} 
					if(!$li || !in_array('auth_access',$li)){
						$row = $db->query("SHOW VARIABLES LIKE '%basedir%'")->one(); 
						$this->bin = $row->Value; 
						$sql = $this->bin."/bin/mysql    -u".$username." -p".$password." ".trim($model->host_db)." <  ".\Yii::getAlias('@application/install.sql'); 
   						exec($sql); 
					}
					
					$pwd = crypt(trim($model->password), $this->salt());
					$u = $this->escap(trim($model->username));
					$e = $this->escap(trim($model->email));
					$sql = "INSERT INTO auth_users SET username='$u',email='$e',password='$pwd',active=1,created=".time().",updated=".time();
					$db->query($sql); 
					flash('success',__('install success')); 
 					$this->redirect(url('install/success'));
				}
			}
		}
		$data['url'] = $url;
		$data['model'] = $model;
		return $this->render('index',$data);
	}
	function escap($str){
		return addslashes($str);
	}
	function actionSuccess(){
		return $this->render('success');
	}
	function salt($cost = 13)
	{
	    if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
	        throw new Exception("cost parameter must be between 4 and 31");
	    }
	    $rand = array();
	    for ($i = 0; $i < 8; $i += 1) {
	        $rand[] = pack('S', mt_rand(0, 0xffff));
	    }
	    $rand[] = substr(microtime(), 2, 6);
	    $rand = sha1(implode('', $rand), true);
	    $salt = '$2a$' . sprintf('%02d', $cost) . '$';
	    $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
	    return $salt;
	}
	
	
	 
 
 
	 
}
