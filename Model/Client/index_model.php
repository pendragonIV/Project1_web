<?php

$redirect = $_GET['redirect'] ?? '';

function index(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category ORDER BY category_id ASC";
    $categories = mysqli_query($connect,$getCategorySql);
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

    return array($categories,$productNewest,$productFeatured,$productImages);
}

switch ($redirect){
    case '': {
        list($categories,$productNewest,$productFeatured,$productImages) = index();
        break;
    }
}