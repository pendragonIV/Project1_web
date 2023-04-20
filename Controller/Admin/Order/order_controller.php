<?php

switch($action){
    case '': { 
        require_once "Model/Admin/Order/order_model.php";
        require_once "View/Admin/Order/main.php";
        break;
    }
    case 'access': { 
        require_once "Model/Admin/Order/order_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.''); 
        break;
    }
    case 'shipping': { 
        require_once "Model/Admin/Order/order_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'received': { 
        require_once "Model/Admin/Order/order_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'view': {
        require_once "Model/Admin/Order/order_model.php";
        require_once "View/Admin/Order/edit.php";
        break;
    }
    case 'destroy': {
        require_once "Model/Admin/Order/order_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'search': {
        require_once "Model/Admin/Order/order_model.php";
        require_once "View/Admin/Order/search.php";
        break;
    }
    case 'order': {
        require_once "Model/Admin/Order/order_model.php";
        require_once "View/Admin/Order/search.php";
        break;
    }
}