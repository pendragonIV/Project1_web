<?php

function index(){
    require_once "Config/open_connect.php";

    $getOrder = mysqli_query($connect,"SELECT * FROM receipt");
                                    
    $totalOrder = mysqli_num_rows($getOrder);
                                    
    $orderPerPage = 3;
                                    
    $totalPage = ceil($totalOrder/$orderPerPage);
                                    
    $currentPage = 1;
                                    
    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }
                                    
    $orderStart = ($currentPage - 1) * $orderPerPage;
                                        
    $getPageOrder = "SELECT * FROM receipt 
                    JOIN customer ON receipt.receipt_id = customer.customer_id 
                    ORDER BY receipt.receipt_id DESC LIMIT $orderStart,$orderPerPage";
    $record = mysqli_query($connect,$getPageOrder);
                                    
    require_once "Config/close_connect.php";
                                    
    return array($record,$totalPage,$currentPage);
}

function getOrder(){
    require_once "Config/open_connect.php";
    
    if(isset($_GET['id'])){
        $orderId = $_GET['id'];
        
        $getOrder = mysqli_query($connect,"SELECT * FROM receipt 
                                            JOIN customer ON receipt.receipt_id = customer.customer_id
                                            WHERE receipt.receipt_id = $orderId");
    
        $getDetail = mysqli_query($connect,"SELECT * FROM order_detail 
                                            JOIN product_detail ON order_detail.product_detail_id = product_detail.id
                                            JOIN product_size ON product_detail.size_id = product_size.size_id
                                            JOIN product ON product_detail.product_id = product.product_id 
                                            JOIN product_image ON product.product_id = product_image.product_id
                                            WHERE receipt_id =  $orderId
                                            GROUP BY product_detail.id");
        $total = mysqli_query($connect,"SELECT SUM(recent_price) as total_price FROM order_detail WHERE receipt_id = $orderId");
    }
    require_once "Config/close_connect.php";

    return array($getOrder, $getDetail, $total);
}

function access(){
    require_once "Config/open_connect.php";

    if(isset($_GET['id'])){
        $orderId = $_GET['id'];

        mysqli_query($connect, "UPDATE receipt
                                SET receipt_status = 1
                                WHERE receipt_id = $orderId");

    }

    require_once "Config/close_connect.php";
}

function shipping(){
    require_once "Config/open_connect.php";

    if(isset($_GET['id'])){
        $orderId = $_GET['id'];

        mysqli_query($connect, "UPDATE receipt
                                SET receipt_status = 2
                                WHERE receipt_id = $orderId");

    }

    require_once "Config/close_connect.php";
}

function received(){
    require_once "Config/open_connect.php";

    if(isset($_GET['id'])){
        $orderId = $_GET['id'];

        mysqli_query($connect, "UPDATE receipt
                                SET receipt_status = 3
                                WHERE receipt_id = $orderId");

    }

    require_once "Config/close_connect.php";
}

switch($action){


    case '':{
        list($record,$totalPage,$currentPage) = index();
        break;
    }
    case 'access': { 
        $record = access();
        break;
    }
    case 'shipping': { 
        $record = shipping();
        break;
    }
    case 'received': { 
        $record = received();
        break;
    }
    case 'view': {
        list($getOrder, $getDetail, $total) = getOrder();
        break;
    }
    case 'destroy': {
        
        break;
    }
}