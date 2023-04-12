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

    if(isset($_GET['category_id'])){
        $categoryId = $_GET['category_id'];
        $checkCate = "SELECT * FROM category WHERE category_id = $categoryId";
        foreach(mysqli_query($connect,$checkCate) as $cate){
            if($cate['parent_id'] == 0){
                $cateParentId = $cate['category_id'];
                $getCatePrds = "SELECT * FROM  product 
                                JOIN category 
                                ON product.category_id = category.category_id
                                JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                ON product.product_id = image.product_id 
                                WHERE category.parent_id = $cateParentId
                                ORDER BY product.product_id DESC ";
            }
            else{
                $getCatePrds = "SELECT * FROM  product 
                                JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                ON product.product_id = image.product_id  
                                WHERE category_id = $categoryId
                                ORDER BY product.product_id DESC";
            }
        }
    }
    $cateProducts = mysqli_query($connect,$getCatePrds);
    $getImageSql = "SELECT * FROM product_image";
    $productImages = mysqli_query($connect,$getImageSql);

    require_once "Config/close_connect.php"; 
    
    return array($cateChilds,$cateParents,$productImages,$cateProducts);
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

    for($i=0; $i < sizeof($_SESSION['cart']); $i++){
        $id = $_POST['product_'.$i.'_id'];
        $price = $_POST['product_'.$i.'_price'];
        $quantity = $_POST['product_'.$i.'_quantity'];
    }
}

switch ($redirect){
    case '': {
        list($cateChilds,$productNewest,$productFeatured,$productImages,$cateParents) = index();
        break;
    }
    case 'category': {
        list($cateChilds,$cateParents,$productImages,$cateProducts) = getCategoryProduct();
        break;
    }
    case 'payment': {
        list($cateChilds,$cateParents) = payment();
        break;
    }
    case 'add_order': {
        
        break;
    }
}