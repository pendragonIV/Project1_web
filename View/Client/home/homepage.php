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

    <link rel="stylesheet" href="public/CSS/home_custom.css">
</head>
<body>
    
    <div class="container-fluid position-relative">

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
                                    <ul class="mx-5 list-unstyled d-flex border-top border-1 border-secondary pt-5">
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
                                        <ul class="col-3 text-white list-unstyled">
                                            <li>
                                                <p class = "dropdown__link--custom fw-bold">TRANG PHỤC</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Mới Nhất</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Mới Nhất</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Mới Nhất</p>
                                            </li>
                                        </ul>
                                        <ul class="col-3 text-white list-unstyled">
                                            <li>
                                                <p class = "dropdown__link--custom fw-bold">GIÀY & PHỤ KIỆN</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Mới Nhất</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Mới Nhất</p>
                                            </li>
                                            <li>
                                                <p class = "dropdown__link--custom">Mới Nhất</p>
                                            </li>
                                        </ul>
                                        <ul class="col-3 text-white list-unstyled">
                                            <img class = "col-12" src="../product_img/20230303_ItbXhV8iqmuLYa3c.png" />
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
    
                    <div class="col-2">
                        <a class= "col" href="">
                            <img class = "col-12" src="../product_img/imglogo.png" alt="Imglogo" />
                        </a>
                    </div>
                        
                    <div class="col-5">
                        <ul class="d-flex flex-row-reverse list-unstyled m-0">
                            <li class="py-3 col-1 text-end">
                                <i class="fa-solid fa-user text-white fs-5 py-1"></i>
                            </li>
                            <li class="py-3 col-1 text-end">
                                <i onclick="slideIn()" class="fa-solid fa-cart-shopping text-white fs-5 py-1"></i>
                            </li>
                            <li  class="col-5 py-3">
                                <form class="d-flex border col-12">
                                    
                                    <input class="col-10 border-0 ps-2 disable_focus_form" placeholder="Tìm kiếm">
                                    
                                    <button class="p-0 m-0 col-2 bg-light border-0" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                                
                            </li>
                        </ul>
                    </div>
                </div>
        </div>

         <!-- CAROUSEL -->
         <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide p-0" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../product_img/20230302_2TDLg3fR14OpOg8U.png" class="d-block w-100" style= "object-fit: cover; height: 40em; object-position: 0% 0%;" alt="../product_img/20230302_2TDLg3fR14OpOg8U.png">
                  </div>
                  <div class="carousel-item">
                    <img src="../product_img/20230302_iDwfjcWv2w8MFbw9.png" class="d-block w-100" style= "object-fit: cover; height: 40em; object-position: 0% 0%;" alt="../product_img/20230302_2TDLg3fR14OpOg8U.png">
                  </div>
                  <div class="carousel-item">
                    <img src="../product_img/20230302_M9hCqnTL55m20wtE.png" class="d-block w-100" style= "object-fit: cover; height: 40em; object-position: 0% 0%;" alt="../product_img/20230302_2TDLg3fR14OpOg8U.png">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>


         <!-- TOP_CATEGORIES -->

         <div class="row my-4">
            <a href="" class="col-6 p-0 position-relative category--main">
                <img class="col-12" src="../product_img/20230228_f9ll0hoepFPaC7Kp.jpeg" style="object-fit: cover; height: 40em; object-position: 0% 0%;" alt="">
                <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">QUẦN JEANS</div>
            </a>
            <a href ="" class="col-6 p-0 position-relative category--main">
                <img class="col-12" src="../product_img/20230228_VygJVdKGouMd3z5O.jpeg" style="object-fit: cover; height: 40em; object-position: 0% 0%;" alt="">
                <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">SƠ MI</div>
            </a>
        </div>


         <!-- NEWEST PRODUCT -->
        <div class="row my-5">
            <p class="text-center m-0 fw-bold fs-5">SẢN PHẨM MỚI</p>
            <a class="text-center text-decoration-none text-secondary" href="">Xem thêm</a>
        </div>

        <div class="row mx-3 mb-5">
            <div class="owl-carousel owl-newest-prd position-relative">
                <a href ="" class="item__block">
                   <img src="../product_img/_MG_7845.jpg" alt=""> 
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
                <a href ="" class="item__block">
                    <img src="../product_img/_MG_6317.jpg" alt=""> 
                    <div class = "item__block__swatch">
                         <ul class = "swatch__type">
                             <li>
                                 <img class = "swatch--img" src = "../product_img/_MG_6317.jpg" />
                             </li>
                             <li>
                                 <img class = "swatch--img" src = "../product_img/_MG_6317.jpg" />
                             </li>
                         </ul>
                     </div>
                 </a>
                 <a href ="" class="item__block">
                    <img src="../product_img/_MG_7836__3_.jpg" alt=""> 
                    <div class = "item__block__swatch">
                         <ul class = "swatch__type">
                             <li>
                                 <img class = "swatch--img" src = "../product_img/_MG_7836__3_.jpg" />
                             </li>
                             <li>
                                 <img class = "swatch--img" src = "../product_img/_MG_7836__3_.jpg" />
                             </li>
                         </ul>
                     </div>
                 </a>
                 <a href ="" class="item__block">
                    <img src="../product_img/_MG_7853__1_.jpg" alt=""> 
                    <div class = "item__block__swatch">
                         <ul class = "swatch__type">
                             <li>
                                 <img class = "swatch--img" src = "../product_img/_MG_7853__1_.jpg" />
                             </li>
                             <li>
                                 <img class = "swatch--img" src = "../product_img/_MG_7853__1_.jpg" />
                             </li>
                         </ul>
                     </div>
                 </a>
                 <a href ="" class="item__block">
                    <img src="../product_img/HW16012216902.jpg" alt=""> 
                    <div class = "item__block__swatch">
                         <ul class = "swatch__type">
                             <li>
                                 <img class = "swatch--img" src = "../product_img/HW16012216902.jpg" />
                             </li>
                             <li>
                                 <img class = "swatch--img" src = "../product_img/HW16012216902.jpg" />
                             </li>
                         </ul>
                     </div>
                 </a>
            </div>
        </div>


        <!-- STORES -->


        <div class="row my-5">
            <p class="text-center m-0 fw-bold fs-5">STORE</p>
        </div>

        <div class="row mb-5">
            <div class="owl-carousel owl-store position-relative px-0">
                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="../product_img/100dongtac.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">100 ĐÔNG CÁC - HÀ NỘI</div>
                </a> 

                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="../product_img/loduc.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">109 LÒ ĐUC - HÀ NỘI</div>
                </a> 

                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="../product_img/levansy.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">367 LÊ VĂN SỸ - HCM</div>
                </a> 

                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="../product_img/lethirieng.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">66 LÊ THỊ RIÊNG - HCM</div>
                </a> 
            </div>
        </div>
        
        <!-- FOOTER -->

        <div class="row py-5 bg-black">
            
            <!-- img -->
            <div class="footer__img col-12">
                <a class = "col d-block" href="">
                    <img src="../product_img/imglogo.png" class = "col-2 d-block mx-auto mb-5" alt="">
                </a>
            </div>

            <!-- certificate -->
            <div class="col-3">
                <a href="http://online.gov.vn/Home/WebDetails/101915">
                    <img class="col-8" src="../product_img/dathongbaobocongthuong.png" alt="">
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

        <div class="col-12 position-fixed bg-black-50" id="slide__container" style="height: 45em;">
            <div class="col-7" style="height: 45em;" onclick="slideOut()"></div>
            <div class="col-5 bg-white slide__cart " id="slide__cart--id" style="height: 45em;">
            
                <div class="col-9 mx-auto">
                    <div class="py-5">
                        Giỏ hàng
                    </div>
                    
                    <!-- products -->

                    <div class="py-3 border-bottom border-2 border-dark">
                        <div class="d-flex mt-3">
                            <img class="col-2" src="../product_img/_MG_6317.jpg" alt="">
                            <div class="col-9 px-3">
                                <div>ÁO BLAZER - HARRIS - CROPPED FIT - GHI</div>
                                <div class="mt-2 d-flex">
                                    <div class = "d-inline-block col-4 d-flex me-2">
                                        <input class = "col-4 border bg-white rounded-start" onclick="var result = document.getElementById('ammount'); var qty = result.value; if( !isNaN(qty) && qty > 1 ) result.value--;return false;" type='button' value='-' />
                                        <input id = "ammount" class ="col-4 border text-center" value = "1">
                                        <input class = "col-4 border bg-white rounded-end" onclick="var result = document.getElementById('ammount'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' />
                                    </div>

                                    <div class="col-4">
                                        <del> 1,380,000 ₫ </del>
                                    </div>

                                    <div class="col-4">
                                        <span class="text-danger">1,199,000 ₫</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-1 position-relative">
                                <i class="fa-solid fa-xmark position-absolute top-50"></i>
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <img class="col-2" src="../product_img/_MG_6317.jpg" alt="">
                            <div class="col-9 px-3">
                                <div>ÁO BLAZER - HARRIS - CROPPED FIT - GHI</div>
                                <div class="mt-2 d-flex">
                                    <div class = "d-inline-block col-4 d-flex me-2">
                                        <input class = "col-4 border bg-white rounded-start" onclick="var result = document.getElementById('ammount_prd2'); var qty = result.value; if( !isNaN(qty) && qty > 1 ) result.value--;return false;" type='button' value='-' />
                                        <input id = "ammount_prd2" class ="col-4 border text-center" value = "1">
                                        <input class = "col-4 border bg-white rounded-end" onclick="var result = document.getElementById('ammount_prd2'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' />
                                    </div>

                                    <div class="col-4">
                                        <del> 1,380,000 ₫ </del>
                                    </div>

                                    <div class="col-4">
                                        <span class="text-danger">1,199,000 ₫</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-1 position-relative">
                                <i class="fa-solid fa-xmark position-absolute top-50"></i>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between py-2 text-muted">
                        <span>Tổng tiền</span>
                        <span>1,199,000 ₫</span>
                    </div>

                    <div class="d-flex my-5 justify-content-between">
                        <div class="col-6 pe-2">
                            <button class="p-3 col-12 slide__cart__btn">MUA THÊM</button>
                        </div>
                        <div class="col-6 pe-2">
                             <button class="col-12  p-3 slide__cart__btn">THANH TOÁN</button>
                        </div>
                       
                    </div>
                    
                    <a href="" class="text-center text-muted check__cart__btn text-muted my-3">
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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