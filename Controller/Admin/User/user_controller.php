<?php

switch($action){
    //yeu cau model xuli va view
    case '':{
        require_once "Model/Admin/User/user_model.php";
        require_once "View/Admin/User/main.php";
        break;
    }
    case 'create':{
        require_once "View/Admin/User/create.php";
        break;
    }
    case 'store':{
        require_once "Model/Admin/User/user_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'edit':{
        require_once "Model/Admin/User/user_model.php";
        require_once "View/Admin/User/edit.php";
        break;
    }
    case 'update':{
        require_once "Model/Admin/User/user_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'destroy':{
        require_once "Model/Admin/User/user_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
}

?>