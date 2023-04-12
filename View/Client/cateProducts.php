<!-- page location -->
        <div class="bg-light px-5 py-2" style="font-size: .9em;"> 
            <a href="" class="text-decoration-none text-dark">
                Trang chủ
            </a>
            <span class = "text-muted"> / Giỏ hàng</span>

        </div>

        <div class="d-flex px-3 my-5">
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
                    <?php
                    $count = 0;
                    foreach($cateProducts as $prd){

                    ?>
                    <div class="col-3 mb-3">
                    <a href ="?redirect=detail&id=<?php echo $prd['product_id'] ?>" class="item__block d-block">
                        <img class="col-12" src="public/upload/<?php echo $prd['image_link'] ?>" alt="" style="height:25em;object-fit: cover;"> 
                        <div class = "item__block__swatch">
                        <ul class = "swatch__type">
                            <?php
                            $count = 0;
                            foreach($productImages as $img){
                                if ($prd['product_id'] == $img['product_id']){

                            ?>
                            <li>
                                <img class = "swatching--img" src = "public/upload/<?php echo $img['image_link'] ?>" style="height:4em;" />
                            </li>
                            <?php
                                $count++;
                                }
                                if($count == 3){
                                    break;
                                }

                            }
                            ?>
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

                    <?php
                    $count++;
                    }
                    if ($count == 0){
                        echo '<div class="text-center fs-5">Không có sản phẩm nào</div>';
                    }
                    ?>
                
        
                </div>
            </div>
        </div>


    <script src = "public/JS/cateProducts.js"></script>
