<?php
$connect = mysqli_connect('localhost','root','','highway_project1');
mysqli_set_charset($connect,'utf8');
if(!$connect){
    die("Could not connect to server".mysqli_connect_error());
}
// else{
//     die("connect to server".mysqli_connect_error());
// }
?>