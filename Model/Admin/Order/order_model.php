<?php

function index(){
    require_once "Config/open_connect.php";

    $getOrder = mysqli_query($connect,"SELECT * FROM receipt 
                                        JOIN customer ON receipt.receipt_id = customer.customer_id");
                                        

    require_once "Config/close_connect.php";

    return $getOrder;
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

switch($action){


    case '':{
        $record = index();
        break;
    }
    case 'access': { 
        
        break;
    }
    case 'shipping': { 
        
        break;
    }
    case 'received': { 

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