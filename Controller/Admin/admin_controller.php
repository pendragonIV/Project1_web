<?php

//Lay gia tri controller dang lam viec voi client (nguoi dung dang truy cap toi trang nao)
$controller = $_GET['controller'] ?? ''; // ?? '' (khi k get duoc controller thi gan bang rong)
 
//Dieu khien controller
$action = $_GET['action'] ?? '';

//dieu huong trong admin
$redirect = $_GET['redirect'] ?? '';

switch($controller) {

    case 'admin': {
        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0){
            if(isset($_GET['redirect'])) {
                switch($redirect) {
                    case 'user': {
                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0) {
                            require_once('Controller/Admin/User/user_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                    case 'product': {
                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0) {
                            require_once('Controller/Admin/Product/product_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                    case 'category': {
                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0) {
                            require_once('Controller/Admin/Category/category_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                    case 'order': {
                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0) {
                            require_once('Controller/Admin/Order/order_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                    case 'profile': {
                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 0) {
                            require_once('Controller\Admin\Profile\profile_controller.php');
                        }else{
                            header('location: ?controller=login&action=login');
                        }
                        break;
                    }
                }
            }else {
                require_once('Controller/Admin/Dashboard/dashboard_controller.php');
            }
            
            
        }else{
            header('location: ?controller=login&action=login');
        }
        break;
    }


}