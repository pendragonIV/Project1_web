<?php
require_once("Config/open_connect.php");
if(isset($_POST['submit_btn'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $check_sql = "SELECT * FROM user WHERE user_name = '".$user_name."' AND user_passw = '".$password."' ";
    $check_numb = mysqli_query($connect,$check_sql);
    $count = mysqli_num_rows($check_numb);
    if($count == 0){
        $error = "Incorrect User name or Password";
    }
    else{
        session_start();
        $_SESSION['user_name'] =$user_name;
        $_SESSION['password'] = $password;
        header("location: ?controller=user");
    }
}

require_once("Config/close_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/CSS/login.css" >
</head>
<body style="padding : 0; margin:0; overflow:hidden;
    position:relative;background-color: grey;">
    <div class = "content__container">
       <form method="POST" class = "" action="index.php?controller=login&action=check_login" >
            <div class = "content__container__form">
                <p class = "form__title">
                    Login
                </p>
                <div class = "form__fill--place">
                    <input placeholder = "Email" name = "user_name">
                    <input type = "password" placeholder= "Password" name = "password">
                </div>
                <button type="submit" name= "submit_btn" class = "form__button">
                    Login
                </button>
                <a href = "" class = "register__link">
                   Register ( Not available )
                </a>
            </div>
        </form> 
    </div>
</body>
</html>