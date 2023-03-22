<?php

//Lay gia tri controller dang lam viec voi client (nguoi dung dang truy cap toi trang nao)
$controller = $_GET['controller'] ?? ''; // ?? '' (khi k get duoc controller thi gan bang rong)
 
//Dieu khien controller
$action = $_GET['action'] ?? '';

//dieu huong trong admin
$redirect = $_GET['redirect'] ?? '';

switch($controller) {

    case 'admin': {
        if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){
            if(isset($_GET['redirect'])) {
                switch($redirect) {
                    case 'user': {
                        if(isset($_SESSION['user_name']) && isset($_SESSION['password'])) {
                            require_once('Controller/Admin/User/user_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                    case 'product': {
                        if(isset($_SESSION['user_name']) && isset($_SESSION['password'])) {
                            require_once('Controller/Admin/Product/product_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                }
            }else {
                require_once('View/Admin/dashboard.php');
            }
            
            
        }else{
            header('location: ?controller=login&action=login');
        }
        break;
    }


}