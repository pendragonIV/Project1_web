<?php

//Lay gia tri controller dang lam viec voi client (nguoi dung dang truy cap toi trang nao)
$controller =$_GET['controller'] ?? ''; // ?? '' (khi k get duoc controller thi gan bang rong)
 
//Dieu khien controller
$action = $_GET['action'] ?? '';

//Goi chuc nang
switch($controller){

    case 'user': {
        require_once "User/user_controller.php";
        break;
    }
    

}

?>