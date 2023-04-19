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
        mysqli_query($connect,"INSERT INTO receipt (receipt_date,customer_id,order_note,receipt_status) VALUES ('$currentDate',$customerId,'$customerNote',0)");
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
}