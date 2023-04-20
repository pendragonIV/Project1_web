
        <div class="row" style = "padding:5em 0;min-height: 30em; background-color:#000;">
            <div class="col-6 mx-auto">
                    
                        <?php
                        foreach($userIn4 as $user){
                        ?>
                        <div class="mb-3">
                            <input class="border-0 col-12 pt-3 bg-transparent text-white fw-bold fs-5"  value="THÔNG TIN NGƯỜI DÙNG" style="outline: none;" disabled>
                        </div>
                        <div class="mb-3">
                            <input class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder = "Tên đăng nhập" value="<?php echo $user['user_name'] ?>" name = "user_name" style="outline: none;" disabled>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder = "Họ và tên" value="<?php echo $user['full_name'] ?>" name = "full_name" style="outline: none;" disabled>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder = "Email" name = "user_email" value="<?php echo $user['user_email'] ?>" style="outline: none;" disabled>
                        </div>

                        <?php
                        }
                        ?>
                        <div class="mb-3">
                            <input class="border-0 col-12 pt-3 bg-transparent text-white fw-bold fs-5"  value="ĐƠN HÀNG ĐÃ MUA" style="outline: none;" disabled>
                        </div>
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

                                foreach ($order as $userOrder){
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
        
        </div>
