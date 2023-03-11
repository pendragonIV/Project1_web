<?php

switch($action){
    //yeu cau model xuli va view
    case '':{
        require_once "Model/User/user_model.php";
        require_once "View/User/main.php";
        break;
    }
    case 'create':{
        require_once "View/User/create.php";
        break;
    }
    case 'store':{
        require_once "Model/User/user_model.php";
        header('location: ?controller='.$controller.'');
        break;
    }
    case 'edit':{
        require_once "Model/User/user_model.php";
        require_once "View/User/edit.php";
        break;
    }
    case 'update':{
        require_once "Model/User/user_model.php";
        header('location: ?controller='.$controller.'');
        break;
    }
    
}

?>