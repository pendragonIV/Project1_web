

        <div class="row">
            <!-- Page location -->
            <div class="bg-light px-5 py-2" style="font-size: .9em;"> 
                <a href="" class="text-decoration-none text-dark">
                    Trang chủ
                </a>
                <span class = "text-muted"> / Giỏ hàng</span>

            </div>
            
            <h3 class="col-9 ps-5 my-5 text-center">GIỎ HÀNG</h3>

            <div class="col-9 ps-5">

                <div class="bg-light py-3">
                    <table class="col-11 bg-white mx-auto mb-5">
                        
                    <?php
                         if(isset(($_SESSION['cart'])) && $_SESSION['cart'] != []){
                            for($i=0; $i < sizeof($_SESSION['cart']); $i++){
                    ?>
                        <tr>
                          
                          <td class="align-middle col-2">
                              <img src="public/upload/<?php echo $_SESSION['cart'][$i]['product_image'] ?>" alt="" class="col-12 p-2">
                          </td>
  
                          <td class="align-middle col-4">
                              Áo Blazer - Harris - Cropped Fit - Ghi - <span>S</span>
                          </td>
  
                          <td class="align-middle col-2">
                              <div class = "d-inline-block col-8 mx-auto d-flex me-2">
                                  <input class = "col-4 border bg-white rounded-start" onclick="var result = document.getElementById('ammount'); var qty = result.value; if( !isNaN(qty) && qty > 1 ) result.value--;return false;" type='button' value='-' />
                                  <input id = "ammount" class ="col-4 border text-center" value = "1">
                                  <input class = "col-4 border bg-white rounded-end" onclick="var result = document.getElementById('ammount'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' />
                              </div>
                          </td>
  
                          <td class="align-middle col-2">
                              <div class="fw-bold text-center">1,199,000 ₫</div>
                          </td>
  
                          <td class="align-middle col-2">
                              <div class="text-muted text-center">
                                  Thành tiền
                              </div>
  
                              <div class="text-danger fw-bold text-center">
                                  1,199,000 ₫
                              </div>
  
                              <div class="text-muted text-center" onclick="" type='button'>
                                  Xóa
                              </div>
                          </td>
                          
                        </tr>

                    <?php
                            }
                        } else{
                            echo  '<div class="fs-4 py-5 text-center"> Giỏ hàng trống </div>';
                        }
                    ?>

                    </table>

                    <div class="d-flex col-11 mx-auto">

                        <div class="col-6 pe-4">
                            <p class="fw-bold">Ghi chú đơn hàng</p>
                            <textarea class="form-control rounded-0" id="customer_more" rows="4"></textarea>
                        </div>

                        <div class="col-6 ps-4 mt-2" style="font-size: .9em;">
                            <div>
                                Hỗ trợ khách hàng đổi sản phẩm trong vòng 
                                <span class="fw-bold">
                                    15 ngày 
                                </span>
                                kể từ ngày nhận hàng online. Xem thêm về 
                                <a class="d-inline-block text-danger text-decoration-none fw-bold" href="">
                                    Chính sách đổi trả hàng.
                                </a>
                            </div>
                           
                            <div class="mt-2">
                                Hỗ trợ khách hàng bảo hành sản phẩm trong vòng 
                                <span class="fw-bold">
                                    30 ngày 
                                </span>
                                kể từ ngày nhận hàng online. Xem thêm về 
                                <a class="d-inline-block text-danger text-decoration-none fw-bold" href="">
                                    Chính sách bảo hành.
                                </a>
                            </div>

                            <div  class="mt-2">
                                 Tạo tài khoản và đăng nhập để theo dõi lịch sử mua hàng, tham gia ưu đãi dành riêng cho khách hàng thân thiết.
                            </div>
                           
                        </div>

                    </div>
                </div>



            </div>

            <div class="col-3 pe-5">

                    <a class="d-block text-end text-decoration-none text-dark" href="" style="font-size: .9em;">Tiếp tục mua hàng
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <div class="border p-3 mt-3">
                        <div class="fw-bold my-3">
                            Thông tin đơn hàng
                        </div>

                        <div class="d-flex justify-content-between py-3 text-muted border-bottom " style="font-size: .9em;">
                            <span>Tạm tính</span>
                            <span class="text-dark fw-bold">1,380,000 ₫</span>
                        </div>

                        <div class="d-flex justify-content-between py-3 fw-bold border-bottom " style="font-size: .9em;">
                            <span>Tạm tính</span>
                            <span>1,380,000 ₫</span>
                        </div>

                        <div class="text-muted py-3"  style="font-size: .9em;">
                            Bạn có thể nhập mã giảm giá ở trang thanh toán
                        </div>

                        <a href="">
                            <button  class="p-1 fw-bold col-12 head__payment__btn">THANH TOÁN</button>
                        </a>
                        
                    </div>
            </div>
        </div>
