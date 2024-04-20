<?php
$active_tab = 'pincodes';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'add':
        $data = $QueryFire->getAllData('pincodes',' pincode="'.trim(strip_tags($_POST['pincode'])).'"');
        if(empty($data)) {
          $QueryFire->insertData("pincodes",array('pincode'=>trim(strip_tags($_POST['pincode'])),'delivery_charge'=>trim(strip_tags($_POST['delivery_charge'])),'is_show'=>trim(strip_tags($_POST['is_show']))));
          $msg = 'Pincode added successfully.';
        } else {
          $msg = 'Pincode already exists.';
        }
        unset($data);
        break;
    case 'update':
        //check already exists or not
        $data = $QueryFire->getAllData('pincodes',' pincode="'.trim(strip_tags($_POST['pincode'])).'" and id !='.$_POST['id']);
        if(empty($data)) {
          $QueryFire->upDateTable("pincodes",' id='.$_POST['id'],array('pincode'=>trim(strip_tags($_POST['pincode'])),'delivery_charge'=>trim(strip_tags($_POST['delivery_charge'])),'is_show'=>trim(strip_tags($_POST['is_show']))));
          $msg = 'Pincode updated successfully.';
        } else {
          $msg = 'Pincode already exists.';
        }
        unset($data);
        break;
    case 'delete':
        //$QueryFire->deleteDataFromTable("pincodes",' id='.$_POST['id']);
        $QueryFire->upDateTable("pincodes",' id='.$_POST['id'],array('is_deleted'=>1));
        $msg = 'Pincode deleted successfully.';
        break;
  }
}
$retailors = $QueryFire->getAllData('pincodes',' is_deleted=0 order by id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Pincodes <button class="btn btn-primary dev-add float-right">Add Pincode</button></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Pincodes</li>
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
                  <th>Pincode</th>
                  <th>Delivery Charge</th>
                  <th>Showing</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($retailors)) { $cnt=1;
                  foreach($retailors as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td class="cat"><?php echo $row['pincode'];?></td>
                    <td class="delivery_charge"><?php echo $row['delivery_charge'];?></td>
                    <td class="is_active" data-id="<?php echo $row['is_show']?>"><?php echo $row['is_show']?"Yes":"No" ;?></td>
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
              <label for="name">Pincode:</label>
              <input class="form-control category" name="pincode" required placeholder="Enter pincode" type="text">
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="name">Delivery Charge:</label>
                      <div class="input-group">
                          <input type="text" class="form-control delivery_chargeT" name="delivery_charge" placeholder="Delivery charge" aria-label="Delivery charge" aria-describedby="basic-addon1" >
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-rupee-sign"></i></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="name">Show:</label>
                      <select class="form-control is_activeT" name="is_show">
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
          delivery_charge: {
              required:true,
              number:true,
          },
          pincode: {
            required:true,
            number:true,
            maxlength:6,
            minlength:6,
          }
        },
        messages: {
          pincode: {
            required:"Enter pincode",
            number:"Enter valid pincode",
            maxlength:"Pincode must be 6 digits",
            minlength:"Pincode must be 6 digits",
          },
          delivery_charge: "Enter valid delivery charge",
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
        jQuery("#add-edit-modal .modal-title").html("Add New Pincode");
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-edit",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .modal-title").html("Update Pincode");
        jQuery("#add-edit-modal .user_action").val("update");
        jQuery("#add-edit-modal .user_id").val(jQuery(this).data("id"));
        jQuery("#add-edit-modal .delivery_chargeT").val(jQuery(this).parents("tr").find(".delivery_charge").text());
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