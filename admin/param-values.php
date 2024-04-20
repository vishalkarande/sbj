<?php
$active_tab = "products";
$active_sub_tab = 'param values';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'add':
        $data = $QueryFire->getAllData('product_params_values',' param_value="'.trim(strip_tags($_POST['name'])).'"');
        if(empty($data)) {
          $QueryFire->insertData("product_params_values",array('param_id'=>$_POST['cat_id'],'param_value'=>trim(strip_tags($_POST['name']))));
          $msg = 'Param Values added successfully.';
        } else {
          $msg = 'Param Values already exists.';
        }
        unset($data);
        break;
    case 'update':
        $data = $QueryFire->getAllData('product_params_values',' param_value="'.trim(strip_tags($_POST['name'])).'" and id !='.$_POST['id']);
        if(empty($data)) {
          $QueryFire->upDateTable("product_params_values",' id='.$_POST['id'],array('param_id'=>$_POST['cat_id'],'param_value'=>trim(strip_tags($_POST['name']))));
          $msg = 'Param Values updated successfully.';
        } else {
          $msg = 'Param Values already exists.';
        }
        unset($data);
        break;
    case 'delete':
        $QueryFire->upDateTable("product_params_values",' id='.$_POST['id'],array('is_deleted'=>1));
        //$QueryFire->deleteDataFromTable("product_params_values",' id='.$_POST['id']);
        $msg = 'Param Values deleted successfully.';
        break;
  }
}

$data = $QueryFire->getAllData('','','SELECT pv.*,p.name as category FROM product_params_values pv LEFT JOIN product_has_params p ON p.id=pv.param_id WHERE pv.is_deleted=0 ORDER BY pv.id DESC');
$categories = $QueryFire->getAllData('product_has_params',' is_deleted=0 order by name ');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Param Values <button class="btn btn-primary dev-add">Add Param Value</button></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="products">Products</a></li>
            <li class="breadcrumb-item active">Param Values</li>
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
                  <th>Name</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($data)) { $cnt=1;
                  foreach($data as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td class="cat"><?php echo $row['param_value'];?></td>
                    <td><?php echo $row['category'];?></td>
                    <input type="hidden" class="cat_id" value="<?= $row['param_id']?>" />
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
              <label for="name">Category:</label>
              <select class="form-control category_id" name="cat_id">
                <option value=""> Select Category</option>
                <?php if(!empty($categories)) {
                  foreach($categories as $category) {
                    echo '<option value="'.$category['id'].'">'. ucwords(strtolower($category['name'])).'</option>';
                  }
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Param Values:</label>
              <input class="form-control category" name="name" required placeholder="Enter Param Value" type="text">
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
          name: "required",
          cat_id: "required",
        },
        messages: {
          name: "Enter Param Value",
          cat_id: "Select Parameter",
        }
      });
      jQuery(document).on("click",".dev-add",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .user_action").val("add");
        jQuery("#add-edit-modal .modal-title").html("Add New Param Value");
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-edit",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .modal-title").html("Update Param Value");
        jQuery("#add-edit-modal .user_action").val("update");
        jQuery("#add-edit-modal .user_id").val(jQuery(this).data("id"));
        jQuery("#add-edit-modal .category").val(jQuery(this).parents("tr").find(".cat").text());
        jQuery("#add-edit-modal .category_id").val(jQuery(this).parents("tr").find(".cat_id").val());
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this param value?",
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