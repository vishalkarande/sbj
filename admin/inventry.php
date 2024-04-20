<?php
$active_tab = "products";
$active_sub_tab = 'inventry';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'update':
        $data = $QueryFire->getAllData('inventry',' id ='.$_POST['id'])[0];
        $inventory = array();
        $data['purchase_qty'] = $inventory['purchase_qty'] = $_POST['qty'];
        $inventory['qty'] = $data['qty'] = $data['qty'] + $_POST['qty'];
        $data['purchase_rate'] = $inventory['purchase_rate'] = $_POST['rate'];
        $data['price'] = $inventory['price'] = $_POST['price'];
        $data['discount'] = $inventory['discount'] = $_POST['discount'];
        $QueryFire->upDateTable("inventry",' id='.$_POST['id'],$inventory);
        unset($data['id']);
        $QueryFire->insertData('inventry_log',$data);
        $msg = 'Record updated successfully.';
        unset($data);
        break;
    case 'reset':
        $data = $QueryFire->getAllData('inventry',' id ='.$_POST['id'])[0];
        $data['purchase_qty'] = '-'.$_POST['resetqty'];
        unset($data['id']);
        $QueryFire->upDateTable("inventry",' id='.$_POST['id'],array('qty'=> ( $data['qty'] - $_POST['resetqty']),'purchase_qty'=> '-'.$_POST['resetqty']));
        $QueryFire->insertData('inventry_log',$data);
        $msg = 'Record updated successfully.';
        unset($data);
        unset($product);
        break;
  }
}
$data = $QueryFire->getAllData('','','SELECT p.item_code,p.name,ppv.param_value as param_meter,php.name as param, i.* FROM products as p JOIN inventry as i ON i.product_id=p.id JOIN product_params_values as ppv ON ppv.id=i.param_value_id JOIN product_has_params as php ON php.id=ppv.param_id WHERE p.is_deleted=0');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inventry Management </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="products">Products</a></li>
            <li class="breadcrumb-item active">Inventry Management</li>
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
            <table class="table table-bordered table-striped table-bordered table-hover dt-responsive nowrap" style="width:100%;">
              <thead>
                <tr>
                  <th>Item Code</th>
                  <th>Name</th>
                  <th>Unit</th>
                  <th>Purchase Rate</th>
                  <th>Sales Rate</th>
                  <th>Remaining Qty</th>
                  <th>Added Qty</th>
                  <th>Discount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($data)) {
                  foreach($data as $row) { ?>
                  <tr <?php echo $row['qty']<5?'class="bg-warning"':'';?> >
                    <td><?php echo $row['item_code'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $param = $row['param'].' : '.$row['param_value'].$row['param_meter'];?></td>
                    <td><?php echo $row['purchase_rate'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['purchase_qty'];?></td>
                    <td><?php echo $row['discount'];?></td>
                    <td>
                      <button class="btn btn-success btn-xs dev-edit mt-1" data-name="<?php echo $row['name'];?>"  data-id="<?php echo $row['id'];?>" data-param="<?php echo $param;?>"   >Edit</button>
                      <button class="btn btn-danger btn-xs dev-reset-qty mt-1" data-name="<?php echo $row['name'];?>"  data-id="<?php echo $row['id'];?>" >Reset qty</button>
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
  <form class="active_inactive-form" method="post">
    <input type="hidden" name="id" />
    <input type="hidden" name="user_action" />
  </form>
  <div id="add-edit-modal" class="modal fade" role="dialog"  data-backdrop="static">
    <div class="modal-dialog">
      <form method="post" action="" class="add-edit-form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Product Name:</label>
              <input class="form-control category" readonly required type="text">
            </div>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="name">Unit:</label>
                      <input class="form-control param" readonly type="text">
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="name">Quantity:</label>
                      <input class="form-control" name="qty" required placeholder="Enter quantity" type="text">
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="name">Sales Rate:</label>
                      <input class="form-control" name="price" required placeholder="Enter sales rate" type="text">
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="name">Purchase Rate:</label>
                      <input class="form-control" name="rate" required placeholder="Enter purchase rate" type="text">
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="name">Discount:</label>
                      <input class="form-control" value="0" name="discount" required placeholder="Enter discount" type="text">
                    </div>
                </div>
            </div>
            <input type="hidden" name="user_action" class="user_action">
            <input type="hidden" name="id" class="user_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div id="reset-modal" class="modal fade" role="dialog"  data-backdrop="static">
    <div class="modal-dialog">
      <form method="post" action="" class="reset-form" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Product Name:</label>
              <input class="form-control category" readonly required type="text">
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="name">Quantity:</label>
                      <input class="form-control" required name="resetqty" required placeholder="Enter quantity to be reset" type="text">
                    </div>
                </div>
            </div>
            <input type="hidden" name="user_action" class="user_action">
            <input type="hidden" name="id" class="user_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php 
$appendScript = '
  <script>
    $(document).ready(function() {
      var validator = jQuery(".add-edit-form").validate({
        rules: {
          qty: {
            required:true,
            number:true
          },
          price: {
            required:true,
            number:true
          },
          qty: {
            required:true,
            number:true
          },
          rate: {
            required:true,
            number:true
          }
        },
        messages: {
          qty: {
            required:"Enter quantity",
            number:"Enter valid quantity"
          },
          rate: {
            required:"Enter purchase rate",
            number:"Enter valid purchase rate"
          }
        }
      });
      jQuery(document).on("click",".dev-edit",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .modal-title").html("Update Stock");
        jQuery("#add-edit-modal .user_action").val("update");
        jQuery("#add-edit-modal .user_id").val(jQuery(this).data("id"));
        jQuery("#add-edit-modal .category").val(jQuery(this).data("name"));
        jQuery("#add-edit-modal .param").val(jQuery(this).data("param"));
        jQuery("#add-edit-modal").modal("show");
      });
      var validator1 = jQuery(".reset-form").validate({
        rules: {
          resetqty: {
            required:true,
            number:true
          },
        },
        messages: {
          resetqty: {
            required:"Enter quantity",
            number:"Enter valid quantity"
          },
        }
      });
      jQuery(document).on("click",".dev-reset-qty",function(e){
        validator1.resetForm();
        jQuery("#reset-modal .modal-title").html("Reset Quantity Stock");
        jQuery("#reset-modal .user_action").val("reset");
        jQuery("#reset-modal .user_id").val(jQuery(this).data("id"));
        jQuery("#reset-modal .category").val(jQuery(this).data("name"));
        jQuery("#reset-modal").modal("show");
      });
      var table = jQuery(".dt-responsive").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
               extend: "copy",
               footer: true,
               exportOptions: {
                  columns: [0,1,2,3,4,5,6,7]
                }
            },
            {
               extend: "csv",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4,5,6,7]
                }
              
            },
            {
               extend: "excel",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4,5,6,7]
                }
            },
            {
               extend: "pdf",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4,5,6,7]
                }
            }
        ]
      });
    });
  </script>';
require_once('templates/footer.php');?>