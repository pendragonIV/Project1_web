<?php

//Lay gia tri controller dang lam viec voi client (nguoi dung dang truy cap toi trang nao)
$controller =$_GET['controller'] ?? ''; // ?? '' (khi k get duoc controller thi gan bang rong)
 
//Dieu khien controller
$action = $_GET['action'] ?? '';

//Goi chuc nang
switch($controller){

    case '': {
        if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){
            require_once "View/dashboard.php";
        }
        else{
            header("location: ?controller=login&action=login");
        }
        break;
    }
    case 'login': {

        require_once "login/login_controller.php";
        break;
    }
    case 'user': {
        if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){
            require_once "User/user_controller.php";
        }
        else{
            header("location: ?controller=login&action=login");
        }
        break;

    }
    case 'product': {
        if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){
            require_once "Product/product_controller.php";
        }
        else{
            header("location: ?controller=login&action=login");
        }
        break;
    }

}

?>