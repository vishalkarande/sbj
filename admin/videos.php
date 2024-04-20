<?php
$active_tab = "gallery";
$active_sub_tab = 'videos';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'add':
        $data = $QueryFire->getAllData('videos',' youtube_id="'.trim(strip_tags($_POST['youtube_id'])).'"');
        if(empty($data)) {
          $QueryFire->insertData("videos",array('youtube_id'=>$_POST['youtube_id'],'title'=>trim(strip_tags($_POST['title']))));
          $msg = 'Video added successfully.';
        } else {
          $msg = 'Video already exists.';
        }
        unset($data);
        break;
    case 'update':
        $data = $QueryFire->getAllData('videos',' youtube_id="'.trim(strip_tags($_POST['youtube_id'])).'" and id !='.$_POST['id']);
        if(empty($data)) {
          $QueryFire->upDateTable("videos",' id='.$_POST['id'],array('youtube_id'=>$_POST['youtube_id'],'title'=>trim(strip_tags($_POST['title']))));
          $msg = 'Video updated successfully.';
        } else {
          $msg = 'Video already exists.';
        }
        unset($data);
        break;
    case 'delete':
        $QueryFire->deleteDataFromTable("videos",' id='.$_POST['id']);
        $msg = 'Video deleted successfully.';
        break;
  }
}

$data = $QueryFire->getAllData('videos',' 1 order by id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Videos <button class="btn btn-primary float-right dev-add">Add New Video</button></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Gallery</a></li>
            <li class="breadcrumb-item active">Videos</li>
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
                  <th>Video</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($data)) { $cnt=1;
                  foreach($data as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td><a target="_blank" href="https://www.youtube.com/watch?v=<?= $row['youtube_id']?>"><img src="https://img.youtube.com/vi/<?= $row['youtube_id']?>/mqdefault.jpg" class="thum_nail" width="120px" height="80px" data-id="<?= $row['youtube_id']?>" /></a></td>
                    <td class="title"><?php echo $row['title'];?></td>
                    <input type="hidden" class="cat_id" value="<?= $row['youtube_id']?>" />
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
              <label for="name">Youtube Video ID:</label>
              <input type="text" name="youtube_id" class="form-control category_id" placeholder="E.g watch?v=AwvEY2rUXf0 enter only AwvEY2rUXf0" />
            </div>
            <div class="form-group">
              <label for="name">Title:</label>
              <input class="form-control category" name="title" required placeholder="Enter Title" type="text">
            </div>
            <input type="hidden" name="user_action" class="user_action">
            <input type="hidden" name="id" class="user_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="add" >Save</button>
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
          title: "required",
          youtube_id: "required",
        },
        messages: {
          title: "Enter title",
          youtube_id: "Enter youtube video id",
        }
      });
      jQuery(document).on("click",".dev-add",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .user_action").val("add");
        jQuery("#add-edit-modal .modal-title").html("Add New Video");
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-edit",function(e){
        validator.resetForm();
        jQuery("#add-edit-modal .modal-title").html("Update Video Details");
        jQuery("#add-edit-modal .user_action").val("update");
        jQuery("#add-edit-modal .user_id").val(jQuery(this).data("id"));
        jQuery("#add-edit-modal .category").val(jQuery(this).parents("tr").find(".title").text());
        jQuery("#add-edit-modal .category_id").val(jQuery(this).parents("tr").find(".cat_id").val());
        jQuery("#add-edit-modal").modal("show");
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  message: "<span class='."'text-danger'".'>Are you sure you want to delete this video?</span>",
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