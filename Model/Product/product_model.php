<?php

function index(){
    require_once "Config/open_connect.php";

    $products = mysqli_query($connect, "SELECT * FROM product JOIN (SELECT * FROM product_image GROUP BY product_id) AS image ON product.product_id = image.product_id");

    require_once "Config/close_connect.php";
    return $products;
}


function store(){
    require_once "Config/open_connect.php";

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_promotion = $_POST['product_promotion'];
    $product_description = $_POST['product_description'];
    
    if(isset($_POST['featured_product'])){
        $product_featured = 1;
    }else{
        $product_featured = 0;
    }

    $insert_product_sql = "INSERT INTO product (product_name,product_price,product_featured,product_description,product_promotion)
    VALUES('$product_name',$product_price,$product_featured,'$product_description',$product_promotion)";
    mysqli_query($connect,$insert_product_sql);

    $search_prd_sql = "SELECT * FROM product 
                       WHERE product_name = '$product_name' 
                       AND product_price = $product_price 
                       AND product_description = '$product_description' 
                       AND product_promotion = '$product_promotion'
                       AND product_featured = $product_featured";
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
    }

    require_once "Config/close_connect.php";
    return;
}


function getProduct(){
    require_once "Config/open_connect.php";
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $getProductSql = "SELECT * FROM product WHERE product_id = $product_id";
        $product = mysqli_query($connect,$getProductSql);

        $getImgsSql = "SELECT * FROM product_image WHERE product_id = $product_id";
        $images = mysqli_query($connect,$getImgsSql);
        
        return [$product,$images];
    }
    require_once "Config/close_connect.php";
}


function update(){
    require_once "Config/open_connect.php";
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_promotion = $_POST['product_promotion'];
        $product_description = $_POST['product_description'];


        if(isset($_POST['featured_product'])){
            $product_featured = 1;
        }else{
            $product_featured = 0;
        }

        if($_FILES['product_img']['name'] != ""){
            $product_image=$_FILES['product_img']['name'];
            $product_tmp_img=$_FILES['product_img']['tmp_name'];
            move_uploaded_file($product_tmp_img,"public/upload/".$product_image);
        }
        else{
            $getPrd =  mysqli_query($connect,"SELECT * FROM product WHERE product_id = $product_id");
            foreach($getPrd as $item){
                $product_image = $item['img'];
            }
            
        }

        $edit_product_sql = "UPDATE product
                             SET 
                             product_name = '$product_name',
                             product_price = $product_price,
                             product_featured = $product_featured,
                             product_description = '$product_description',
                             product_promotion = $product_promotion,
                             img = '$product_image'
                             WHERE product_id = $product_id";

        mysqli_query($connect,$edit_product_sql);
        move_uploaded_file($file_tmp,"public/upload/".$product_image);
    }
    

    require_once "Config/close_connect.php";

    return $record;
}


function destroy(){
    require_once "Config/open_connect.php";

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $del_product_sql = "DELETE FROM product WHERE product_id = $product_id";
        mysqli_query($connect,$del_product_sql);
    }
    else {
        return;
    }

    return;
    require_once "Config/close_connect.php";
}


switch($action){


    case '':{
        $record = index();
        break;
    }
    case 'store':{
        store();
        break;
    }
    case 'edit': {
        $record = getProduct();
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


}