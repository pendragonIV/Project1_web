<?php

//Lay gia tri controller dang lam viec voi client (nguoi dung dang truy cap toi trang nao)
$controller = $_GET['controller'] ?? ''; // ?? '' (khi k get duoc controller thi gan bang rong)
 
//Dieu khien controller
$action = $_GET['action'] ?? '';

//dieu huong trong admin
$redirect = $_GET['redirect'] ?? '';

if($redirect == ''){
    require_once "Model/Client/index_model.php";
    require_once "View/Client/index.php";
}else{
    switch($redirect){
        case 'detail': {
            require_once "Model/Client/product/product_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'cart': {
            require_once "Controller/Client/cart/cart_controller.php";
            break;
        }
        case 'category': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'payment': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'search': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'add_order': {
            require_once "Model/Client/index_model.php";
            header("Location: ?controller=");
            break;
        }
        case 'story': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'new': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'lastchance': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'profile': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'vieworder': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'search_order': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
        case 'get_order': {
            require_once "Model/Client/index_model.php";
            require_once "View/Client/index.php";
            break;
        }
    }
}
