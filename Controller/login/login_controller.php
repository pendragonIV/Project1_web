<?php
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){
    case 'login':
    case'': {
        require_once("View/login/login.php");
        break;
    }
    case 'check_login':{
        require_once("Model/login/login_model.php");
        if($check_login == 1 && $_SESSION['permission'] == 0){
            header("location: index.php?controller=admin");
        }
        elseif($check_login == 1 && $_SESSION['permission'] == 1){
            header("location: index.php");
        }
        else{
            header("location: ?controller=login&action=login&record=".$check_login."");
        }
        break;
    }
    case 'create':{
        require_once("View/login/register.php");
        break;
    }
    case 'store':{
        require_once("Model/login/login_model.php");
        if($record == 0){
            header("location: ?controller=login&action=login");
        }
        else{
            header("location: ?controller=login&action=create&record=".$record."");
        }
        break; 
    }
    case 'logout':{
        session_destroy();
        header("location: index.php?controller=admin");
        break;
    }
}