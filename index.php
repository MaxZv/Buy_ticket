<?php
session_start();
//var_dump($_SERVER['DOCUMENT_ROOT']);
//var_dump($_SERVER['REQUEST_URI']);
if(!empty($_GET['route'])){
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/" . $_GET['route'] . ".php";
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/system/request.php";

if($_SERVER['REQUEST_URI'] == '/project2/'){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/main.php";
}elseif(!empty($filename) && file_exists($filename)){
    require_once $filename;
}else{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/404.php";
}

?>