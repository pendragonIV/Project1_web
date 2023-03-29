<?php
$redirect = $_GET['redirect'];
function index(){
    require_once "Config/open_connect.php";
    $productId  = $_GET['id'];

    $getCategorySql = "SELECT * FROM category ORDER BY category_id ASC";
    $categories = mysqli_query($connect,$getCategorySql);
    $getProductsNewSql = "SELECT * FROM product 
                        JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                        ON product.product_id = image.product_id 
                        ORDER BY product.product_id DESC 
                        LIMIT 10";
    $productNewest = mysqli_query($connect,$getProductsNewSql);
    $getImageSql = "SELECT * FROM product_image WHERE product_id = ".$productId."";
    $productImage = mysqli_query($connect,$getImageSql);
    $imgsSql = "SELECT * FROM product_image";
    $images = mysqli_query($connect,$imgsSql);
    require_once "Config/close_connect.php";    

    return array($categories,$productNewest,$productImage,$images);
}

switch ($redirect){
    case 'detail': {
        list($categories,$productNewest,$productImage,$images) = index();
        break;
    }
}
?>