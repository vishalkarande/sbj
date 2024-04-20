<?php
$active_tab = "products";
$active_sub_tab = 'categories';
$prependScript ='<style>
  .img-thumbnail {
    max-height:150px;
    max-width:180px;
  }
</style>';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
    $arr = array('level'=>1,'is_show'=>1,'parent_id'=>0,'name'=>trim(strip_tags($_POST['name'])));
  switch($_POST['user_action']) {
    case 'add':
        $slug = to_prety_url($_POST['name']);
        $data = $QueryFire->getAllData('categories',' name="'.trim(strip_tags($_POST['name'])).'"');
        if(!empty($data) && $data[0]['level']!=1 || $data[0]['is_deleted']==1) {
          $slug = $slug.rand(10,999);
          $data = array();
        }
        $arr['slug'] = $slug;
        $arr['reference'] = $_POST['reference'];
        if(empty($data)) {
            $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/categories/');
            if($ret['status'] && isset($ret['image_name'])) {
                $arr['image_name'] = $ret['image_name'];
            } else {
                $msg = 'Unable to upload file. Please try later.';
            }
          $QueryFire->insertData("categories",$arr);
          $msg = 'Category added successfully.';
        } else {
          $msg = 'Category already exists.';
        }
        unset($data);
        break;
    case 'update':
        $slug = to_prety_url($_POST['name']);
        $data = $QueryFire->getAllData('categories',' name="'.trim(strip_tags($_POST['name'])).'" and id !='.$_POST['id']);
        if(!empty($data) && $data[0]['level']!=1 || $data[0]['is_deleted']==1) {
          $slug = $slug.rand(10,999);
          $data = array();
        }
        $arr['slug'] = $slug;
        $arr['reference'] = $_POST['reference'];
        $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/categories/');
        if($ret['status'] && isset($ret['image_name'])) {
            $arr['image_name'] = $ret['image_name'];
            $duplicate = $QueryFire->getAllData('sliders',' id ='.$_REQUEST['id']);
            unlinkImage('../images/categories/'.$duplicate[0]['image_name']);
        } else {
            $msg = 'Unable to upload file. Please try later.';
        }
        if(empty($data)) {
          $QueryFire->upDateTable("categories",' id='.$_POST['id'],$arr);
          $msg = 'Category updated successfully.';
        } else {
          $msg = 'Category already exists.';
        }
        unset($data);
        break;
    case 'delete':
        $QueryFire->upDateTable("categories",' id='.$_POST['id'],array('is_deleted'=>1));
        //$QueryFire->deleteDataFromTable("categories",' id='.$_POST['id']);
        $msg = 'Category deleted successfully.';
        break;
  }
}
$categories = $QueryFire->getAllData('categories',' level=1 and is_deleted=0 order by id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Categories <button class="btn btn-primary dev-add">Add Category</button></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="products">Products</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
                  <th>Reference No</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($categories)) { $cnt=1;
                  foreach($categories as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td class="cat"><?php echo $row['name'];?></td>
                    <td class="reference"><?php echo $row['reference'];?></td>
                    <td>
                      <img src="../images/categories/<?php echo $row['image_name'];?>" class="img-responsive img-thumbnail">
                    </td>
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
              <input class="form-control category" name="name" required placeholder="Enter Category" type="text">
            </div>
            <div class="form-group" id="formdiv">
              <div class="row">
                <div class="col-xs-12 col-lg-5 col-md-5 col-sm-5">
                  <img src="" class="img_show img-thumbnail img-responsive hide" />
                </div>
                <div class="col-xs-12 col-md-7 col-lg-7 col-sm-7">
                  <div class="form-group">
                    <label>Change Picture:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="file" name="file_upload" accept="image/*" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Reference No:</label>
                    <input type="text" name="reference" class="form-control referenceT" />
                  </div>
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
          name: "required",
          reference: {
           required:true,
           number:true,
          },
        },
        messages: {
          name: "Enter Category",
          reference: {
           required:"Enter Reference No",
           number:"Enter valid Reference No",
          },
        }
      });
      jQuery(document).on("click",".dev-add",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .user_action").val("add");
        jQuery("#add-edit-modal .modal-title").html("Add New Category");
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-edit",function(e){
        validator.resetForm();
        jQuery(".img_show").removeClass("hide");
        jQuery("#add-edit-modal .modal-title").html("Update Category");
        jQuery("#add-edit-modal .user_action").val("update");
        jQuery("#add-edit-modal .user_id").val(jQuery(this).data("id"));
        jQuery(".img_show").attr("src",$(this).parents("tr").find(".img-thumbnail").attr("src"));
        jQuery("#add-edit-modal .category").val(jQuery(this).parents("tr").find(".cat").text());
        jQuery("#add-edit-modal .referenceT").val(jQuery(this).parents("tr").find(".reference").text());
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this category?",
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
      $(":file").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
      $("#preview").css("display", "none");
      function imageIsLoaded(e) {
        $("#message").css("display", "none");
        $("#preview").css("display", "block");
        $("#previewimg").attr("src", e.target.result);
        $(".img_show").attr("src", e.target.result);
        jQuery(".img_show").removeClass("hide");
      }
    });
  </script>';
require_once('templates/footer.php');?>