<?php
$redirect = $_GET['redirect'];
function index(){
    require_once "Config/open_connect.php";
    $productId  = $_GET['id'];

    $getCategorySql = "SELECT * FROM category ORDER BY category_id ASC";
    $categories = mysqli_query($connect,$getCategorySql);
    $getProductSql = "SELECT * FROM product 
                        JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                        ON product.product_id = image.product_id 
                        ORDER BY product.product_id DESC 
                        LIMIT 10";
    $product = mysqli_query($connect,$getProductSql);

    if(isset($_SESSION['cart'][$productId])){
        $_SESSION['cart'][$productId]++;
    }
    else{
        $_SESSION['cart'][$productId] = 1;
    }



    require_once "Config/close_connect.php";    

    return array($categories,$product,$_SESSION['cart'][$productId]);
}

switch ($redirect){
    case 'detail': {
        list($categories,$product,$cart_prd) = index();
        break;
    }
}
?>