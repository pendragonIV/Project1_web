<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
    <link rel="stylesheet" href="public/CSS/itemDetailed_custom.css">
    <link rel="stylesheet" href="public/CSS/payment_site.css">

    <link rel="stylesheet" href="public/CSS/custom_home.css" <?php echo time(); ?>>
    <style>
        .head__payment__btn:hover{
            background-color: #000;
            color: #fff;
            transition: .5s;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid p-0 position-relative">

        <!-- HEADER -->
        <div class="row bg-black">
                <marquee scrollamount="15" class="bg-black">
                    <div class="my-1 my-lg-2">
                        <span style="margin-right: 40em;">
                            <a class ="text-decoration-none text-white fw-bold" style="font-size: 1.1em;" href="/last-chance-pm127760.html"> Last Chance </a>
                        </span >
                            <a class ="text-decoration-none text-white fw-bold" style="font-size: 1.1em;" href="/extra-members-day-pm124374.html"> Extra Member's Day </a>
                        </span>
                    </div>
                </marquee>
    
                <div class="navbar__sticky bg-black d-flex px-5 py-2" id="navbar__sticky">
                    <div class="col-5">
                        <ul class="d-flex flex-row list-unstyled m-0 h-100">
                            <li class="col-3">
                                <a class ="nav__link--red" href="">
                                    <p class="py-3 m-0">LAST CHANCE</p>
                                </a>
                            </li>
    
                            <li class="nav__dropdown col-3">
                                <a class ="nav__link--custom" href="">
                                    <p class="py-3 m-0">SẢN PHẨM</p>
                                </a>
                                <div class="nav__dropdown--content">
                                    <ul class="mx-5 list-unstyled d-flex border-top border-1 border-secondary py-5">
                                        <ul class="col-3 text-white list-unstyled">
                                            <li>
                                                <p class = "dropdown__link--custom fw-bold">ĐẶC BIỆT</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Hàng Mới</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Bán Chạy</p>
                                            </li>
                                            
                                        </ul>

                                        <?php
                                        
                                        foreach ($cateParents as $cate){
                                            if($cate['parent_id'] == 0){
                                        ?>
                                        <ul class="col-3 text-white list-unstyled">
                                            <li>
                                                <a class="text-decoration-none text-light" href="?redirect=category&category_id=<?php echo $cate['category_id'] ?>">
                                                    <p class = "dropdown__link--custom fw-bold"> <?php echo mb_strtoupper($cate['category_name']) ?> </p>
                                                </a>
                                            </li>
                                            <?php
                                            foreach ($cateChilds as $cateChild){
                                                if($cateChild['parent_id'] == $cate['category_id']){
                                            ?>
                                            <li>
                                                <a class="text-decoration-none text-light"  href="?redirect=category&category_id=<?php echo $cateChild['category_id'] ?>">
                                                    <p class = "dropdown__link--custom"> <?php echo ucwords($cateChild['category_name']) ?> </p>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>

                                        <?php
                                            } 
                                        }
                                        ?>

                                        <ul class="col-3 text-white list-unstyled">
                                            <img class = "col-12" src="public/images/20230303_ItbXhV8iqmuLYa3c.png" />
                                            <li class=" my-3">
                                                <p class = "dropdown__link--custom fw-bold">MUA NGAY</p>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </li>
    
                            <li class="col-3">
                                <a class ="nav__link--custom" href="">
                                    <p class="py-3 m-0">CÂU CHUYỆN</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                                        <!-- brand img -->
                    <div class="col-2">
                        <a class= "col" href="?controller=">
                            <img class = "col-12" src="public/images/imglogo.png" alt="Imglogo" />
                        </a>
                    </div>
                        

                    <div class="col-5">
                        <ul class="d-flex flex-row-reverse list-unstyled m-0">
                            <div class="dropdown py-3 col-1 text-end">
                                <button class="bg-transparent border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user text-white fs-5 py-1"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <!-- CHECK FOR LOGIN OR LOGOUT -->
                                    <?php
                                    if(!isset($_SESSION['permission'])){
                                    ?>

                                    <li><a class="dropdown-item" href="?controller=login">Login</a></li>

                                    <?php
                                    }else{
                                    ?>

                                    <li><a class="dropdown-item" href="?controller=login&action=logout">Logout</a></li>
                                    <li><a class="dropdown-item" href="#">Thông tin</a></li>

                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>  


                            <li class="py-3 col-1 text-end">
                                <i onclick="slideIn()" class="fa-solid fa-cart-shopping text-white fs-5 py-1"></i>
                            </li>
                            <li  class="col-5 py-3">
                                <form class="d-flex border col-12" method="GET" action="?redirect=search">
                                    <input class="d-none" name = "redirect" value="search">

                                    <input class="col-10 border-0 ps-2 disable_focus_form" name = "search" placeholder="Tìm kiếm">
                                    
                                    <button class="p-0 m-0 col-2 bg-light border-0" type="submit" name = "search_btn">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                                
                            </li>
                        </ul>
                    </div>
                </div>
        </div>

        <!-- Switch content based page -->
        <?php
            if($redirect == '' || $redirect == 'home'){
                require_once "View/Client/homepage.php";
            }else{
                switch($redirect){
                    case 'detail': {
                        require_once "View/Client/itemDetailed.php";
                        break;
                    }
                    case 'cart': {
                        require_once "View/Client/cart.php";
                        break;
                    }
                    case 'search': {
                        require_once "View/Client/searchProduct.php";
                        break;
                    }
                    case 'category': {
                        require_once "View/Client/cateProducts.php";
                        break;
                    }
                    case 'payment': {
                        require_once "View/Client/paymentSite.php";
                        break;
                    }
                }
            }
            
        ?>
        

        <!-- FOOTER -->

        <div class="row py-5 bg-black">
            
            <!-- img -->
            <div class="footer__img col-12">
                <a class = "col d-block" href="">
                    <img src="public/images/imglogo.png" class = "col-2 d-block mx-auto mb-5" alt="">
                </a>
            </div>

            <!-- certificate -->
            <div class="col-3">
                <a href="http://online.gov.vn/Home/WebDetails/101915">
                    <img class="col-8" src="public/images/dathongbaobocongthuong.png" alt="">
                </a>
            </div>

            <!-- about -->
            <div class="col-3 fs-small text-white">
                <p class="fw-bold">VỀ CHÚNG TÔI</p>

                HIGHWAY MENSWEAR <br>

                Đại diện bởi: NGUYỄN THỊ THÚY <br>

                Mã ĐKKD: 01D8025897 <br>

                MST: 0106958307 <br>

                Ngày cấp: 05/01/2015 <br>

                Nơi cấp: Phòng Tài chính Kế hoạch – UBND Quận Hai Bà Trưng <br>

                Địa chỉ: Số 109 Lò Đúc, phường Phạm Đình Hổ, quận Hai Bà Trưng, thành phố Hà Nội <br>

                Gọi mua hàng/Tư vấn: 083 311 0666 <br>

                Khiếu nại, góp ý: 081 822 6266 <br>

                Email: highway.menswear@gmail.com <br>
            </div>
            

            <!-- stores -->
            <div class="col-3 fs-small text-white">
                <p class="fw-bold ">HỆ THỐNG CỬA HÀNG</p>

                <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    1. 100 Đông Các, Quận Đống Đa, Hà Nội
                </a>
                <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    2. 109 Lò Đúc, Quận Hai Bà Trưng, Hà Nội
                </a>
                <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    3. 367 Lê Văn Sỹ, Phường 12, Quận 3, Hồ Chí Minh
                </a>
                <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    4. 66 Lê Thị Riêng, Bến Thành, Quận 1, Hồ Chí Minh
                </a>
                <p class="fw-bold ">Hotline : 0833110666 </p>
            </div>


            <!-- social media -->
            <div class="col-3 fs-small text-white">
                <p class="fw-bold ">FANPAGE</p>

                <div>
                   <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    Facebook
                    </a> 
                </div>
                
                <div>
                   <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    Instagram
                    </a> 
                </div>
                
                <div>
                    <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    Youtube
                    </a>
                </div>
                
                <div>
                    <a class="d-inline-block text-decoration-none text-white dropdown__link--custom" href="">
                    Tiktok
                    </a>
                </div>
                
            </div>

        </div>
        
        <!-- CART SLIDER -->

        <div class="col-12 position-fixed bg-black-50" id="slide__container" style="min-height: 60em;">
            <div class="col-7" style="min-height: 60em;" onclick="slideOut()"></div>
            <div class="col-5 bg-white slide__cart " id="slide__cart--id" style="min-height: 60em;">
            
                <div class="col-9 mx-auto">
                    <div class="py-5">
                        Giỏ hàng
                    </div>


                    <!-- products -->
                    <div class="overflow-auto" <?php if(isset($_SESSION['cart'])){if(sizeof($_SESSION['cart']) > 1){ echo 'style = "height:25em;"';}} ?>>
                        
                    <?php
                    if(isset(($_SESSION['cart'])) && $_SESSION['cart'] != []){
                        for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    ?>
                    <div class="py-3 border-bottom border-2 border-dark">
                        <div class="d-flex mt-3">
                            <img class="col-2" src="public/upload/<?php echo $_SESSION['cart'][$i]['product_image']; ?>" alt="">
                            <div class="col-9 px-3">
                                <div><?php echo $_SESSION['cart'][$i]['product_name']; ?> - <?php echo $_SESSION['cart'][$i]['product_size']; ?></div>
                                <div class="mt-2 d-flex">
                                    <div class = "d-inline-block col-4 d-flex me-2">
                                        Số lượng: <?php echo (int)$_SESSION['cart'][$i]['product_quantity']; ?>                           
                                    </div>

                                    <div class="col-4">
                                        <del><?php echo number_format((int)$_SESSION['cart'][$i]['normal_price'],0,'','.'); ?>₫ </del>
                                    </div>

                                    <div class="col-4">
                                        <span class="text-danger"><?php echo number_format((int)($_SESSION['cart'][$i]['product_price'] * $_SESSION['cart'][$i]['product_quantity']),0,'','.'); ?>₫</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-1 position-relative">
                                <a class="position-absolute top-50 start-50 text-dark " href="?redirect=cart&action=delete&itemId=<?php echo $i ?>">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    else{
                        echo  '<div class="fs-6 py-5 text-center"> Giỏ hàng trống </div>';
                    }
                    
                    ?>
                    </div>

                    <div class="d-flex justify-content-between py-2 text-muted">
                        <span>Tổng tiền</span>
                        <span>1,199,000 ₫</span>
                    </div>

                    <div class="d-flex my-5 justify-content-between">
                        <div class="col-6 pe-2">
                            <button onclick="slideOut()" class="p-3 col-12 slide__cart__btn">MUA THÊM</button>
                        </div>
                        <div class="col-6 pe-2">
                            <a href="?redirect=payment">
                              <button class="col-12 p-3 slide__cart__btn">THANH TOÁN</button>         
                            </a>
                        </div>
                       
                    </div>
                    
                    <a href="?redirect=cart" class="text-center text-muted check__cart__btn text-muted my-3">
                        Xem giỏ hàng
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>


        <!-- TO TOP BTN -->
        <button onclick="topFunction()" type="button" class="bg-black rounded-0 border border-white position-fixed bottom-0 end-0 mx-2 my-1" id="btn__to--top">
            <i class="fa-solid fa-arrow-up text-white px-1 py-2"></i>
        </button>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="public/JS/gallery.js"></script>
    <script src="public/JS/sticky_nav.js"></script>
    <script src="public/JS/to_top.js"></script>
    <script src="public/JS/slide_cart.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-newest-prd').owlCarousel({
                nav:true,
                items:4,
                loop:true,
                autoplay:true,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                margin:30,
                navText:['<i class="fa-solid fa-arrow-left fs-5"></i>','<i class="fa-solid fa-arrow-right fs-5"></i>'],
            });

            $('.owl-store').owlCarousel({
                nav:true,
                items:2,
                loop:true,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                navText:['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
            });

        });
        </script>
</body>
</html>