<?php
$active_tab = 'products';
$active_sub_tab = 'products';
$prependScript="<style>
  .img-thumbnail {
    max-height:100px;
  }
  .bg-warn{
    background:#e9c7d0;
  }
</style>";
require_once('templates/header.php');
require_once('templates/sidebar.php');
$products = $QueryFire->getAllData('products',' is_deleted=0 ','SELECT p.*,c.name as category FROM products as p LEFT JOIN categories as c ON c.id=p.cat_id WHERE p.is_deleted=0');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Products <a href="add-product" class="btn btn-primary btn-sm float-right">Add Product</a> <!--<a href="export-data?allProducts=1" class="btn btn-secondary pull-right btn-sm">Export Products</a> --></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product Management</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?php echo !empty($msg)?'<h5 class="text-center text-success">'.$msg.'</h5>':''?>
            <table class="table table-bordered table-bordered table-hover dt-responsive" style="width:100%;">
              <thead>
                <tr>
                  <th>Item Code</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($products)) {
                  foreach($products as $product) { ?>
                  <tr>
                    <td><?php echo $product['item_code'];?></td>
                    <td><?php echo ucfirst($product['name']);?></td>
                    <td><?= makeShortString(strip_tags(html_entity_decode($product['details'])),200)?></td>
                    <td><?php echo ucfirst($product['category']);?></td>
                    <td><img src="../images/products/<?= $product['image_name']?>" class="img-thumbnail img-responsive" /></td>
                    <td>
                      <a href="edit-product?product_id=<?php echo $product['id'];?>" class="btn btn-info btn-xs"> Edit</a> 
                      <a class="btn btn-danger btn-xs delete-product" data-id="<?php echo $product['id'];?>"> Delete</a> 
                    </td>
                  </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
$appendScript = '
  <script>
    $(document).ready(function() {
      var table = jQuery(".dt-responsive").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
               extend: "copy",
               footer: true,
               exportOptions: {
                  columns: [0,1,2,3]
                }
            },
            {
               extend: "csv",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3]
                }
              
            },
            {
               extend: "excel",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3]
                }
            },
            {
               extend: "pdf",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3]
                }
            }
        ]
      });
      jQuery(document).on("click",".delete-product",function(e){
        if(jQuery(this).data("id") != "") {
          var id = jQuery(this).data("id");
          var This = $(this);
          bootbox.confirm({
              message: "'."<span class='text-danger'>Are you sure you want to delete this product?</span>".'",
              buttons: {
                confirm: {
                  label: "Yes",
                  className: "btn-success"
                },
                cancel: {
                  label: "No",
                  className: "btn-danger"
                }
              },
              callback: function (result) {
                if(result) {
                  $.ajax({
                    url:"query",
                    method:"post",
                    data:{"action":"delete-product","id":id},
                    success:function(response) {
                      if(response=="success") {
                        bootbox.alert("Product Deleted");
                        //table.row( $(This).parents("tr") ).remove().draw();
                        window.location.reload();
                      }
                    }
                  });
                }
              }
          });
        }
      });
    });
  </script>';
require_once('templates/footer.php');?>