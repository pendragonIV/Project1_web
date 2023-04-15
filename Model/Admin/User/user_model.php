<?php

function index() {
    require_once "Config/open_connect.php";
    
    $sql = "SELECT * FROM user";
    $getUser  = mysqli_query($connect,$sql);

    $totalUser = mysqli_num_rows($getUser);
    // echo $total_user;

    $userPerPage = 5;

    $totalPage = ceil($totalUser/$userPerPage);

    $currentPage = 1;

    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }

    $userStart = ($currentPage - 1) * $userPerPage;
    
    $getPageUser = "SELECT * FROM user ORDER BY user_id DESC LIMIT $userStart,$userPerPage";
    $record = mysqli_query($connect,$getPageUser);

    require_once "Config/close_connect.php";

    return array($record,$totalPage,$currentPage);
}

function store(){
    require_once "Config/open_connect.php";
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $password = $_POST['user_pssw'];
    $rePassword = $_POST['user_re_pssw'];
    $role = $_POST['user_role'];
    if($password == $rePassword){
        $check = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM user WHERE user_name = '$user_name'"));
        if($check > 0){
            
            require_once("Config/close_connect.php");

            return 1;
        }
        else{
            $new_user_sql = "INSERT INTO user (user_name,user_email,user_passw,user_permission) VALUES ('$user_name', '$user_email', '$password', $role)";
            mysqli_query($connect,$new_user_sql);

            
            require_once("Config/close_connect.php");

            return 0;
        }
        
    }
    else{
        require_once("Config/close_connect.php");

        return 2;
    }
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
        $password = $_POST['user_pssw'];
        $rePassword = $_POST['user_re_pssw'];
        $role = $_POST['user_role'];

        if($password == $rePassword){
            $checkId = mysqli_query($connect,"SELECT * FROM user WHERE user_id = $user_id");
            $check = 0;
            foreach($checkId as $user){
                if($user['user_name'] != $user_name){
                    $check = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM user WHERE user_name = '$user_name'"));
                }
            }
            if($check > 0){
                
                require_once("Config/close_connect.php");
    
                return array(1,$user_id);
            }
            else{
                $edit_user_sql = "  UPDATE user
                            SET 
                            user_name = '$user_name',
                            user_email ='$user_email',
                            user_passw = '$password',
                            user_permission = $role
                            WHERE user_id = $user_id";

                $record = mysqli_query($connect,$edit_user_sql);
    
                
                require_once("Config/close_connect.php");
    
                return array(0,$user_id);
            }
            
        }
        else{
            require_once("Config/close_connect.php");
    
            return array(2,$user_id);
        }

    }

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
        list($record,$totalPage,$currentPage) = index();
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
        list($record,$user_id) = update();
        break;
    }
    case 'destroy': {
        $record = destroy();
        break;
    }
    
}
?>