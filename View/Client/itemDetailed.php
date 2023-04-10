

    <div class="container-fluid px-0">
        <div class="row">
             <!-- Page location -->
             <div class="bg-light px-5 py-2" style="font-size: .9em;"> 
                <a href="" class="text-decoration-none text-dark">
                    Trang chủ
                </a>
                <span class = "text-muted"> / Giỏ hàng</span>

            </div>
        </div>

        <!-- Product  -->
        <div class="row mt-5 mx-1">
            <div class="col-8">

                <!-- list img of product -->
                <ul class="list-unstyled d-flex flex-wrap">
                    <?php
                        foreach ($productImage as $img){

                            echo '<li class = "col-6 p-1">
                                <a class =" fancybox" data-fancybox="gallery" href ="public/upload/'.$img['image_link'].'">
                                    <img class = "col-12" src = "public/upload/'.$img['image_link'].'" alt = ""  />
                                </a>
                            </li>';

                        }
                    ?>

                </ul>
            </div>

            <div class="col-4 px-5">
                <!-- Product In4 block -->
                <form role="form" method="post" action ="?controller=<?php echo $controller; ?>&redirect=cart&action=add" enctype="multipart/form-data">
                    <?php 
                        
                        foreach ($productIn4 as $in4){

                    ?>
                    <div class="border-bottom">
                        <div class="mb-3 d-none">
                            <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $in4['product_id'] ?>" required>
                        </div>
                        <div class="mb-3 d-none">
                            <input type="text" class="form-control" id="product_img" name="product_img" value="<?php echo $in4['image_link'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control border-0 p-0 fw-bold mb-3 fs-4" id="product_name" name="product_name" value="<?php echo $in4['product_name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control border-0 p-0 fw-bold fs-6" id="product_price" name="product_price" value="<?php echo $in4['product_price'] ?>" required>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <div class="border-bottom">
                    <div class="d-flex my-3">
                            <label class="col-1 py-1 me-2 position-relative select__size position-relative border border-1 border-dark">
                                <input type="radio" class="col-12 h-100 radio_custom" value="S" name = "product_size" required></input>
                                <span class="text-white position-absolute start-0 ps-1 ">S</span>
                            </label>

                            <label class="col-1 py-1 me-2 position-relative select__size position-relative border border-1 border-dark">
                                <input type="radio" class="col-12 h-100 radio_custom" value="M" name = "product_size"></input>
                                <span class="text-white position-absolute start-0 ps-1 ">M</span>     
                            </label>

                            <label class="col-1 py-1 me-2 position-relative select__size position-relative border border-1 border-dark">
                                <input type="radio" class="col-12 h-100 radio_custom" value="L" name = "product_size"></input>
                                <span class="text-white position-absolute start-0 ps-1 ">L</span>
                            </label>

                            <label class="col-1 py-1 me-2 position-relative select__size position-relative border border-1 border-dark">
                                <input type="radio" class="col-12 h-100 radio_custom" value="XL" name = "product_size"></input>
                                <span class="text-white position-absolute start-0 ps-1 ">XL</span>
                            </label>

                        </div>
                    
                        <p onclick="" class="text-decoration-underline fw-bold d-inline-block">HƯỚNG DẪN CHỌN KÍCH CỠ</p>
                    </div>

                    <div>
                        <input type="submit" class="col-12 p-2 fw-bold addToCart_btn my-3" value= "CHỌN MUA" name="submit_btn"></input>
                    </div>

                    <div id="accordion">

                        <div class="text-muted py-3 border-bottom" style="font-size: .8em;">

                          <div class="">
                            <a class="text-decoration-none text-muted d-flex justify-content-between" data-bs-toggle="collapse" href="#collapseOne">
                              <span>
                                THÔNG TIN SẢN PHẨM
                              </span>
                              <i class="fa-solid fa-chevron-down" style="font-size: .8em;"></i>
                            </a>
                          </div>
                          <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                            <div class="">
                                <p class="my-2">MÔ TẢ:</p>

                                <?php echo $in4['product_description'] ?>
                                
                                <p class="my-2">SỐ ĐO:</p>
                                
                                Size: S - M - L - XL ( Cm )</br>
                                
                                - Dài áo: 70 - 72 - 74 - 76</br>
                                
                                - Rộng thân áo: 49 - 51 - 53 - 55</br>
                                
                                - Dài tay: 22 - 23 - 24 - 25</br>
                            </div>
                          </div>
                          
                        </div>

                        <div class="text-muted py-3 border-bottom" style="font-size: .8em;">

                            <div class="">
                              <a class="text-decoration-none text-muted d-flex justify-content-between" data-bs-toggle="collapse" href="#collapseTwo">
                                <span>
                                    HƯỚNG DẪN BẢO QUẢN
                                </span>
                                <i class="fa-solid fa-chevron-down" style="font-size: .8em;"></i>
                              </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                              <div class="mt-2">
  
                                  - Giặt máy chế độ nhẹ (Cho vào túi lưới giặt). </br>
                                  - Lộn trái khi giặt. </br>
                                  - Không dùng các chất tẩy mạnh. </br>
                                  - Giặt riêng các sản phẩm tối màu và sáng màu. </br>
                                  - Không giặt khô. </br>
                                  - Giặt nhiệt độ thường dưới 30 độ C. </br>
                                  - Phơi thường không sấy, tránh ánh nắng trực tiếp. </br>
                                  - Giũ phẳng khi phơi. </br>
                                  - Là (ủi) ở nhiệt độ thấp. </br>
                              </div>
                            </div>
                            
                          </div>

                    </div>
                      
                </form>

               <!-- Social media link  -->
               <div class="d-flex justify-content-between my-3 text-muted">
                <span style="font-size: .8em;">FOLLOW</span>

                <div>
                    <a class="d-inline-block text-dark" href="">
                        <i class="fa-brands fa-facebook fs-5 ms-2"></i>
                    </a>
                    <a class="d-inline-block text-dark" href="">
                        <i class="fa-brands fa-instagram fs-5 ms-2"></i>
                    </a>
                </div>

               </div>

               
               <div class="text-muted" style="font-size: .9em;">
                <p>
                    Tag Instagram @highway_menswear để chúng tôi tìm thấy feedback của bạn nhé!
                </p>
                <p>
                    #HIGHWAYMENSWEAR
                </p>
                </div>

            </div>
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

                    echo '<a href ="?redirect=detail&id='.$prdNew['product_id'].'" class="item__block">
                        <img src="public/upload/'.$prdNew['image_link'].'" alt=""> 
                        <div class = "item__block__swatch">
                         <ul class = "swatch__type">';

                ?>
                <?php
                    $count = 0;
                    foreach($images as $img){
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
    </div>

