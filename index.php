<?php
/*
require('./Model/database.php');
require './Controller/Controller.php';
$controllerName = null;
if ($controllerName == null) {
$controllerName = 'HomeController';
}
$controllerName = ucfirst((strtolower($_REQUEST['controller'])) . 'Controller');
if ($controllerName == 'Controller') {
$controllerName = 'HomeController';
}
$actionName = $_REQUEST['action'] ?? 'index';
require "./Controller/${controllerName}.php";
$controllerO = new $controllerName;
$controllerO->index();
*/
include_once('config.php');
include_once('Controller/Load.php');
include_once('Controller/BaseController.php');
include_once('Model/BaseModel.php');
include_once('Model/database.php');
$url = isset($_GET['url']) ? $_GET['url'] : NULL;
if ($url != NULL) {
    $url = rtrim($url, '/');
    $url = explode('/', $url);
} else {
    unset($url);
}
if (isset($url[0])) {
    include_once('Controller/' . $url[0] . '.php');
    $indexcontroller = new $url[0];
    if (isset($url[2])) {
        $indexcontroller->{$url[1]}($url[2]);
    } else {
        if (isset($url[1])) {
            $indexcontroller->{$url[1]}();
        }
    }
} else {
    //include_once('Controller/Index.php');
    //$index = new Index;
    //$index->HomePage();
    echo '404';
}
