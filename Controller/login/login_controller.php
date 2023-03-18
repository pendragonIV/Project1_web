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
        if(isset($check_login)){
            header("location: index.php");
        }
        else{
            require_once("View/login/login.php");
        }
        break;
    }
    case 'logout':{
        session_destroy();
        header("location: index.php");
        break;
    }
}