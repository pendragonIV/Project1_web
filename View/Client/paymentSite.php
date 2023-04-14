
        <form method="POST" action="?redirect=add_order" class="my-5" >

          <div class="row">
            <div class="col-7 pt-5">

                <!-- Link to customer home page -->

                <div class="col-8 bg-dark mx-5 mb-4">
                  <a class= "col d-block" href="">
                    <img class="col-7 mx-auto d-block" src="../product_img/imglogo.png" alt="">
                  </a>
                </div>

                <!-- Form for customer -->

                <div class="col-8 mx-5 border-bottom pb-5">
                    <p class="fs-5 text-secondary">Thông tin giao hàng</p>

                    <div class="mb-3">
                      <input type="text" class="form-control" id="input__name" placeholder="Họ và tên" name="customer_name" required>
                    </div>

                    <div class="row">

                      <div class="mb-3 col-8">
                        <input type="email" class="form-control" id="input__email" placeholder="Email" name="customer_email"  required>
                      </div>
  
                      <div class="mb-3 col-4">
                        <input type="text" class="form-control" id="input__phone" placeholder="Số điện thoại" name="customer_phone"  required>
                      </div>

                    </div>

                    <div class="mb-3">
                      <input type="text" class="form-control" id="input__address" placeholder="Địa chỉ" name="customer_address"  required>
                    </div>

                    <div class="mb-3">
                      <textarea class="form-control" id="customer_more" name = "customer_note" placeholder="Ghi chú" rows="3"  required></textarea>
                    </div>

                    <p class="fs-5 text-muted">Phương thức thanh toán</p>
                    <div class="mb-3 form-check border rounded py-3">
                      <input type="radio" class="form-check-input mx-1 check__radio" id="exampleCheck1" checked required>
                      <label class="form-check-label ms-2" for="exampleCheck1">Thanh toán tại nhà - Cash On Delivery (COD)</label>
                    </div>
                </div>
                
            </div>

            <div class="col-5 border-start pt-5">

                <!-- products -->
                <div class="overflow-auto" <?php if(sizeof($_SESSION['cart']) > 1){ echo 'style = "height:20em;"';} ?>>

                <?php
                    if(isset(($_SESSION['cart'])) && $_SESSION['cart'] != []){
                        for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                ?>
                       <div class="d-flex mt-3">
                        <img class= "col-2 px-2" src="public/upload/<?php echo $_SESSION['cart'][$i]['product_image']; ?>" alt="">
                        <input class= "d-none" type="text" name= "product_<?php echo $i; ?>_id" value = "<?php  echo $_SESSION['cart'][$i]['product_id']?>">
                        <input class= "d-none" type="text" name= "product_<?php echo $i; ?>_price" value = "<?php  echo $_SESSION['cart'][$i]['product_price'] * $_SESSION['cart'][$i]['product_quantity'] ?>">
                        <input class= "d-none" type="text" name= "product_<?php echo $i; ?>_quantity" value = "<?php  echo $_SESSION['cart'][$i]['product_quantity']?>">
                        <p class="col-7 px-2 m-0"><?php echo $_SESSION['cart'][$i]['product_name']; ?> - <?php echo $_SESSION['cart'][$i]['product_size']; ?></p>
                        <p class="col-3 text-end px-2"><?php echo number_format((int)($_SESSION['cart'][$i]['product_price'] * $_SESSION['cart'][$i]['product_quantity']),0,'','.'); ?>₫</p>
                       </div>
                <?php
                        }
                      }
                ?>
                </div>

                <!-- order -->
                <div class="col-9 mx-auto border-bottom pb-3 pt-5">

                    <div class="d-flex justify-content-between px-2 py-2 text-muted">
                      <span>Tạm tính</span>
                      <span>1,380,000 ₫</span>
                    </div>
                    <div class="d-flex justify-content-between px-2 py-2 text-muted">
                      <span>Chiết khấu</span>
                      <span>-181,000 ₫</span>
                    </div>
                    <div class="d-flex justify-content-between px-2 py-2 text-muted">
                      <span>Phí vận chuyển</span>
                      <span>Shop sẽ liên hệ sau</span>
                    </div>
                </div>

                <div class="col-9 mx-auto border-bottom py-3">
                  
                  <div class="d-flex justify-content-between px-2 py-2 text-muted fs-5">
                    <span>Tổng tiền</span>
                    <span>1,199,000 ₫</span>
                  </div>
                </div>
                
                <div class="col-9 mx-auto border border-2 border-dark my-4 p-4">
                    <span>
                      Chúng tôi sẽ XÁC NHẬN đơn hàng bằng EMAIL hoặc ĐIỆN THOẠI. Bạn vui lòng kiểm tra EMAIL hoặc NGHE MÁY ngay khi đặt hàng thành công và CHỜ NHẬN HÀNG nha.
                    </span>
                </div>

                <!-- nav area -->
                <div class="col-9 mx-auto">
                  
                  <div class="d-flex">
                    <div class="col-6 position-relative">
                      <a href = "" class=" position-absolute top-50 start-0 translate-middle-y text-decoration-none text-dark back__cart__btn">
                        <i class="fa-solid fa-chevron-left fs-6 position-relative"></i>
                        <span class="mx-2">Giỏ hàng</span>
                      </a>
                    </div>
                    <div class="col-6">
                      <button type="submit" name = "add_ord" class="p-3 col-12 create__order__btn">Hoàn tất đơn hàng</button>
                    </div>
                  </div>
                </div>

            </div>
          
          </div>

        </form>
