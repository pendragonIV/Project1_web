<?php

function index() {
    require_once "Config/open_connect.php";
    
    $sql = "SELECT * FROM category";
    $getCate  = mysqli_query($connect,$sql);

    $totalCate = mysqli_num_rows($getCate);
    // echo $total_cate;

    $catePerPage = 5;

    $totalPage = ceil($totalCate/$catePerPage);

    $currentPage = 1;

    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }

    $cateStart = ($currentPage - 1) * $catePerPage;
    
    $getPageCate = "SELECT * FROM category ORDER BY category_id DESC LIMIT $cateStart,$catePerPage";
    $record = mysqli_query($connect,$getPageCate);

    require_once "Config/close_connect.php";

    return array($record,$totalPage,$currentPage);
}


function createCate(){
    require_once "Config/open_connect.php";
    
    $sql = "SELECT * FROM category WHERE parent_id = 0";
    $getParent = mysqli_query($connect,$sql);

    require_once "Config/close_connect.php";

    return $getParent;
}


function store(){
    require_once "Config/open_connect.php";
    
    if(isset($_POST['submit_btn'])){
        $category_name = $_POST['category_name'];
        $category_description = $_POST['category_description'];
        $parent_category = $_POST['parent_category'];
        if($parent_category == -1){
            $insert_cate_sql = "INSERT INTO category(category_name,category_description,parent_id) Values('$category_name', '$category_description', 0)";
        }
        else{
            $insert_cate_sql = "INSERT INTO category(category_name,category_description,parent_id) Values('$category_name', '$category_description', $parent_category)";
        }
        $record = mysqli_query($connect,$insert_cate_sql);
    }
    require_once "Config/close_connect.php";

    return $record;
}

function destroy(){
    require_once "Config/open_connect.php";
    if(isset($_GET['category_id'])){
        $cateId = $_GET['category_id'];

        foreach(mysqli_query($connect,"SELECT * FROM product WHERE category_id = $cateId") as $prd){
            $prdId = $prd['product_id'];
            
            mysqli_query($connect,"DELETE FROM product_detail WHERE product_id = $prdId");
            mysqli_query($connect,"DELETE FROM product_image WHERE product_id = $prdId");
            mysqli_query($connect,"DELETE FROM product WHERE product_id = $prdId");
            
        }

        $del_sql = "DELETE FROM category WHERE category_id = $cateId";
        mysqli_query($connect,$del_sql);
        
    }
    require_once "Config/close_connect.php";

    return $record;
}

function update(){
    require_once "Config/open_connect.php";
    
    if(isset($_POST['category_id'])){
        $categoryId = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $category_description = $_POST['category_description'];
        $parent_category = $_POST['parent_category'];
        if($parent_category == -1){
            
            $edit_cate_sql = "  UPDATE category
                                SET 
                                category_name = '$category_name',
                                category_description ='$category_description',
                                parent_id = 0
                                WHERE category_id = $categoryId";
        }
        else{
            $edit_cate_sql = "  UPDATE category
                                SET 
                                category_name = '$category_name',
                                category_description ='$category_description',
                                parent_id = $parent_category
                                WHERE category_id = $categoryId";
        }

        $record = mysqli_query($connect,$edit_cate_sql);

    }
   
    require_once "Config/close_connect.php";

    return $record;
}

function getCate(){
    require_once "Config/open_connect.php";
    
    $cateId = $_GET['category_id'];
    $sql = "SELECT * FROM category WHERE category_id = $cateId";
    $record  = mysqli_query($connect,$sql);

    $sqlParent = "SELECT * FROM category WHERE parent_id = 0";
    $getParent = mysqli_query($connect,$sqlParent);
    
    require_once "Config/close_connect.php";

    return array($record,$getParent);
}

switch($action) {
    case '':{
        list($record,$totalPage,$currentPage) = index();
        break;
    }
    case 'create':{
        $record = createCate();
        break;
    }
    case 'store':{
        $record = store();
        break;
    }
    case 'edit': {
        list($record,$getParent) = getCate();
        break;
    }
    case 'update' :{
        $record = update();
        break;
    }
    case 'destroy': {
        $record = destroy();
        break;
    }
    
}
?>