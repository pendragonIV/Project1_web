<?php

require_once "open_connect.php";
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $del_sql = "DELETE FROM user WHERE user_id = $user_id";
    mysqli_query($connect,$del_sql);
    header("Location: test.php");
}

?>
