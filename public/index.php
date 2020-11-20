<?php 
date_default_timezone_set("Asia/Seoul");
session_start();

define('__ROOT', dirname(__DIR__)); // htdocs가 들어간다
define('__SRC', __ROOT . "/src"); // htdocs/s
define('__VIEWS' , __SRC . "/views"); // htdocs/src/views


require_once __ROOT . "/autoload.php";
require_once __ROOT . "/web.php";

Gondr\App\Route::init();