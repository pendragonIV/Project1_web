<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkPro-Member Management-Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="admin_resource/css/custom.css">

    <script src="public/vendor/ckeditor/ckeditor.js"></script>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
             <!-- Header -->

        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../public/img/ThinkPro-Logo-PNG cut.png" alt="" height="35" class="d-inline-block align-text-top">
                </a>
                <div class="dropdown d-flex">
                    <div class=" d-flex">
                        <i class="fa-solid fa-user my-auto mx-3"></i>
                        <p class="my-auto">Admin</p>
                    </div>
                    <button class=" dropdown-toggle bg-transparent border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                  </div>
            </div>
        </nav>
        </div>
        <div class="row">
            <div class="col-10 mx-auto" style = "margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-body rounded min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="admin_home.php" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="admin_user.php" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Member management</a>
                            <a href="admin_category.php" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Category management</a>
                            <a href="admin_product.php" class="btn border-0 rounded text-start bg-primary text-light" tabindex="-1" role="button" aria-disabled="true">Product management</a>
                            <a href="admin_order.php" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Order management</a>
                          </div>
                    </div>
                    <div class="col-9 ">

                        <!-- Title -->
                         <div class="row">
                            <div class="col">
                                <h2 class="text-muted mb-4">Add product</h2>
                            </div>
                         </div>

                         <!-- Main -->
                        <div class="row">
                                <form role="form" method="POST" action ="?controller=product&action=update" enctype="multipart/form-data">
                                    <?php 
                                        echo "<pre>";
                                        echo print_r($record);
                                        echo "</pre>";
                                        foreach($record as $item){
                                        list($product,$images) = $item;
                                    ?>
                                    <div class="row">
                                        <div class="col-8">

                                            <div class="mb-3 d-none">
                                                <label for="product_id" class="form-label">Product ID</label>
                                                <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $item['product_id'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="product_name" class="form-label">Product name</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $item['product_name'] ?>" required>
                                            </div>
                                    
                                            <div class="mb-3">
                                                <label for="product_price" class="form-label">Price</label>
                                                <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $item['product_price'] ?>"  required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="product_promotion" class="form-label">Promotion</label>
                                                <input type="text" class="form-control" id="product_promotion" name="product_promotion" value="<?php echo $item['product_promotion'] ?>"  required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="category_select" class="form-label">Select category</label>
                                                <select id="category_select" class="form-select" name="product_category">
                                                        <!-- Get all category -->
                                                    <?php
                                                    //    $select_all_category = "SELECT * FROM category";
                                                    //         $query_all_category = mysqli_query($connect,$select_all_category);
                                                    //         if(mysqli_num_rows($query_all_category) > 0){
                                                    //             while($row = mysqli_fetch_assoc($query_all_category)){
                                                    ?>

                                                        <option value= "<?php echo $row['category_id'] ?>"> <?php echo $row['category_name'] ?> </option>

                                                    <?php
                                                        //     }
                                                        // }
                                                    ?>

                                                </select>
                                            </div>


                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="featured_product" name="featured_product" value="1" <?php if($item['product_featured']==1){echo "checked";} ?>>
                                                <label class="form-check-label" for="featured_product">Featured product</label>
                                            </div>

                                            <div class="mb-3">
                                                <label for="floatingTextarea">Description</label>
                                                <textarea class="form-control" id="product_description" name="product_description"><?php echo $item['product_description'] ?></textarea>
                                            </div>
                                        </div>

                                       <!-- File img -->
                                        <div class="col-4">
                                 
                                            <div class="col-12">
                                                <label for="product_img" class="form-label">Product image</label>
                                                <input class="form-control" type="file" id="product_img" name="product_img[]" onchange = "loadFile(event)" multiple>
                                                <div id = "images_preview">
                                                    <?php
                                                    foreach($images as $img){
                                                     ?>
                                                    <img class="col-12 my-3" id = "img_preview" src = "public/upload/<?php echo $img['image_link'] ?>">
                                                        
                                                    <?php
                                                        }
                                                    ?>
                                                </div> 
                                                

                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                    <input type="submit" class="btn btn-success my-2 col-2" value= "Edit" name="submit_btn"></input>
                                </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        CKEDITOR.replace(product_description);
    </script>
    <script>
            const img = (src) => '<img class="col-12 my-3" src = "'+src+'">';
            function loadFile(event) {
            let output = document.getElementById('images_preview');
            output.innerHTML = '';
            console.log([...event.target.files]);
            [...event.target.files].forEach(
                (file) => (output.innerHTML += img( URL.createObjectURL(file)))
            );
            // output.src = URL.createObjectURL(event.target.files[0]);
            console.log(output.src);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
    
            };
    </script>
</body>
</html>