<?php

require_once(LIBRARY_PATH . DS . 'Template.php');

class HomeController {

  public function __construct() {
    $this->template = new Template;
    $this->template->template_dir = APP_PATH . DS . 'views' . DS . 'home' . DS;
  }

  public function index() {
    $this->template->display('index2.html.php');
  }
  public function signup() {
    $this->template->display('signup.html.php');
  }
}
