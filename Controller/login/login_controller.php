<?php
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){
    case 'login':{
        require_once("View/login/login.php");
        break;
    }
    case 'check_login':{
        require_once("Model/login/login_model.php");
        if($check_login == 1){
            header("location: index.php?controller=admin");
        }
        else{
            require_once("View/login/login.php");
        }
        break;
    }
    case 'create':{
        require_once("View/login/register.php");
        break;
    }
    case 'store':{
        require_once("Model/login/login_model.php");
        header("location: ?controller=login&action=login");
        break;
    }
    case 'logout':{
        session_destroy();
        header("location: index.php?controller=admin");
        break;
    }
}