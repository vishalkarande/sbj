<?php
$active_tab = 'faqs';
$active_sub_tab = 'faqs';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'delete':
        $QueryFire->deleteDataFromTable("faq",' fid='.$_POST['id']);
        $msg = 'FAQ deleted successfully.';
        break;
  }
}
$data = $QueryFire->getAllData('','','select f.* , fc.name as category from faq as f left join faqs_category as fc on fc.id=f.fc_id');

?>
  <style type="text/css">
    .img-thumbnail {
      max-height: 120px;
      max-width: 200px;
    }
  </style>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FAQs <a class="btn btn-outline-secondary btn-sm float-sm-right" href="add-user-faq">Add FAQ</a></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="#">FAQs</a></li>
            <li class="breadcrumb-item active">FAQs</li>
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
                  <th>Sr No.</th>
                  <th>FAQS Category</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($data)) {
                  $cnt=1;
                  foreach($data as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                     <td><?php echo strip_tags($row['category']);?></td>
                    <td><?php echo strip_tags($row['question']);?></td>
                    <td><?php echo makeShortString(strip_tags(html_entity_decode($row['answer'])),150);?></td>
                    <td>
                      <a class="btn btn-success btn-xs mt-1" href="edit-user-faq?id=<?php echo $row['fid'];?>">Edit</a>
                      <button class="btn btn-danger btn-xs dev-delete mt-1" data-id="<?php echo $row['fid'];?>">Delete</button>
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
<?php 
$appendScript = '
  <script>
    $(document).ready(function() {
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this faq?",
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
    });
  </script>';
require_once('templates/footer.php');?>