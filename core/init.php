<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'register'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user'
    )
);

//this is more efficient than calling require_once on each page. sqp stands for Standard PHP Lib
spl_autoload_register(function($class) {
    require_once 'resource/' . $class . '.php';
});

require_once 'functions/sanatise.php';