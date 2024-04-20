<?php
$active_tab = 'dashboard';
require_once('templates/header.php');
require_once('templates/sidebar.php');
$users = $QueryFire->getAllCount('users where is_deleted=0');
$brands = $QueryFire->getAllCount('brands');
$uploaded_lists = $QueryFire->getAllCount('uploaded_lists');
$requests = $QueryFire->getAllCount('contact_enquiry where 1');
$products = $QueryFire->getAllCount('products where is_deleted=0');
$new_orders = $QueryFire->getAllCount('orders WHERE is_deleted=0 and status="in-process"');
$data = $QueryFire->getAllData('','','SELECT sum(ohp.qty) AS sold,(ohp.price- (ohp.price * ohp.discount / 100) ) as price,sum( (ohp.price- (ohp.price * ohp.discount / 100) ) * ohp.qty ) AS total,p.name,p.item_code,p.id FROM order_has_products as ohp JOIN products as p ON p.id=ohp.product_id WHERE p.is_deleted=0 GROUP BY ohp.product_id');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $new_orders ?></h3>
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="new-orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $users ?></h3>
              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $requests ?></h3>
              <p>Contact Requests</p>
            </div>
            <div class="icon">
              <i class="fas fa-phone-volume"></i>
            </div>
            <a href="contact-request" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $products ?></h3>
              <p>Products</p>
            </div>
            <div class="icon">
              <i class="fab fa-product-hunt"></i>
            </div>
            <a href="products" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-pink">
            <div class="inner">
              <h3><?= $brands ?></h3>
              <p>Brands</p>
            </div>
            <div class="icon">
              <i class="far fa-flag"></i>
            </div>
            <a href="brands" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $uploaded_lists ?></h3>
              <p>Uploaded Lists</p>
            </div>
            <div class="icon">
              <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <a href="uploaded-lists" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <?php if(!empty($data)) { ?>
        <div class="row">
          <div class="col-12 ol-lg-12 col-md-12">
              <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title"><b>Sales Report</b></h3>
              </div>
              <div class="card-body">
                <table class="table table-valign-middle table-bordered table-striped table-bordered table-hover  nowrap dt-responsive" style="width:100%;">
                  <thead>
                      <tr>
                        <th>Item Code</th>
                        <th>Name</th>
                        <th>Sales Rate</th>
                        <th>Sold Qty</th>
                        <th>Total Sales Amount</th>
                      </tr>
                  </thead>
                  <tbody>
                        <?php foreach($data as $product) { ?>
                          <tr>
                            <td><?= $product['item_code'] ?> </td>
                            <td><?= $product['name'] ?> </td>
                            <td>&#x20B9; <?= $product['price'] ?> </td>
                            <td><?= $product['sold'] ?> </td>
                            <td>&#x20B9; <?= number_format($product['total'],2) ?> </td>
                          </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <?php } ?>
    </div><!-- /.container-fluid -->
  </section>
<?php 
$appendScript='<script>
    $(function(event) {
        var table = jQuery(".dt-responsive").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
               extend: "copy",
               footer: true,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
            },
            {
               extend: "csv",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
              
            },
            {
               extend: "excel",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
            },
            {
               extend: "pdf",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
            }
        ]
      });
    });
</script>';
require_once('templates/footer.php');?>
