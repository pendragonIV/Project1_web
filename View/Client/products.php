<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="public/CSS/products.css">
    
</head>
<body>
    <div class="container-fluid p-0">

        <div class="bg-light px-5 py-2" style="font-size: .9em;"> 
            <a href="" class="text-decoration-none text-dark">
                Trang chủ
            </a>
            <span class = "text-muted"> / Giỏ hàng</span>

        </div>

        <div class="d-flex px-3 mt-5">
            <div class="col-2 me-4">

                <div class="border-top">
                    <div class="my-3" style="font-size: .8em;">
                        <span class=" fw-bold">
                            SHOP
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-3 text-muted" style="font-size: .8em;">
                        <span class="">Sản phẩm</span>
                        <i onclick="showFilter(this)" class="fa-solid fa-chevron-down mx-2 d-inline-block py-1" style="font-size: .8em;"></i>
                    </div>
                    <ul class="list-unstyled text-muted ps-3"  style="font-size: .8em;" id = "option__container">
                        <li class="mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <a>
                                Trang Phục
                                </a>
                                <i onclick="showFilter(this)" class="fa-solid fa-chevron-down mx-2 d-inline-block py-1" style="font-size: .8em;"></i>
                            </div>

                            <ul class="list-unstyled text-muted ps-3" id = "option__container">
                                <li class="mt-2">
                                    Áo
                                </li>

                                <li  class="mt-2">
                                    Quần
                                </li>

                            </ul>
                        </li>

                        <li class="mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <a>
                                    Giày & Phụ Kiện
                                </a>
                                <i onclick="showFilter(this)" class="fa-solid fa-chevron-down mx-2 d-inline-block py-1" style="font-size: .8em;"></i>
                            </div>

                            <ul class="list-unstyled text-muted ps-3" id = "option__container">
                                <li class="mt-2">
                                    Balo
                                </li>

                                <li  class="mt-2">
                                    Thắt Lưng
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="border-top">
                    <div class="my-3 d-flex justify-content-between" style="font-size: .8em;">
                        <span class=" fw-bold">
                            SIZE
                        </span>
                        <i onclick="showFilter(this)" class="fa-solid fa-chevron-down mx-2 d-inline-block py-1" style="font-size: .8em;"></i>
                    </div>

                    <ul class="list-unstyled text-muted ps-3" style="font-size: .8em;"  id = "option__container">
                        <li class="mt-2">
                            Balo
                        </li>

                        <li  class="mt-2">
                            Thắt Lưng
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-10">
                <div class="row">

                    <div class="col-4 mb-3">
                        <a href ="" class="item__block d-inline-block text-decoration-none">
                            <img src="../product_img/_MG_7845.jpg" alt="" class="col-12"> 
                            <div class = "item__block__swatch">
                             <ul class = "swatch__type">
                                 <li>
                                     <img class = "swatch--img" src = "../product_img/_MG_7845.jpg" />
                                 </li>
                                 <li>
                                     <img class = "swatch--img" src = "../product_img/_MG_7845.jpg" />
                                 </li>
                             </ul>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none" style="font-size: .8em;">
                            <div class="fw-bold text-dark my-1" >
                                    ÁO IN - CUPID - REGULAR FIT - TRẮNG
                            </div>
                            <div class="text-muted" >
                                    420,000 ₫
                            </div>
                        </a>
                    </div>
                
        
                </div>
            </div>
        </div>

    </div>

    <script src = "public/CSS/products.js"></script>
</body>
</html>