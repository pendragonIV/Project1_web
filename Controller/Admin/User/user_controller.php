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
        if($record == 0){
            header('location: ?controller='.$controller.'&redirect='.$redirect.''); 
        }
        else{
            header('location: ?controller='.$controller.'&redirect='.$redirect.'&action=create&record='.$record.''); 
        }
        break;
    }
    case 'edit':{
        require_once "Model/Admin/User/user_model.php";
        require_once "View/Admin/User/edit.php";
        break;
    }
    case 'update':{
        require_once "Model/Admin/User/user_model.php";
        if($record == 0){
            header('location: ?controller='.$controller.'&redirect='.$redirect.''); 
        }
        else{
            header('location: ?controller='.$controller.'&redirect='.$redirect.'&action=edit&user_id='.$user_id.'&record='.$record.''); 
        }
        break;
    }
    case 'destroy':{
        require_once "Model/Admin/User/user_model.php";
        header('location: ?controller='.$controller.'&redirect='.$redirect.'');
        break;
    }
    case 'search':{
        require_once "Model/Admin/User/user_model.php";
        require_once "View/Admin/User/search.php";
        break;
    }
}

?>