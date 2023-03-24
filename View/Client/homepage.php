
         <!-- CAROUSEL -->
         <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide p-0" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="public/images/20230302_2TDLg3fR14OpOg8U.png" class="d-block w-100" style= "object-fit: cover; height: 40em; object-position: 0% 0%;" alt="public/images/20230302_2TDLg3fR14OpOg8U.png">
                  </div>
                  <div class="carousel-item">
                    <img src="public/images/20230302_iDwfjcWv2w8MFbw9.png" class="d-block w-100" style= "object-fit: cover; height: 40em; object-position: 0% 0%;" alt="public/images/20230302_2TDLg3fR14OpOg8U.png">
                  </div>
                  <div class="carousel-item">
                    <img src="public/images/20230302_M9hCqnTL55m20wtE.png" class="d-block w-100" style= "object-fit: cover; height: 40em; object-position: 0% 0%;" alt="public/images/20230302_2TDLg3fR14OpOg8U.png">
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
                <img class="col-12" src="public/images/20230228_f9ll0hoepFPaC7Kp.jpeg" style="object-fit: cover; height: 40em; object-position: 0% 0%;" alt="">
                <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">QUẦN JEANS</div>
            </a>
            <a href ="" class="col-6 p-0 position-relative category--main">
                <img class="col-12" src="public/images/20230228_VygJVdKGouMd3z5O.jpeg" style="object-fit: cover; height: 40em; object-position: 0% 0%;" alt="">
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
                <?php
                foreach($productNewest as $prdNew){

                    echo '<a href ="" class="item__block">
                        <img src="public/upload/'.$prdNew['image_link'].'" alt=""> 
                        <div class = "item__block__swatch">
                         <ul class = "swatch__type">';

                ?>
                <?php
                    $count = 0;
                    foreach($productImages as $img){
                        if ($prdNew['product_id'] == $img['product_id']){
                            echo '<li>
                                <img class = "swatching--img" src = "public/upload/'.$img['image_link'].'" />
                            </li>';
                            $count++;
                        }
                        if($count == 3){
                            break;
                        }

                    }
                ?>
                <?php
                    echo '</ul>
                        </div>
                        </a>';

                }
                ?>
                
            </div>
        </div>


        <!-- STORES -->


        <div class="row my-5">
            <p class="text-center m-0 fw-bold fs-5">STORE</p>
        </div>

        <div class="row mb-5">
            <div class="owl-carousel owl-store position-relative px-0">
                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="public/images/100dongtac.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">100 ĐÔNG CÁC - HÀ NỘI</div>
                </a> 

                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="public/images/loduc.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">109 LÒ ĐUC - HÀ NỘI</div>
                </a> 

                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="public/images/levansy.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">367 LÊ VĂN SỸ - HCM</div>
                </a> 

                <a href=""  class="col-6 p-0 position-relative stores__list">
                    <img src="public/images/lethirieng.jpg" alt="" style="object-fit: cover; object-position: 0% 0%;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5">66 LÊ THỊ RIÊNG - HCM</div>
                </a> 
            </div>
        </div>
