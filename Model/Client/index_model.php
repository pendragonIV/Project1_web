<?php

$redirect = $_GET['redirect'] ?? '';

function index(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    $getProductsNewSql = "SELECT * FROM product 
                          JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                          ON product.product_id = image.product_id 
                          ORDER BY product.product_id DESC 
                          LIMIT 10";
    $productNewest = mysqli_query($connect,$getProductsNewSql);
    $getProductFeaturedSql = "SELECT * FROM product WHERE product_featured = 1 LIMIT 10 ORDER BY product_id DESC";
    $productFeatured = mysqli_query($connect,$getProductFeaturedSql);
    $getImageSql = "SELECT * FROM product_image";
    $productImages = mysqli_query($connect,$getImageSql);
    require_once "Config/close_connect.php";    

    return array($cateChilds,$productNewest,$productFeatured,$productImages,$cateParents);
}

function getCategoryProduct(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    $size = mysqli_query($connect,"SELECT * FROM product_size");
    $categoryId = '';

    if(isset($_GET['category_id'])){

        $productPerPage = 12;

        $currentPage = 1;

        
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }
    
        $productStart = ($currentPage - 1) * $productPerPage;

        //

        $categoryId = $_GET['category_id'];
        $checkCate = "SELECT * FROM category WHERE category_id = $categoryId";
        foreach(mysqli_query($connect,$checkCate) as $cate){
            if($cate['parent_id'] == 0){
                $cateParentId = $cate['category_id'];
                $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM  product 
                                                                    JOIN category 
                                                                    ON product.category_id = category.category_id
                                                                    WHERE category.parent_id = $cateParentId"));
                $totalPage = ceil($totalProduct/$productPerPage);
                $productStart = ($currentPage - 1) * $productPerPage;
                $getCatePrds = "SELECT * FROM  product 
                                                    JOIN category 
                                                    ON product.category_id = category.category_id
                                                    JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                                    ON product.product_id = image.product_id 
                                                    WHERE category.parent_id = $cateParentId
                                                    ORDER BY product.product_id DESC 
                                                    LIMIT $productStart,$productPerPage";

            }
            else{
                $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM  product 
                                                                        WHERE category_id = $categoryId"));
                $totalPage = ceil($totalProduct/$productPerPage);
                $productStart = ($currentPage - 1) * $productPerPage;
                $getCatePrds = "SELECT * FROM  product 
                                JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                ON product.product_id = image.product_id  
                                WHERE category_id = $categoryId
                                ORDER BY product.product_id DESC";
            }
        }
        
    }
    elseif(isset($_GET['size'])){
        $productPerPage = 12;

        $currentPage = 1;
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }
    
        $productStart = ($currentPage - 1) * $productPerPage;

        //

        $sizeId = $_GET['size'];

        $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product_detail
                                                               WHERE size_id = $sizeId"));
        $totalPage = ceil($totalProduct/$productPerPage);
        $productStart = ($currentPage - 1) * $productPerPage;
        $getCatePrds = "SELECT * FROM  product 
                                                    JOIN product_detail ON product.product_id = product_detail.product_id
                                                    JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                                    ON product.product_id = image.product_id 
                                                    WHERE product_detail.size_id = $sizeId
                                                    AND product_detail.quantity != 0
                                                    ORDER BY product.product_id DESC 
                                                    LIMIT $productStart,$productPerPage";

        
    }
    $cateProducts = mysqli_query($connect,$getCatePrds);
    $getImageSql = "SELECT * FROM product_image";
    $productImages = mysqli_query($connect,$getImageSql);


    require_once "Config/close_connect.php"; 
    
    return array($cateChilds,$cateParents,$productImages,$cateProducts,$totalPage,$currentPage,$categoryId,$size);
}

function payment(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    require_once "Config/close_connect.php"; 
    return array($cateChilds,$cateParents);
}

