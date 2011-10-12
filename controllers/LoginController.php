<?php
session_start();

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(APP_PATH . DS . 'models/User.php');

class LoginController {

  public function __construct() {
    $this->template = new Template;
    $this->template->template_dir = APP_PATH . DS . 'views' . DS . 'home' . DS;
    
    $this->template->title = 'Log in';
  }

  public function index() {
    $this->template->display('web.html.php');
  }

  public function login()
  {
   if(!$user = User::retrieve(array('email' => $_POST['user'])))
   {
     echo "Incorrect username";
     exit;
   }
   
   $hash = hash("sha256","{$user->salt_value}{$_POST['pw']}");

   if ($hash != $user->password) {
	print "Incorrect password";
      exit;
    }

   $_SESSION['user']['email']=$user->email;
   $_SESSION['user']['type']=$user->acc_type_id;
   //CHANGE THIS
   header("Location: /~s3167356/Ass2/mvc/home/{$user->email}");
   exit;
  }







 public function logout(){
  $_SESSION = array();
    if (ini_get('session.use_cookies')) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'],
        $params['secure'], $params['httponly']);
    }
  session_destroy();
  $this->template->display('index2.html.php');
  exit;
 }

}
