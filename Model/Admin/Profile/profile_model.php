<?php

function index(){
    require_once "Config/open_connect.php";

    $id = $_SESSION['user_session'];
    $in4 = mysqli_query($connect, "SELECT * FROM user WHERE id = $id");


    require_once "Config/close_connect.php";

    return $in4;
}

switch($action){


    case '':{
        $record = index();
        break;
    }
}