<?php
$redirect = $_GET['redirect'];
function index(){
    require_once "Config/open_connect.php";
    $productId  = $_GET['id'];

    $getProductSql= "SELECT * FROM product 
                    JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                    ON product.product_id = image.product_id 
                    WHERE product.product_id = $productId";
    $productIn4 = mysqli_query($connect,$getProductSql);
    
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

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);
    
    require_once "Config/close_connect.php";  

    return array($cateParents,$cateChilds,$productNewest,$productImage,$images,$productIn4);
}

switch ($redirect){
    case 'detail': {
        list($cateParents,$cateChilds,$productNewest,$productImage,$images,$productIn4) = index();
        break;
    }
}
?>