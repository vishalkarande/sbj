<?php
$active_tab = "gallery";
$active_sub_tab = 'photos';
$prependScript ='<style>
  .img-thumbnail {
    max-height:150px;
    max-width:180px;
  }
</style>';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(isset($_POST['addHomeSlider'])) {
  if(isset($_FILES) && !empty($_FILES)) {
    $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/photos/');
    if($ret['status'] && isset($ret['image_name'])) {
      $arr = array();
      //$arr['description'] = "";
      $arr['title'] = strip_tags(trim($_REQUEST['heading']));
      $arr['date'] = strip_tags(trim($_REQUEST['date']));
      $arr['location'] = strip_tags(trim($_REQUEST['location']));
      $arr['image_name'] = $ret['image_name'];
      if($QueryFire->insertData('images',$arr)) {
        $msg = 'Photo added successfully';
      } else {
        $msg = "Unable to add photo";
      }
    } else {
      $msg = 'Unable to upload file. Please try later.';
    }
  }
}

if(isset($_POST['updateHomeSlider'])) {
  $arr = array();
  //$arr['description'] = strip_tags(trim($_REQUEST['description']));
  $arr['title'] = strip_tags(trim($_REQUEST['heading']));
  $arr['date'] = strip_tags(trim($_REQUEST['date']));
  $arr['location'] = strip_tags(trim($_REQUEST['location']));
  $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/photos/');
  if($ret['status'] && isset($ret['image_name'])) {
    $arr['image_name'] = $ret['image_name'];
    $duplicate = $QueryFire->getAllData('images',' id ='.$_REQUEST['id']);
    unlinkImage('../images/photos/'.$duplicate[0]['image_name']);
  } else {
    $msg = 'Unable to upload file. Please try later.';
  }
  if($QueryFire->upDateTable("images",'id ='.$_REQUEST['id'],$arr)) {
    $msg = 'Photo successfully updated.';
  } else {
    $msg = 'Can not update photo.';
  }
}

if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'delete':
        $duplicate = $QueryFire->getAllData('images',' id ='.$_REQUEST['id']);
        unlinkImage('../images/photos/'.$duplicate[0]['image_name']);
        $QueryFire->deleteDataFromTable("images",' id='.$_POST['id']);
        $msg = 'Photo deleted successfully.';
        break;
  }
}
$sliders = $QueryFire->getAllData('images',' 1 order by id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Photos <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#myModal">Add Photo</button></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Photos</li>
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
                  <th>Image</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($sliders)) {
                  foreach($sliders as $row) { ?>
                  <tr>
                    <td class="cat">
                      <img src="../images/photos/<?php echo $row['image_name'];?>" class="img-responsive img-thumbnail">
                    </td>
                    <td class="heading"><?php echo $row['title'];?></td>
                    <td class="location"><?= $row['location']?></td>
                    <td class="date"><?= $row['date']?></td>
                    <td>
                      <button class="btn btn-success btn-xs edit_slider mt-1" data-id="<?php echo $row['id'];?>">Edit</button>
                      <button class="btn btn-danger btn-xs dev-delete mt-1" data-id="<?php echo $row['id'];?>">Delete</button>
                    </td>
                  </tr>
                <?php } } else {
                  echo '<td colspan="6" class="text-center">You have not added any photo</td>';
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
  <div id="myModal" class="modal fade in" role="dialog">
    <form id="addGal" method="post" action="" enctype="multipart/form-data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Photo</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="heading">Title:</label>
              <input type="text" name="heading" class="form-control" />
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                      <label for="location">Location:</label>
                      <input type="text" name="location" class="form-control" />
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                      <label for="date">Date:</label>
                      <input type="date" name="date" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="file_upload">Images:</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" id="file" name="file_upload" accept="image/*" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
            <button type="submit" class="btn btn-primary" name="addHomeSlider" >Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Edit Modal -->
  <div id="editHomeSlider" class="modal fade" role="dialog">
    <form method="post" action="" id="editGalImg" enctype="multipart/form-data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Photo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="heading">Title:</label>
              <input type="text" name="heading" class="form-control headingT" />
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                      <label for="location">Location:</label>
                      <input type="text" name="location" class="form-control locationT" />
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                      <label for="date">Date:</label>
                      <input type="date" name="date" class="form-control dateT" />
                    </div>
                </div>
            </div>
            <div class="form-group" id="formdiv">
              <div class="row">
                <div class="col-xs-12 col-lg-5 col-md-5 col-sm-5">
                  <label>Current Picture</label>
                  <img src="" class="img_show img-thumbnail img-responsive" />
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
                </div>
              </div>
            </div>   
            <input type="hidden" name="id" class="idCls">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="updateHomeSlider" >Update</button>
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
      jQuery("#addGal").validate({
        rules: {
          file_upload: "required",
          heading: "required",
          date: "required",
          location: "required",
        },
        messages: {
          file_upload: "Upload an image ",
          heading: "Enter title",
          date: "Enter date",
          location: "Enter location",
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
      jQuery("#editGalImg").validate({
        rules: {
          heading: "required",
          date: "required",
          location: "required",
        },
        messages: {
          file_upload: "Upload an image ",
          heading: "Enter title",
          date: "Enter date",
          location: "Enter location",
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
      $(document).on("click",".edit_slider",function(){
        $(".img_show").attr("src",$(this).parents("tr").find(".img-thumbnail").attr("src"));
        $(".headingT").val($(this).parents("tr").find(".heading").html().trim());
        $(".locationT").val($(this).parents("tr").find(".location").html().trim());
        $(".dateT").val($(this).parents("tr").find(".date").html().trim());
        $(".idCls").val($(this).data("id"));
        $("#editHomeSlider").modal("show");
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this photo?",
                  message: "<span class='."'text-danger'".'>Photo will be deleted permanently.</span>",
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