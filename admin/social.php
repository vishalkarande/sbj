<?php
$active_tab = 'social';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'add':
        //check already exists or not
        $data = $QueryFire->getAllData('coupons',' code="'.trim(strip_tags($_POST['code'])).'"');
        if(empty($data)) {
          $QueryFire->insertData("coupons",array('code'=>trim(strip_tags($_POST['code'])),'discount'=>trim(strip_tags($_POST['discount'])),'is_active'=>trim(strip_tags($_POST['is_active']))));
          $msg = 'Coupon added successfully.';
        } else {
          $msg = 'Coupon already exists.';
        }
        unset($data);
        break;
    case 'update':
        //check already exists or not
        $data = $QueryFire->getAllData('coupons',' code="'.trim(strip_tags($_POST['code'])).'" and id !='.$_POST['id']);
        if(empty($data)) {
          $QueryFire->upDateTable("coupons",' id='.$_POST['id'],array('code'=>trim(strip_tags($_POST['code'])),'discount'=>trim(strip_tags($_POST['discount'])),'is_active'=>trim(strip_tags($_POST['is_active']))));
          $msg = 'Coupon updated successfully.';
        } else {
          $msg = 'Coupon already exists.';
        }
        unset($data);
        break;
    case 'delete':
        //$QueryFire->deleteDataFromTable("coupons",' id='.$_POST['id']);
        $QueryFire->upDateTable("coupons",' id='.$_POST['id'],array('is_deleted'=>1));
        $msg = 'Coupon deleted successfully.';
        break;
  }
}
$retailors = $QueryFire->getAllData('coupons',' is_deleted=0 order by id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Social
             <!-- <button class="btn btn-primary dev-add float-right">Add Social</button> -->
            </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Coupons</li>
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
            <table class="data-table table table-bordered table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Social</th>
                  <th>URL</th>
                  <th>Active</th>
                  <th>Added On</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($retailors)) { $cnt=1;
                  foreach($retailors as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td class="cat"><?php echo $row['code'];?></td>
                    <td class="discount"><?php echo $row['discount'];?></td>
                    <td class="is_active" data-id="<?php echo $row['is_active']?>"><?php echo $row['is_active']?"Yes":"No" ;?></td>
                    <td><?php echo $row['date'];?></td>
                    <td>
                      <button class="btn btn-success btn-xs dev-edit mt-1" data-id="<?php echo $row['id'];?>">Edit</button>
                      <button class="btn btn-danger btn-xs dev-delete mt-1" data-id="<?php echo $row['id'];?>">Delete</button>
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
              <label for="name">Social:</label>
              <input class="form-control category" name="code" required placeholder="Enter coupon code" type="text">
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="name">URL:</label>
                      <div class="input-group">
                          <input type="text" class="form-control discountT" name="discount" placeholder="URL" aria-label="Discount" aria-describedby="basic-addon1"  >
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-percent"></i></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="name">Active:</label>
                      <select class="form-control is_activeT" name="is_active">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                      </select>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="user_action" class="user_action">
            <input type="hidden" name="id" class="user_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="add" >Submit</button>
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
          code: "required",
          discount: {
              required:true,
             
          }
        },
        messages: {
          code: "Enter coupon code",
          discount: "Enter valid discount",
        },
        errorElement: "span",
      	  errorPlacement: function (error, element) {
      	    error.addClass("invalid-feedback");
      	    element.closest(".form-group").append(error);
      	  },
      	  highlight: function (element, errorClass, validClass) {
      	    $(element).addClass("is-invalid");
      	  },
      	  unhighlight: function (element, errorClass, validClass) {
      	    $(element).removeClass("is-invalid");
      	  }
      });
      jQuery(document).on("click",".dev-add",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .user_action").val("add");
        jQuery("#add-edit-modal .modal-title").html("Add New Coupon Code");
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-edit",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .modal-title").html("Update Coupon");
        jQuery("#add-edit-modal .user_action").val("update");
        jQuery("#add-edit-modal .user_id").val(jQuery(this).data("id"));
        jQuery("#add-edit-modal .discountT").val(jQuery(this).parents("tr").find(".discount").text());
        jQuery("#add-edit-modal .is_activeT").val(jQuery(this).parents("tr").find(".is_active").data("id"));
        jQuery("#add-edit-modal .category").val(jQuery(this).parents("tr").find(".cat").text());
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this coupon?",
                  message: "<span class='."'text-danger'".'>All related information will be deleted.</span>",
                  buttons: {
                    confirm: {
                      label: "Yes",
                      className: "btn-success btn-sm"
                    },
                    cancel: {
                      label: "No",
                      className: "btn-danger btn-sm"
                    }
                  },
                  callback: function (result) {
                    if(result) {
                        jQuery(".active_inactive-form input:nth(0)").val(id);
                        jQuery(".active_inactive-form input:nth(1)").val("delete");
                      jQuery(".active_inactive-form").submit();
                    }
                  }
              });
          }
      });
    });
  </script>';
require_once('templates/footer.php');?>