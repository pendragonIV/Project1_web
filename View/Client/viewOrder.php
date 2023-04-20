<div class = "col-8 mx-auto my-5">
<div class="row">
   <div class="col-8">
      <div class="fs-5 fw-bold my-3 text-muted">Customer information</div>
      <?php
         foreach($getOrder as $order){
         
         ?>
      <table class="table my-3">
         <tr>
            <td class="col-3">Customer name</td>
            <td class="col-9"><?php echo $order['customer_name'] ?></td>
         </tr>
         <tr>
            <td class="col-3">Customer phone number</td>
            <td class="col-9"><?php echo $order['customer_phone'] ?></td>
         </tr>
         <tr>
            <td class="col-3">Customer address</td>
            <td class="col-9"><?php echo $order['customer_address'] ?></td>
         </tr>
         <tr>
            <td class="col-3">Customer note</td>
            <td class="col-9"><?php echo $order['order_note'] ?></td>
         </tr>
         <?php
            $color = '';
            $status = '';
            switch($order['receipt_status']){
              case 0:{
                $color = 'bg-danger';
                $status = 'Chưa xác nhận';
                break;
              }
              case 1:{
                $color = 'bg-success';
                $status = 'Đã xác nhận';
                break;
              }
              case 2:{
                $color = 'bg-warning';
                $status = 'Đang vận chuyển';
                break;
              }
              case 3:{
                $color = 'bg-primary';
                $status = 'Đã giao';
                break;
              }
            }
            ?>
         <tr>
            <td class="col-3">Order status</td>
            <td class="col-9">
               <p class="<?php echo $color ?> rounded fs-6 py-1 text-center text-light col-9"> <?php echo $status ?> </p>
            </td>
         </tr>
         <?php
            if($acceptBy != ''){
            ?>
         <tr>
            <td class="col-3">Accepted by</td>
            <td class="col-9"><?php echo $acceptBy ?></td>
         </tr>
         <?php
            }
            ?>
      </table>
      <?php
         }
         ?>
      <div class="fs-5 fw-bold my-3 text-muted">Customer's product</div>
      <!-- Item -->
      <?php
         foreach($getDetail as $product){
         ?>
      <div class="col-12 border shadow p-4 bg-body my-2 d-flex" style="border-radius: 1em;">
         <img class="col-2 p-1 border rounded" src="public/upload/<?php echo $product['image_link'] ?>" >
         <div class="col-7 px-3 my-auto">
            <p class="fw-bold"><?php echo $product['product_name'] ?> - <?php echo $product['size_name'] ?> (<?php echo $product['product_amount'] ?>)</p>
            <div class="">
               <span class="fw-bold text-danger"><?php echo  number_format((int)$product['recent_price'],0,'','.');  ?></span>
               <del class="mx-1"><?php echo  number_format((int)$product['product_price'],0,'','.');  ?></del>
            </div>
         </div>
         <div class="col-3 my-auto" >
            <p class="fw-bold text-danger text-end"><?php echo  number_format((int)($product['recent_price']*$product['product_amount']),0,'','.');  ?></p>
            </p>
         </div>
      </div>
      <?php
         }
        ?>
   </div>
      <!-- Total -->
      <div class="col-4">
                        
                        <?php
                        foreach($total as $sumary){
                        ?>
                        
                        <div class="col-12 border shadow px-3 pt-3 bg-body my-2" style="border-radius:1em;">
                            <p class="fs-5 fw-bold">
                                <i class="fa-regular fa-clipboard me-1"></i>
                                Order summary</p>
                            
                            <div class="border-bottom ">
                                <div class="d-flex justify-content-between mt-3">
                                    <span>Provisional</span>
                                    <span><?php echo number_format((int)$sumary['total_price'],0,'','.'); ?></span>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex justify-content-between my-3">
                                    <span>Total</span>
                                    <span class="text-danger fw-bold"><?php echo number_format((int)$sumary['total_price'],0,'','.'); ?></span>
                                </div>
                            </div>
                        </div>
    
                        <?php
                        }
                        ?>

                    </div>
   </div>
</div>