function addOrder(){
    require_once "Config/open_connect.php";

    $customerName = $_POST['customer_name']; 
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $customerAddress = $_POST['customer_address'];
    $customerNote = $_POST['customer_note'];

    //insert customer to db
    mysqli_query($connect,"INSERT INTO customer (customer_name,customer_phone,customer_address,customer_email) VALUES ('$customerName','$customerPhone','$customerAddress','$customerEmail')");

    $getCustomer = mysqli_query($connect,"SELECT * FROM customer 
                                        WHERE
                                        customer_name = '$customerName'
                                        AND customer_phone = '$customerPhone'
                                        AND customer_address = '$customerAddress'
                                        AND customer_email = '$customerEmail'
                                        ORDER BY customer_id DESC
                                        LIMIT 1");
    foreach($getCustomer as $customer){
        $customerId = $customer['customer_id'];
        $currentDate = date('Y-m-d');
        //insert new order
        //status == 0 means its hasnt accept by admin
        //belong to 0 means user havent login 
        //accepted by == 0 means there is no admin accept
        if(isset($_SESSION['user_session']) && $_SESSION['user_session'] != ''){
            $userId = $_SESSION['user_session'];
            mysqli_query($connect,"INSERT INTO receipt (receipt_date,customer_id,order_note,receipt_status,accept_by,belong_to) VALUES ('$currentDate',$customerId,'$customerNote',0,0,$userId)");
        }else{
            mysqli_query($connect,"INSERT INTO receipt (receipt_date,customer_id,order_note,receipt_status,accept_by,belong_to) VALUES ('$currentDate',$customerId,'$customerNote',0,0,0)");
        }
    }

    foreach(mysqli_query($connect,"SELECT * FROM receipt
                            WHERE receipt_date = '$currentDate'
                            AND customer_id = $customerId
                            AND order_note = '$customerNote'
                            AND receipt_status = 0
                            ORDER BY receipt_id DESC
                            LIMIT 1") as $receipt){
                            $receiptId = $receipt['receipt_id'];

                            for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                                $id = $_POST['product_'.$i.'_id'];
                                $price = $_POST['product_'.$i.'_price'];
                                $quantity = $_POST['product_'.$i.'_quantity'];
                                
                                //insert order detail
                                mysqli_query($connect,"INSERT INTO order_detail (receipt_id,product_detail_id,product_amount,recent_price) VALUES ($receiptId,$id,$quantity,$price)");
                                
                            }
                        
                        }

                        $_SESSION['cart']=[];

    require_once "Config/close_connect.php"; 
}

function search(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);
    

    if(isset($_GET['search_btn'])){

        $productPerPage = 12;

        $currentPage = 1;
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }

        $searchIn4 = "";
        if(isset($_GET['search'])){
            $searchIn4 = $_GET['search'];
        }
        
        $productStart = ($currentPage - 1) * $productPerPage;
        
        $getPrds =  mysqli_query($connect,"SELECT * FROM  product 
                                            JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                            ON product.product_id = image.product_id 
                                            WHERE product.product_name LIKE '%$searchIn4%'
                                            ORDER BY product.product_id DESC 
                                            LIMIT $productStart,$productPerPage") ;
    
        $totalProduct = mysqli_num_rows($getPrds);

        $totalPage = ceil($totalProduct/$productPerPage);

        $getImageSql = "SELECT * FROM product_image";
        $productImages = mysqli_query($connect,$getImageSql);
    }

    require_once "Config/close_connect.php"; 
    
    return array($cateChilds,$cateParents,$productImages,$totalPage,$currentPage,$getPrds,$searchIn4);
}

function story(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    require_once "Config/close_connect.php"; 
    return array($cateChilds,$cateParents);
}

function newProduct(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    $size = mysqli_query($connect,"SELECT * FROM product_size");

    $productPerPage = 12;

        $currentPage = 1;

        
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }
    
        $productStart = ($currentPage - 1) * $productPerPage;

        //
        $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM  product"));
        $totalPage = ceil($totalProduct/$productPerPage);
        $productStart = ($currentPage - 1) * $productPerPage;

        $getCatePrds = "SELECT * FROM  product 
                                                    JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                                    ON product.product_id = image.product_id 
                                                    ORDER BY product.product_id DESC 
                                                    LIMIT $productStart,$productPerPage";

    $cateProducts = mysqli_query($connect,$getCatePrds);
    $getImageSql = "SELECT * FROM product_image";
    $productImages = mysqli_query($connect,$getImageSql);


    require_once "Config/close_connect.php"; 
    
    return array($cateChilds,$cateParents,$productImages,$cateProducts,$totalPage,$currentPage,$size);
}


