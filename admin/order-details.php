<?php
session_start();
if(!empty($_POST['order_id'])) {
  require_once("query.php");
  $products = $QueryFire->getAllData('products',' id in ( SELECT product_id FROM order_has_products WHERE order_id='.$_POST['order_id'].')');
  //$products = $QueryFire->getAllData('','','SELECT ohp.qty as quantity,ohp.param_value_id, ohp.discount,ohp.price,p.id,p.slug,p.name FROM order_has_products as ohp JOIN products as p ON p.id=ohp.product_id WHERE ohp.order_id='.$_POST['order_id']);
  $order_products = $QueryFire->getAllData('order_has_products',' order_id='.$_POST['order_id']);
  if(!empty($products)) {
    $inventry = $QueryFire->getAllData('','','SELECT ppv.param_value as param_meter,php.name as param, i.* FROM products as p JOIN inventry as i ON i.product_id=p.id JOIN product_params_values as ppv ON ppv.id=i.param_value_id JOIN product_has_params as php ON php.id=ppv.param_id WHERE product_id in ('.implode(',',array_column($products,'id')).')');
    foreach($products as $key=>$product) {
        $products[$key]['params'] = array_values(array_filter($inventry,function($a) use($product) {
            return $product['id']==$a['product_id'];
        }));
    }
  }
  $order = $QueryFire->getAllData('orders',' id= "'.$_POST['order_id'].'"')[0];


  $user = $QueryFire->getAllData('users',' id= "'.$order['user_id'].'"')[0];
  $address = array('address'=>$user['address'],'pincode'=>$user['pincode'],'name'=>$user['name'],'mobile_no'=>$user['mobile_no'],'street'=>'','city'=>'','state'=>'');
  // if($order['address_id'] != 0) {
  //   $address = $QueryFire->getAllData('user_addresses',' id= "'.$order['address_id'].'"')[0];
  // }
  $filters = $params = array();
  ?>
  <div class="card">
    <div class="card-header">
      <strong>Order Details- #GS<?php echo $order['id'];?></strong> 
    </div>
    <div class="card-body card-block">
      <h4 class="text-center"><strong>Customer Details</strong></h4>
      <div class="row mt-3">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class="label">Customer Name</label>
            <input type="text" class="form-control" readonly name="name" value="<?php echo trim($order['user_name']);?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class=" form-control-label">Customer Mobile</label>
            <input type="text"  class="form-control" readonly name="customer_mobile" value="<?php echo trim($order['phone_number']);?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class=" form-control-label">Customer Address</label>
            <input type="text"  class="form-control" readonly name="customer_address" value="<?php echo trim($order['address']);?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class=" form-control-label">State</label>
            <input type="text"  class="form-control" readonly name="customer_address" value="<?php echo trim($order['state']);?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class=" form-control-label">Email</label>
            <input type="text"  class="form-control" readonly name="street" value="<?php echo trim($order['email']);?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class=" form-control-label">Payment Status</label>
            <input type="text"  class="form-control" readonly name="customer_address" value="<?php echo ($order['is_paid'] == 1) ? "paid" : "Not paid";?>">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label class=" form-control-label">Pincode</label>
            <input type="text"  class="form-control" readonly name="pincode" value="<?php echo trim($order['pincode']);?>">
          </div>
        </div>
      </div>
      <h4 class="text-center"><strong>Products</strong></h4><br>
      <div class="table-responsive">
        <table class="datatable-1 datatable  table table-hover table-condensed table-bordered table-product dt-responsive nowrap" style="overflow: auto;">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Qty</th>
              <th>Price</th>
            
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $grandTotal=0;
            foreach($products as $value) { 
         
              ?>
                <tr>
                  <td>
                    <?php echo ucwords($value['name']) ?>
                    <?php 
                    $filter = array_values(array_filter($order_products,function($a) use($value) {
                        return $value['id']==$a['product_id'];
                    }))[0];                 
                    $pkey = array_search($filter['param_value_id'],array_column($value['params'],'id')); 
                    echo '<br><strong>'.$value['params'][$pkey]['param'].' </strong>: '.$value['params'][$pkey]['param_value'].' '.$value['params'][$pkey]['param_meter'];
                    ?>
                  </td>
                  <td>
                    <?php echo $filter['qty'];?>
                  </td>
                  <td><?php echo $value['params'][0]['price'];?></td>
                  
                  <td><?php echo $subtotal = ($filter['qty'] *  $value['params'][0]['price'] ) ;$grandTotal+= $subtotal;?> </td>
                </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" class="text-right"><strong>Sub Total : </strong></td>
              <td><?php echo $grandTotal;?></td>
            </tr>
            
           
            <tr>
              <td colspan="4" class="text-right"><strong>Grand Total : </strong></td>
              <td><?php echo ($order['grand_total']);?></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="form-group">
        <button class="btn btn-primary dev-btn-back">Back</button>
      </div>
    </div>
  </div>
<?php } ?>