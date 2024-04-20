<?php
$active_tab = 'brands';
$prependScript ='<style>
  .img-thumbnail {
    max-height:150px;
    max-width:180px;
  }
</style>';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(isset($_POST['addTestimonial'])) {
  if(isset($_FILES) && !empty($_FILES)) {
    $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/brands/');
    if($ret['status'] && isset($ret['image_name'])) {
      $arr = array();
      $arr['is_show'] = strip_tags(trim($_REQUEST['is_show']));
      $arr['is_top'] = strip_tags(trim($_REQUEST['is_top']));
      $arr['name'] = strip_tags(trim($_REQUEST['name']));
      $arr['image_name'] = $ret['image_name'];
      if($QueryFire->insertData('brands',$arr)) {
        $msg = 'Brand added successfully';
      } else {
        $msg = "Unable to add brand";
      }
    } else {
      $msg = 'Unable to upload file. Please try later.';
    }
  }
}

if(isset($_POST['updateTestimonial'])) {
  $arr = array();
  $arr['is_show'] = strip_tags(trim($_REQUEST['is_show']));
  $arr['is_top'] = strip_tags(trim($_REQUEST['is_top']));
  $arr['name'] = strip_tags(trim($_REQUEST['name']));
  $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/brands/');
  if($ret['status'] && isset($ret['image_name'])) {
    $arr['image_name'] = $ret['image_name'];
    $duplicate = $QueryFire->getAllData('brands',' id ='.$_REQUEST['id']);
    unlinkImage('../images/brands/'.$duplicate[0]['image_name']);
  } else {
    $msg = 'Unable to upload file. Please try later.';
  }
  if($QueryFire->upDateTable("brands",'id ='.$_REQUEST['id'],$arr)) {
    $msg = 'Brand successfully updated.';
  } else {
    $msg = 'Can not update brand.';
  }
}

if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'delete':
        $duplicate = $QueryFire->getAllData('brands',' id ='.$_REQUEST['id']);
        unlinkImage('../images/clients/'.$duplicate[0]['image_name']);
        $QueryFire->deleteDataFromTable("brands",' id='.$_POST['id']);
        $msg = 'Brand deleted successfully.';
        break;
  }
}
$clients = $QueryFire->getAllData('brands',' 1 order by id desc ');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Brands <button class="btn btn-outline-secondary btn-sm float-sm-right" data-toggle="modal" data-target="#myModal">Add New Brand</button></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active"> Brand List</li>
          </ol>
        </div>
      </div>
    </div>
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
                  <th>Sr No.</th>
                  <th>Image</th>
                  <th>Brand</th>
                  <th>Top Brand</th>
                  <th>Showing</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($clients)) { $cnt=1;
                  foreach($clients as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td class="cat">
                      <img src="../images/brands/<?php echo $row['image_name'];?>" class="img-responsive img-thumbnail">
                    </td>
                    <td class="name">
                      <?php echo $row['name'];?>
                    </td>
                    <td>
                      <?php echo $row['is_top']?'Yes':'No';?>
                    </td>
                    <td>
                      <?php echo $row['is_show']?'Yes':'No';?>
                    </td>
                    <input type="hidden" class="yes_no_select" value="<?=$row['is_show']?>" />
                    <input type="hidden" class="is_top" value="<?=$row['is_top']?>" />
                    <td>
                      <button class="btn btn-success btn-xs dev-edit mt-1" data-id="<?php echo $row['id'];?>">Edit</button>
                      <button class="btn btn-danger btn-xs dev-delete mt-1" data-id="<?php echo $row['id'];?>">Delete</button>
                    </td>
                  </tr>
                <?php } } else {
                  echo '<td colspan="5" class="text-center">You have not added any brand</td>';
                } ?>
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
  <!-- Add Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <form id="addForm" method="post" action="" enctype="multipart/form-data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Brand</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" placeholder="Enter brand name">
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="form-group">
                      <label for="is_show">Is Show:</label>
                      <select name="is_show" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="form-group">
                      <label for="is_top">Top Brand:</label>
                      <select name="is_top" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="file_upload">Brand Logo:</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" id="file" name="file_upload" accept="image/*" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div id="clear"></div>
            <div id="preview">
              <span class="pre">IMAGE PREVIEW</span><br>
              <img id="previewimg" src="" style="max-width:200px;height: 100px">      
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="addTestimonial" >Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Edit Modal -->
  <div id="editTestimonial" class="modal fade" role="dialog">
    <form method="post" action="" id="editForm" enctype="multipart/form-data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Brand Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control nameT" name="name" placeholder="Enter brand name">
            </div>
            <div class="form-group" id="formdiv">
              <div class="row">
                <div class="col-xs-12 col-lg-5 col-md-5 col-sm-5">
                  <img src="" class="img_show img-thumbnail img-responsive" />
                </div>
                <div class="col-xs-12 col-md-7 col-lg-7 col-sm-7">
                  <div class="form-group">
                    <label>Change Brand Image:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="file" name="file_upload" accept="image/*" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="name">Is Show:</label>
                      <select name="is_show" class="form-control select_y_s">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="is_top">Top Brand:</label>
                      <select name="is_top" class="form-control is_topT">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                </div>
              </div>
            </div>   
            <input type="hidden" name="id" class="idCls">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="updateTestimonial" >Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php 
$appendScript = '
  <script>
    $(document).ready(function() {
      jQuery("#addForm").validate({
        rules: {
          file_upload: "required",
          name: "required",
        },
        messages: {
          file_upload: "Upload an image ",
          name: "Enter brand name",
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
      jQuery("#editForm").validate({
        rules: {
          name: "required",
        },
        messages: {
          name: "Enter brand name",
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
      $(document).on("click",".dev-edit",function(){
        $(".select_y_s").val($(this).parents("tr").find(".yes_no_select").val());
        $(".is_topT").val($(this).parents("tr").find(".is_top").val());
        $(".nameT").val($(this).parents("tr").find(".name").html().trim());
        $(".img_show").attr("src",$(this).parents("tr").find(".img-thumbnail").attr("src"));
        $(".idCls").val($(this).data("id"));
        $("#editTestimonial").modal("show");
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this Brand?",
                  message: "<span class='."'text-danger'".'>Information will be deleted permanently.</span>",
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
      }
    });
  </script>';
require_once('templates/footer.php');?>