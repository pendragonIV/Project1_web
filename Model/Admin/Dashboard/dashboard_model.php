<?php

function index(){
    require_once "Config/open_connect.php";


    $totalUser = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM user"));
    $totalDiffProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product"));
    $totalProduct  = mysqli_query($connect,"SELECT SUM(quantity) AS total_prd FROM product_detail");
    $totalReceipt = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt"));
    //Stattus accepted widd have this prop == 1
    $totalReceiptAccept = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt WHERE receipt_status = 1"));
    $totalReceiptWait = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt WHERE receipt_status = 0"));
    $totalReceiptShip = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt WHERE receipt_status = 2"));
    $totalReceiptComplete = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt WHERE receipt_status = 3"));
    $sales = mysqli_query($connect,"SELECT SUM(recent_price) as sales FROM order_detail JOIN receipt ON order_detail.receipt_id = receipt.receipt_id WHERE receipt.receipt_status = 3");

    require_once "Config/close_connect.php";

    return array($totalUser,$totalDiffProduct,$totalReceipt,$totalReceiptAccept,$totalReceiptWait,$totalReceiptShip,$totalProduct,$totalReceiptComplete,$sales);
}

switch($action){


    case '':{
        list($totalUser,$totalDiffProduct,$totalReceipt,$totalReceiptAccept,$totalReceiptWait,$totalReceiptShip,$totalProduct,$totalReceiptComplete,$sales) = index();
        break;
    }

}