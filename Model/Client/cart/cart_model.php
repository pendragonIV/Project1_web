<?php

function index(){
    require_once "Config/open_connect.php";

    if(isset($_SESSION['cart'][$productId])){
        $_SESSION['cart'][$productId]++;
    }
    else{
        $_SESSION['cart'][$productId] = 1;
    }

    require_once "Config/close_connect.php";    

    return array($categories,$product,$_SESSION['cart'][$productId]);
}

function addToCart(){
    require_once "Config/open_connect.php";

    if(isset($_POST['submit_btn'])){

        if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

        $image = $_POST['product_img'];
        $size = $_POST['product_size'];
        $name =$_POST['product_name'];
        $price = $_POST['product_price'];
        $quantity = $_POST['product_quantity'] ?? 1;

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
                "product_image" => $image,
                "product_name" => $name,
                "product_price" => $price,
                "product_size" => $size,
                "product_quantity" => $quantity
            ];
            $_SESSION['cart'][] = $product;
        }
        
        for($i=0; $i < sizeof($_SESSION['cart']); $i++){
            
        }

    }

    require_once "Config/close_connect.php";  
}

switch ($action){
    case 'add': {
        $result = addToCart();
        break;
    }
}
?>