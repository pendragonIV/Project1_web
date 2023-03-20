<?php

switch($action){
    case '': { 
        require_once "Model/Product/product_model.php";
        require_once "View/Product/main.php";
        break;
    }
    case 'create': { 
        require_once "View/Product/create.php";
        break;
    }
    case 'store': { 
        require_once "Model/Product/product_model.php";
        header("location: ?controller=product");
        break;
    }
    case 'edit': { 
        require_once "Model/Product/product_model.php";
        require_once "View/Product/edit.php";
        break;
    }
    case 'update': {
        require_once "Model/Product/product_model.php";
        header("location: ?controller=product");
        break;
    }
    case 'destroy': {
        require_once "Model/Product/product_model.php";
        header("location: ?controller=product");
        break;
    }
}