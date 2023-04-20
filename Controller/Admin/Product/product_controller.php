<?php

switch($action){
    case '': { 
        require_once "Model/Admin/Product/product_model.php";
        require_once "View/Admin/Product/main.php";
        break;
    }
    case 'create': { 
        require_once "Model/Admin/Product/product_model.php";
        require_once "View/Admin/Product/create.php";
        break;
    }
    case 'store': { 
        require_once "Model/Admin/Product/product_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'edit': { 
        require_once "Model/Admin/Product/product_model.php";
        require_once "View/Admin/Product/edit.php";
        break;
    }
    case 'update': {
        require_once "Model/Admin/Product/product_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'destroy': {
        require_once "Model/Admin/Product/product_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'search': { 
        require_once "Model/Admin/Product/product_model.php";
        require_once "View/Admin/Product/search.php";
        break;
    }
}