<?php


function checkLogin(){
    require_once("Config/open_connect.php");
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $check_sql = "SELECT * FROM user WHERE user_name = '".$user_name."' AND user_passw = '".$password."' ";
    $check_numb = mysqli_query($connect,$check_sql);
    $count = mysqli_num_rows($check_numb);
    $user = mysqli_fetch_assoc($check_numb);

    if($count == 0){
        return 0;
    }
    else{
        session_start();
        $_SESSION['permission'] = $user['user_permission'];
        return 1;
    }
    
    require_once("Config/close_connect.php");

}

function store(){
    require_once("Config/open_connect.php");

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $user_email = $_POST['user_email'];
    $rePassword = $_POST['re_password'];

    //mac dinh khi dang ki permission la user(1)
    if($password == $rePassword){
        $new_user_sql = "INSERT INTO user (user_name,user_email,user_passw,user_permission) VALUES ('$user_name', '$user_email', '$password', 1)";
        mysqli_query($connect,$new_user_sql);
    }

    require_once("Config/close_connect.php");

    return ;
}


switch($action){
    case 'check_login':{
        $check_login = checkLogin();
        break;
    }
    case 'store': {
        $record = store();
        break;
    }
}
?>