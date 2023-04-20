<div class="bg-black row py-5" >
    <div class="mx-auto col-7 mt-5 fs-4 text-light fw-bold">Tìm kiếm đơn hàng</div>
    <form class="d-flex mx-auto col-7 my-5" style="min-height:5em;" method="GET" action="?redirect=get_order" >
        <input class="d-none" name = "redirect" value="get_order">

        <input class="col-10 border-0 ps-2 disable_focus_form" name = "search" placeholder="Số điện thoại" <?php if(isset($searchIn4)){ echo 'value="'.$searchIn4.'"' ;} ?> >
                                    
        <button class="p-0 m-0 col-2 bg-light border-0" type="submit" name = "search_btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
    <?php
    if(isset($getOrders)){
    ?>
    <div class="col-7 mx-auto mb-5">
        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-3 text-light" scope="col">Ngày mua</th>
                                    <th class="col-4 text-light" scope="col">Trạng thái</th>
                                    <th class="col-3 text-light" scope="col">Tổng</th>
                                    <th class="col-2 text-light" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($getOrders as $userOrder){
                                    $status = '';
                                    switch ($userOrder['receipt_status']){
                                        case 0:{
                                            
                                            $status = 'Chưa xác nhận';
                                            break;
                                          }
                                          case 1:{
                                            
                                            $status = 'Đã xác nhận';
                                            break;
                                          }
                                          case 2:{
                                            
                                            $status = 'Đang vận chuyển';
                                            break;
                                          }
                                          case 3:{
                                            
                                            $status = 'Đã nhận';
                                            break;
                                          }
                                    }

                                ?>
                                <tr>
                                    <th class="text-light" scope="row"><?php echo $userOrder['receipt_date'] ?></th>
                                    <th class="text-light" scope="row"><?php echo $status ?></th>
                                    <th class="text-light" scope="row"><?php 
                                    foreach ($total as $sum){
                                        if($userOrder['receipt_id']==$sum['receipt_id']){ echo number_format((int)$sum['total'],0,'','.');}
                                    } 
                                    ?> ₫</th>
                                    <th class="text-light" scope="row"><a class="text-light" href="?redirect=vieworder&id=<?php echo $userOrder['receipt_id'] ?>">XEM</a></th>
                                </tr>

                                <?php

                                }

                                ?>

                            </tbody>
        </table>
    </div>
    <?php
    }
    ?>
</div>
