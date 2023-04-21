<?php

function index(){
    require_once "Config/open_connect.php";

    $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product"));

    $productPerPage = 4;

    $totalPage = ceil($totalProduct/$productPerPage);

    $currentPage = 1;

    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }

    $productStart = ($currentPage - 1) * $productPerPage;

    $products = mysqli_query($connect, "SELECT * FROM product 
                                        JOIN category ON category.category_id = product.category_id
                                        JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                        ON product.product_id = image.product_id
                                        ORDER BY product.product_id DESC 
                                        LIMIT $productStart,$productPerPage");


    require_once "Config/close_connect.php";

    return array($products,$totalPage,$currentPage);
}


function store(){
    require_once "Config/open_connect.php";

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_promotion = $_POST['product_promotion'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['product_category'];
    
    if(isset($_POST['featured_product'])){
        $product_featured = 1;
    }else{
        $product_featured = 0;
    }

    $insert_product_sql = "INSERT INTO product (product_name,product_price,product_featured,product_description,product_promotion,category_id)
    VALUES('$product_name',$product_price,$product_featured,'$product_description',$product_promotion,$product_category)";
    mysqli_query($connect,$insert_product_sql);

    $search_prd_sql = "SELECT * FROM product 
                       WHERE product_name = '$product_name' 
                       AND product_price = $product_price 
                       AND product_description = '$product_description' 
                       AND product_promotion = '$product_promotion'
                       AND product_featured = $product_featured
                       AND category_id = $product_category";
    $search_prd = mysqli_query($connect,$search_prd_sql);
    $product_id = -1;
    foreach($search_prd as $item){
        $product_id = $item['product_id'];
    }
    
    //count the number of file has been uploaded
    $total_image = count($_FILES['product_img']['name']);
    // echo $product_image."</br>";
    // echo $file_tmp."</br>";

    if($product_id != -1){
        for($i=0; $i< $total_image; $i++){
            $file_tmp = $_FILES['product_img']['tmp_name'][$i];
            $product_image = $_FILES['product_img']['name'][$i];
    
            if($file_tmp != ""){
                $add_img_sql = "INSERT INTO product_image(image_link,product_id) VALUES ('$product_image', $product_id)";
                mysqli_query($connect,$add_img_sql);
                move_uploaded_file($file_tmp,"public/upload/".$product_image);
            }
        }

        
        foreach(mysqli_query($connect,"SELECT * FROM product_size") as $size){
            if(!isset($_POST['product_quantity_'.$size['size_name']]) || $_POST['product_quantity_'.$size['size_name']] == ''){
                $sizeId = $size['size_id'];
                $add_detail_sql = "INSERT INTO product_detail(product_id,size_id,quantity) VALUES ($product_id,$sizeId,0)";
                mysqli_query($connect,$add_detail_sql);
            }
            else{
                $quantity = $_POST['product_quantity_'.$size['size_name']];
                $sizeId = $size['size_id'];
                $add_detail_sql = "INSERT INTO product_detail(product_id,size_id,quantity) VALUES ($product_id,$sizeId,$quantity)";
                mysqli_query($connect,$add_detail_sql);
            }
        }
    }

    require_once "Config/close_connect.php";
    return;
}


function getProduct(){

    if(isset($_GET['product_id'])){
        require_once "Config/open_connect.php";

        $product_id = $_GET['product_id'];
        $getProductSql = "SELECT * FROM product WHERE product_id = $product_id";
        $product = mysqli_query($connect,$getProductSql);

        $getImgsSql = "SELECT * FROM product_image WHERE product_id = $product_id";
        $images = mysqli_query($connect,$getImgsSql);

        $cates = mysqli_query($connect,"SELECT * FROM category WHERE parent_id != 0"); 

        $sizes = mysqli_query($connect,"SELECT * FROM product_size");

        $quantity = mysqli_query($connect,"SELECT * FROM product_detail WHERE product_id = $product_id");
        
        require_once "Config/close_connect.php";
        return array($product,$images,$cates,$sizes,$quantity);
    }
}



function update(){
    require_once "Config/open_connect.php";
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_promotion = $_POST['product_promotion'];
        $product_description = $_POST['product_description'];
        $product_category = $_POST['product_category'];


        if(isset($_POST['featured_product'])){
            $product_featured = 1;
        }else{
            $product_featured = 0;
        }


        if(!empty($_FILES['product_img']['name'][0])){
            $total_image = count($_FILES['product_img']['name']);

            $del_img_sql = "DELETE FROM product_image WHERE product_id = $product_id";
            mysqli_query($connect,$del_img_sql);
            for($i=0; $i< $total_image; $i++){
                $file_tmp = $_FILES['product_img']['tmp_name'][$i];
                $product_image = $_FILES['product_img']['name'][$i];
        
                if($file_tmp != ""){
                    $add_img_sql = "INSERT INTO product_image(image_link,product_id) VALUES ('$product_image', $product_id)";
                    mysqli_query($connect,$add_img_sql);
                    move_uploaded_file($file_tmp,"public/upload/".$product_image);
                }
            }
                
        }


        $edit_product_sql = "UPDATE product
                             SET 
                             product_name = '$product_name',
                             product_price = $product_price,
                             product_featured = $product_featured,
                             product_description = '$product_description',
                             product_promotion = $product_promotion,
                             category_id = $product_category
                             WHERE product_id = $product_id";

        mysqli_query($connect,$edit_product_sql);

        //update quantity

        foreach(mysqli_query($connect,"SELECT * FROM product_size") as $size){

            if(!isset($_POST['product_quantity_'.$size['size_name']]) || $_POST['product_quantity_'.$size['size_name']] == ''){
                $sizeId = $size['size_id'];
                $add_detail_sql = "UPDATE product_detail
                                    SET
                                    quantity = 0
                                    WHERE product_id = $product_id
                                    AND size_id = $sizeId";
                mysqli_query($connect,$add_detail_sql);
            }else{
                $quantity = $_POST['product_quantity_'.$size['size_name']];
                $sizeId = $size['size_id'];
                $add_detail_sql = "UPDATE product_detail
                                    SET
                                    quantity = $quantity
                                    WHERE product_id = $product_id
                                    AND size_id = $sizeId";
                mysqli_query($connect,$add_detail_sql);
            }

        }
    }
    

    require_once "Config/close_connect.php";

    return;
}


