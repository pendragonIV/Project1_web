<?php

function index(){
    require_once "Config/open_connect.php";

    $getOrder = mysqli_query($connect,"SELECT * FROM receipt");
                                    
    $totalOrder = mysqli_num_rows($getOrder);
                                    
    $orderPerPage = 6;
                                    
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

        $acceptBy = '';
        foreach($getOrder as $user){
            if($user['accept_by'] != 0 ){
                $userId = $user['accept_by'];
                foreach(mysqli_query($connect,"SELECT * FROM user WHERE id = $userId") as $userIn4){
                    $acceptBy = $userIn4['full_name'];
                }
            }
        }
    
        $getDetail = mysqli_query($connect,"SELECT * FROM order_detail 
                                            JOIN product_detail ON order_detail.product_detail_id = product_detail.id
                                            JOIN product_size ON product_detail.size_id = product_size.size_id
                                            JOIN product ON product_detail.product_id = product.product_id 
                                            JOIN product_image ON product.product_id = product_image.product_id
                                            WHERE receipt_id =  $orderId
                                            GROUP BY product_detail.id");
        $total = mysqli_query($connect,"SELECT SUM(recent_price*product_amount) as total_price FROM order_detail WHERE receipt_id = $orderId");
    }
    require_once "Config/close_connect.php";

    return array($getOrder, $getDetail, $total,$acceptBy);
}

function access(){
    require_once "Config/open_connect.php";

    if(isset($_GET['id'])){
        $orderId = $_GET['id'];
        $userId = $_SESSION['user_session'];
        mysqli_query($connect, "UPDATE receipt
                                SET receipt_status = 1,
                                accept_by = $userId
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
        $getDetail = mysqli_query($connect, "SELECT * FROM order_detail
                                            WHERE receipt_id = $orderId");

        //Giam so luong san pham trong kho
        foreach($getDetail as $detail){
            $prdDetailId = $detail['product_detail_id'];
            $amount = $detail['product_amount'];
            foreach(mysqli_query($connect, "SELECT * FROM product_detail WHERE id = $prdDetailId") as $prd){
                $before = $prd['quantity'];
                $after = $before - $amount;
                $id = $prd['id'];
                mysqli_query($connect, "UPDATE product_detail SET quantity = $after WHERE id = $id");
            }
        }

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

function destroy(){
    require_once "Config/open_connect.php";

    if(isset($_GET['id'])){
        $receiptId = $_GET['id'];
        $getOrder = mysqli_query($connect,"SELECT * FROM receipt WHERE receipt_id = $receiptId");
        foreach($getOrder as $row){
            $customerId = $row['customer_id'];
            mysqli_query($connect,"DELETE FROM customer WHERE customer_id = $customerId");
        }
        mysqli_query($connect,"DELETE FROM receipt WHERE receipt_id = $receiptId");
        mysqli_query($connect,"DELETE FROM order_detail WHERE receipt_id = $receiptId");
    }

    require_once "Config/close_connect.php";
}

function search(){
    if(isset($_GET['search_btn'])){
        require_once "Config/open_connect.php";

        $orderPerPage = 6;

        $currentPage = 1;
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }

        $searchIn4 = "";
        if(isset($_GET['search'])){
            $searchIn4 = $_GET['search'];
        }
        
        $orderStart = ($currentPage - 1) * $orderPerPage;

        $totalOrder = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt 
                                                                JOIN customer ON receipt.receipt_id = customer.customer_id 
                                                                WHERE customer.customer_name LIKE '%$searchIn4%'"));
        
        $orders =  mysqli_query($connect,"SELECT * FROM receipt 
                                            JOIN customer ON receipt.receipt_id = customer.customer_id 
                                            WHERE customer.customer_name LIKE '%$searchIn4%'
                                            ORDER BY receipt.receipt_id DESC 
                                            LIMIT $orderStart,$orderPerPage");
    

        $totalPage = ceil($totalOrder/$orderPerPage);

        
    require_once "Config/close_connect.php";

    return array($orders,$totalPage,$currentPage,$searchIn4);

    }
}

function order(){
    if(isset($_GET['search_btn'])){
        require_once "Config/open_connect.php";

        $orderPerPage = 6;

        $currentPage = 1;
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }

        $searchIn4 = "";
        if(isset($_GET['search'])){
            $searchIn4 = $_GET['search'];
        }

        $status = '';
        switch($searchIn4){
            case '1': {
                $status = 0;
                break;
            }
            case '2': {
                $status = 1;
                break;
            }
            case '3': {
                $status = 2;
                break;
            }
            case '4': {
                $status = 3;
                break;
            }
        }
        
        $orderStart = ($currentPage - 1) * $orderPerPage;
        if($searchIn4 != 0){
            $orders =  mysqli_query($connect,"SELECT * FROM receipt 
                                            JOIN customer ON receipt.receipt_id = customer.customer_id 
                                            WHERE receipt.receipt_status = $status
                                            ORDER BY receipt.receipt_id DESC 
                                            LIMIT $orderStart,$orderPerPage");
        }
        else{
            $orders =  mysqli_query($connect,"SELECT * FROM receipt 
                                            JOIN customer ON receipt.receipt_id = customer.customer_id 
                                            ORDER BY receipt.receipt_id DESC 
                                            LIMIT $orderStart,$orderPerPage");
        }

        $totalOrder = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM receipt 
                                                                JOIN customer ON receipt.receipt_id = customer.customer_id 
                                                                WHERE receipt.receipt_status = $status"));

        $totalPage = ceil($totalOrder/$orderPerPage);

        
    require_once "Config/close_connect.php";

    return array($orders,$totalPage,$currentPage,$searchIn4);

    }
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
        list($getOrder, $getDetail, $total,$acceptBy) = getOrder();
        break;
    }
    case 'destroy': {
        $record = destroy();
        break;
    }
    case 'search': {
        list($orders,$totalPage,$currentPage,$searchIn4) = search();
        break;
    }
    case 'order': {
        list($orders,$totalPage,$currentPage,$searchIn4) = order();
        break;
    }
}