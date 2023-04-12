<?php
switch($action){
    case '':{
        require_once "Model/Client/cart/cart_model.php";
        require_once "View/Client/index.php";
        //goi giao dien
        break;
    }
    case 'add':{
        require_once "Model/Client/cart/cart_model.php";
        header("Location: ?redirect=detail&id=".$result."");
        break;
    }
    case 'update':{
        require_once "Model/Client/cart/cart_model.php";
        header("Location: ?redirect=payment");
        break;
    }
    case 'delete':{
        require_once "Model/Client/cart/cart_model.php";
        //back to previous page
        header('Location: '. $_SERVER['HTTP_REFERER']);
        break;
    }
}