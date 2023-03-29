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
    }
}
