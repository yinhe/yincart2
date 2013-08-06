<?php 
namespace app\models; 
use yii\base\Model; 
class Install extends Model
{
	public $host;
 	public $host_db;
 	public $host_user;
 	public $host_pwd;
 	public $username;
 	public $email;
 	public $password;  
	public function rules()
	{
		return array( 
			array('host, host_db, host_user,host_pwd,  username ,email,password', 'required'), 
			array('email', 'email'),
			array('password', 'string','min'=>6),
			array('username', 'string','min'=>5),
			array('username', 'match','pattern'=>"/[a-z]+/"),     
		);
	}  
	public function contact($email)
	{
		if ($this->validate()) {
			$name = '=?UTF-8?B?' . base64_encode($this->name) . '?=';
			$subject = '=?UTF-8?B?' . base64_encode($this->subject) . '?=';
			$headers = "From: $name <{$this->email}>\r\n" .
				"Reply-To: {$this->email}\r\n" .
				"MIME-Version: 1.0\r\n" .
				"Content-type: text/plain; charset=UTF-8";
			mail($email, $subject, $this->body, $headers);
			return true;
		} else {
			return false;
		}
	}
}