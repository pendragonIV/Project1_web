<?php

function index(){
    require_once "Config/open_connect.php";

    $getCategorySql = "SELECT * FROM category";
    $cateChilds = mysqli_query($connect,$getCategorySql);
    $getParentCateSql = "SELECT * FROM category";
    $cateParents = mysqli_query($connect,$getParentCateSql);

    require_once "Config/close_connect.php";    

    return array($cateChilds,$cateParents);
}

function addToCart(){
    require_once "Config/open_connect.php";

    if(isset($_POST['submit_btn'])){

        if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

        $id  = $_POST['product_id'];
        $image = $_POST['product_img'];
        $size = $_POST['product_size'];
        $name =$_POST['product_name'];
        $price = $_POST['product_price'];
        $priceNormal = $_POST['product_price_normal'];
        $quantity = $_POST['product_quantity'] ?? 1;

        $detailId = '';

        foreach(mysqli_query($connect,"SELECT * FROM product_size WHERE size_name = '$size'") as $sizeIn4){
            $sizeId = $sizeIn4['size_id'];
            foreach(mysqli_query($connect,"SELECT * FROM product_detail WHERE product_id = $id AND size_id = $sizeId") as $productDetail){
                $detailId = $productDetail['id'];
            }
        }

         // Kiểm tra sản phẩm có trang giỏ hàng không để chống hiển thị lặp lại sản phẩm
          // kiểm tra sản phẩm có trùng hay không
        $check = 0;
        for($i=0; $i < sizeof($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i]['product_name'] == $name && $_SESSION['cart'][$i]['product_size'] == $size){
                $check = 1;
                $_SESSION['cart'][$i]['product_quantity'] += $quantity;
                break;
            }
        }

        if($check == 0){
            $product = [
                "product_id" => $id,
                "product_detail_id" => $detailId,
                "product_image" => $image, 
                "product_name" => $name,
                "product_price" => $price,
                "normal_price" => $priceNormal,
                "product_size" => $size,
                "product_quantity" => $quantity
            ];
            $_SESSION['cart'][] = $product;
        }

    }

    require_once "Config/close_connect.php"; 
    
    return $_POST['product_id'];
}

function deleteFromCart(){
    if(isset($_GET['itemId'])){
        $itemId = $_GET['itemId'];
        \array_splice($_SESSION['cart'],$itemId, 1);
    }
}

function updateCart(){
    for($i=0; $i < sizeof($_SESSION['cart']); $i++){
        if(isset($_POST['quantity_'.$i])){
            $quantity = $_POST['quantity_'.$i];
            $_SESSION['cart'][$i]['product_quantity'] = $quantity;
        }
    }
}

switch ($action){
    case '': {
        list($cateChilds,$cateParents) = index();
        break;
    }
    case 'add': {
        $result = addToCart();
        break;
    }
    case 'delete': {
        $result = deleteFromCart();
    }
    case 'update': {
        $result = updateCart();
    }
}
?>