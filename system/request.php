<?php

     function getView($name, $data = ''){
        return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/views/" . $name . ".php";
    }
//    function getModel($name, $data = '', $view = ''){
//        return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/models/" . $name . ".php";
//    }
     function getHeader($data = ''){
        return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/header.php";
    }
    function getFooter($data = ''){
        return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/footer.php";
    }
     function myLink($name){
        return '/project2/index.php?route=' . $name . '';
    }


?>
<?php
//class Request{
//public function getView($name, $data = ''){
//return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/views/" . $name . ".php";
//}
//public function getHeader($data = ''){
//return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/header.php";
//}
//public function getFooter($data = ''){
//return require_once $_SERVER['DOCUMENT_ROOT'] . "/project2/controllers/footer.php";
//}
//public function myLink($name){
//return '/project2/index.php?route=' . $name . '';
//}
//}
//
//?>
