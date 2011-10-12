<?php

define('LIBRARY_PATH', APP_PATH . DS . 'libraries');

// 1. sanitise (remove magic quotes, slashes, global vars)
// 2. do the routing - convert path into controller and action
// 3. autoload objects
// 4. error level/reporting

// include routes
$routes = array();
$routes['#^/$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home/index$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home/signup$#i'] = array('controller' => 'home', 'action' => 'signup');

$routes['#^/things$#i'] = array('controller' => 'things', 'action' => 'index');
$routes['#^/things/new$#i'] = array('controller' => 'things', 'action' => 'add');
$routes['#^things/create$#i'] = array('controller' => 'things', 'action' => 'create');
$routes['#^/things/([0-9]{1,5})$#i'] = array('controller' => 'things', 'action' => 'show');
$routes['#^/things/([0-9]{1,5})/edit$#i'] = array('controller' => 'things', 'action' => 'edit');
$routes['#^/things/([0-9]{1,5})/update$#i'] = array('controller' => 'things', 'action' => 'edit');

$routes['#^/home/begin$#i'] = array('controller' => 'login', 'action' => 'login');
$routes['#^/home/end$#i'] = array('controller' => 'login', 'action' => 'logout');
$routes['#^/home/([a-zA-z0-9]{1,5})$#i'] = array('controller' => 'member', 'action' => 'show');

$routes['#^things/create$#i'] = array('controller' => 'things', 'action' => 'create');

$routes['#^/things/([0-9]{1,5})/edit$#i'] = array('controller' => 'things', 'action' => 'edit');
$routes['#^/things/([0-9]{1,5})/update$#i'] = array('controller' => 'things', 'action' => 'edit');