function destroy(){
    require_once "Config/open_connect.php";

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        //del imgs
        mysqli_query($connect,"DELETE FROM product_image WHERE product_id = $product_id");
        //del detail
        mysqli_query($connect,"DELETE FROM product_detail WHERE product_id = $product_id");
        //del product
        $del_product_sql = "DELETE FROM product WHERE product_id = $product_id";
        mysqli_query($connect,$del_product_sql);
    }
    else {
        return;
    }

    return;
    require_once "Config/close_connect.php";
}

function getCreate(){
    require_once "Config/open_connect.php";

    $cates = mysqli_query($connect,"SELECT * FROM category WHERE parent_id != 0"); 

    $sizes = mysqli_query($connect,"SELECT * FROM product_size");

    require_once "Config/close_connect.php";

    return array($cates,$sizes);
}

function search(){
    if(isset($_GET['search_btn'])){
        require_once "Config/open_connect.php";

        $productPerPage = 4;

        $currentPage = 1;
      
        if(isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }

        $searchIn4 = "";
        if(isset($_GET['search'])){
            $searchIn4 = $_GET['search'];
        }
        
        $productStart = ($currentPage - 1) * $productPerPage;
        
        $products =  mysqli_query($connect,"SELECT * FROM product 
                                            JOIN category ON category.category_id = product.category_id
                                            JOIN (SELECT * FROM product_image GROUP BY product_id) AS image 
                                            ON product.product_id = image.product_id
                                            WHERE product.product_name LIKE '%$searchIn4%'
                                            ORDER BY product.product_id DESC 
                                            LIMIT $productStart,$productPerPage");
    
        $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product WHERE product.product_name LIKE '%$searchIn4%'"));

        $totalPage = ceil($totalProduct/$productPerPage);

        
    require_once "Config/close_connect.php";

    return array($products,$totalPage,$currentPage,$searchIn4);

    }
}

switch($action){


    case '':{
        list($record,$totalPage,$currentPage) = index();
        break;
    }
    case 'create': { 
        list($cates,$sizes) = getCreate();
        break;
    }
    case 'store':{
        store();
        break;
    }
    case 'edit': {
        list($product,$images,$cates,$sizes,$quantity) = getProduct();
        break;
    }
    case 'update': {
        $record = update();
        break;
    }
    case 'destroy': {
        $record = destroy();
        break;
    }
    case 'search': {
        list($products,$totalPage,$currentPage,$searchIn4) = search();
        break;
    }

}