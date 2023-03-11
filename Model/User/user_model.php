<?php

function index() {
    require_once "Config/open_connect.php";
    
    $sql = "SELECT * FROM user";
    $record  = mysqli_query($connect,$sql);

    require_once "Config/close_connect.php";

    return $record;
}

function store(){
    require_once "Config/open_connect.php";
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_passw = $_POST['user_pssw'];
    $user_repassw = $_POST['user_re_pssw'];
    if($user_passw == $user_repassw){

    $insert_user_sql = "INSERT INTO user(user_name,user_email,user_passw) Values('$user_name', '$user_email', '$user_passw')";
    $record = mysqli_query($connect,$insert_user_sql);
    
    }
    require_once "Config/close_connect.php";

    return $record;
}

function destroy(){
    require_once "Config/open_connect.php";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $del_sql = "DELETE FROM user WHERE user_id = $user_id";
        mysqli_query($connect,$del_sql);
    }
    require_once "Config/close_connect.php";

    return $record;
}

function update(){
    require_once "Config/open_connect.php";
    
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_passw = $_POST['user_pssw'];
        $user_repassw = $_POST['user_re_pssw'];

        if($user_passw == $user_repassw){

        $edit_user_sql = "  UPDATE user
                            SET 
                            user_name = '$user_name',
                            user_email ='$user_email',
                            user_passw = '$user_passw'
                            WHERE user_id = $user_id";

        $record = mysqli_query($connect,$edit_user_sql);

        }
    }
   
    require_once "Config/close_connect.php";

    return $record;
}

function getUser(){
    require_once "Config/open_connect.php";
    
    $userId = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = $userId";
    $record  = mysqli_query($connect,$sql);
    
    require_once "Config/close_connect.php";

    return $record;
}

switch($action) {
    case '':{
        $record = index();
        break;
    }
    case 'store':{
        $record = store();
        break;
    }
    case 'edit': {
        $record = getUser();
        break;
    }
    case 'update' :{
        $record = update();
        break;
    }
    
}
?>