function lastChance(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    $size = mysqli_query($connect,"SELECT * FROM product_size");

    $productPerPage = 12;

        $currentPage = 1;

        
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }
    
        $productStart = ($currentPage - 1) * $productPerPage;

        //
        $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM  product WHERE product_promotion >= 30"));
        $totalPage = ceil($totalProduct/$productPerPage);
        $productStart = ($currentPage - 1) * $productPerPage;

        $getCatePrds = "SELECT * FROM  product 
                                                    JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                                    ON product.product_id = image.product_id 
                                                    WHERE product_promotion >= 30
                                                    ORDER BY product.product_promotion DESC 
                                                    LIMIT $productStart,$productPerPage";

    $cateProducts = mysqli_query($connect,$getCatePrds);
    $getImageSql = "SELECT * FROM product_image";
    $productImages = mysqli_query($connect,$getImageSql);


    require_once "Config/close_connect.php"; 
    
    return array($cateChilds,$cateParents,$productImages,$cateProducts,$totalPage,$currentPage,$size);
}

function profile(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    $userId = $_SESSION['user_session'];
    $userIn4 = mysqli_query($connect,"SELECT * FROM user WHERE id = $userId");
    
    $order = mysqli_query($connect,"SELECT * FROM receipt 
                                    JOIN customer ON receipt.receipt_id = customer.customer_id 
                                    WHERE receipt.belong_to = $userId
                                    ORDER BY receipt.receipt_id DESC ");

    $totalSql = "";
    $count = 0;
    foreach($order as $ord){
        $receiptId = $ord['receipt_id'];
        if($count == 0){
            $totalSql = $totalSql."SELECT SUM(recent_price) as total,receipt_id  FROM order_detail WHERE receipt_id = $receiptId";
        }else{
            $totalSql = $totalSql." UNION SELECT SUM(recent_price) as total,receipt_id  FROM order_detail WHERE receipt_id = $receiptId";
        }
        $count++;
    }
    
    $total = mysqli_query($connect,$totalSql);
                            
    require_once "Config/close_connect.php";
    
    return array($cateChilds,$cateParents,$userIn4,$order,$total);
}

function viewOrder(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

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
    
    return array($cateChilds,$cateParents,$getOrder, $getDetail, $total,$acceptBy);
}

function getOrder(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    $searchIn4 = "";
    if(isset($_GET['search'])){
        $searchIn4 = $_GET['search'];
    }

        
    $getOrders =  mysqli_query($connect,"SELECT * FROM receipt 
                                        JOIN customer ON receipt.receipt_id = customer.customer_id 
                                        WHERE customer.customer_phone LIKE '%$searchIn4%'
                                        ORDER BY receipt.receipt_id DESC ") ;
    $totalSql = "";
    $count = 0;
    foreach($getOrders as $ord){
        $receiptId = $ord['receipt_id'];
        if($count == 0){
            $totalSql = $totalSql."SELECT SUM(recent_price) as total,receipt_id  FROM order_detail WHERE receipt_id = $receiptId";
        }else{
            $totalSql = $totalSql." UNION SELECT SUM(recent_price) as total,receipt_id  FROM order_detail WHERE receipt_id = $receiptId";
        }
        $count++;
    }
    
    $total = @mysqli_query($connect,$totalSql);

    require_once "Config/close_connect.php"; 
    return array($cateChilds,$cateParents,$getOrders,$total,$searchIn4);
}

switch ($redirect){
    case '': {
        list($cateChilds,$productNewest,$productFeatured,$productImages,$cateParents) = index();
        break;
    }
    case 'search': {
        list($cateChilds,$cateParents,$productImages,$totalPage,$currentPage,$getPrds,$searchIn4) = search();
        break;
    }
    case 'category': {
        list($cateChilds,$cateParents,$productImages,$cateProducts,$totalPage,$currentPage,$categoryId,$size) = getCategoryProduct();
        break;
    }
    case 'payment': {
        list($cateChilds,$cateParents) = payment();
        break;
    }
    case 'add_order': {
        $result = addOrder();
        break;
    }
    case 'story': {
        list($cateChilds,$cateParents) = story();
        break;
    }
    case 'new': {
        list($cateChilds,$cateParents,$productImages,$cateProducts,$totalPage,$currentPage,$size) = newProduct();
        break;
    }
    case 'lastchance': {
        list($cateChilds,$cateParents,$productImages,$cateProducts,$totalPage,$currentPage,$size) = lastChance();
        break;
    }
    case 'profile': {
        list($cateChilds,$cateParents,$userIn4,$order,$total) = profile();
        break;
    }
    case 'vieworder': {
        list($cateChilds,$cateParents,$getOrder, $getDetail, $total,$acceptBy) = viewOrder();
        break;
    }
    case 'search_order': {
        list($cateChilds,$cateParents) = story();
        break;
    }
    case 'get_order': {
        list($cateChilds,$cateParents,$getOrders,$total,$searchIn4) = getOrder();
        break;
    }
    
}