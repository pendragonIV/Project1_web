<!-- page location -->
    

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

                        <!-- List cate -->
                        <?php
                        foreach ($cateParents as $cate){
                            if($cate['parent_id'] == 0){
                        ?>
                        <li class="mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                <a class="text-decoration-none text-muted" href="?redirect=category&category_id=<?php echo $cate['category_id'] ?>">
                                    <?php echo $cate['category_name'] ?>
                                </a>
                                <i onclick="showFilter(this)" class="fa-solid fa-chevron-down mx-2 d-inline-block py-1" style="font-size: .8em;"></i>
                            </div>
                            
                            <!-- Child option -->

                            <ul class="list-unstyled text-muted ps-3" id = "option__container">

                            <?php
                            foreach ($cateChilds as $cateChild){
                                if($cateChild['parent_id'] == $cate['category_id']){
                            ?>
                                <li  class="mt-2">
                                    <a class="text-decoration-none text-muted" href="?redirect=category&category_id=<?php echo $cateChild['category_id'] ?>">
                                        <?php echo ucwords($cateChild['category_name']) ?>
                                    </a>
                                    
                                </li>
                            <?php
                                }
                            }
                            ?>

                            </ul>
                
                        </li>
                        
                        <?php
                                } 
                        }
                        ?>

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

                        <?php
                        foreach($size as $prdSize) {
                        ?>
                        <li class="mt-2">
                            <a class="text-decoration-none text-muted" href="?redirect=category&size=<?php echo $prdSize['size_id'] ?>">
                                <?php echo $prdSize['size_name'] ?>
                            </a>
                        </li>

                        <?php
                        }
                        ?>

                    </ul>
                </div>
                                        
            </div>

            <!-- Products -->
            <div class="col-10">
                <div class="row">
                    <?php
                    $count = 0;
                    foreach($cateProducts as $prd){

                    ?>
                    <div class="col-3 mb-5">
                    <a href ="?redirect=detail&id=<?php echo $prd['product_id'] ?>" class="item__block d-block">
                        <img class="col-12" src="public/upload/<?php echo $prd['image_link'] ?>" alt="" style="height:25em;object-fit: cover;"> 
                        <div class = "item__block__swatch">
                        <ul class = "swatch__type">
                            <?php
                            $countImg = 0;
                            foreach($productImages as $img){
                                if ($prd['product_id'] == $img['product_id']){

                            ?>
                            <li>
                                <img class = "swatching--img" src = "public/upload/<?php echo $img['image_link'] ?>" style="height:4em;" />
                            </li>
                            <?php
                                $countImg++;
                                }
                                if($countImg == 3){
                                    break;
                                }

                            }
                            ?>
                        </ul>
                        </div>
                    </a>
                    <a href="?redirect=detail&id=<?php echo $prd['product_id'] ?>" class="text-decoration-none" style="font-size: .8em;">
                            <div class="fw-bold text-dark my-1" >
                                <?php echo $prd['product_name'] ?>
                            </div>
                            <div class="text-muted" >
                                <del class="me-3"><?php echo number_format((int)$prd['product_price'],0,'','.'); ?>₫ </del>
                                <span class="fw-bold">
                                    <?php echo number_format((int)($prd['product_price']-($prd['product_price'] * ($prd['product_promotion']/100))),0,'','.'); ?> ₫
                                </span>
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
                
                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <?php
                                        if(isset($categoryId)){

                                        ?>
                                        <?php
                                            if($currentPage > 1){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&category_id='.$categoryId.'&page='.($currentPage - 1).'" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        ?>

                                        <?php
                                            for($i = 0; $i < $totalPage; $i++){
                                                echo '<li class="page-item"><a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&category_id='.$categoryId.'&page='.($i + 1).'">'.($i + 1).'</a></li>';
                                            }
                                        ?>

                                        <?php
                                            if($currentPage < $totalPage){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&category_id='.$categoryId.'&page='.($currentPage + 1).'" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        ?>

                                        <?php
                                        }else{
                                        ?>

                                        <?php
                                            if($currentPage > 1){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&page='.($currentPage - 1).'" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        ?>

                                        <?php
                                            for($i = 0; $i < $totalPage; $i++){
                                                echo '<li class="page-item"><a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&page='.($i + 1).'">'.($i + 1).'</a></li>';
                                            }
                                        ?>

                                        <?php
                                            if($currentPage < $totalPage){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&page='.($currentPage + 1).'" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        }
                                        ?>

                                    </ul>
                </nav>

            </div>
        </div>


    <script src = "public/JS/cateProducts.js"></script>
