<?php
$active_tab = "products";
$active_sub_tab = 'reviews';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'approve':
        $QueryFire->upDateTable("product_reviews",' id='.$_POST['id'],array('is_approved'=>1));
          $msg = 'Review is approved successfully.';
        break;
    case 'delete':
        $QueryFire->deleteDataFromTable("product_reviews",' id='.$_POST['id']);
        $msg = 'Review deleted successfully.';
        break;
  }
}
$data = $QueryFire->getAllData('','','SELECT p.name as product, r.*,u.name as user FROM product_reviews as r LEFT JOIN products as p ON p.id=r.product_id LEFT JOIN users as u ON u.id=r.user_id ORDER BY r.id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Reviews</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="products">Products</a></li>
            <li class="breadcrumb-item active">Reviews</li>
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
            <table class="data-table table table-bordered table-striped table-bordered table-hover dt-responsive nowrap">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Product</th>
                  <th>User</th>
                  <th>Ratings</th>
                  <th>Heading</th>
                  <th>Review</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($data)) { $cnt=1;
                  foreach($data as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td><?php echo $row['product'];?></td>
                    <td><?php echo $row['user'];?></td>
                    <td><?php echo $row['star'];?></td>
                    <td><?php echo $row['heading'];?></td>
                    <td><?php echo $row['review'];?></td>
                    <td>
                      <?php if($row['is_approved']){?>
                        <button class="btn btn-success disabled btn-xs mt-1">Approved</button>
                      <?php } else { ?>
                        <button class="btn btn-success btn-xs mt-1 dev-approve" data-id="<?php echo $row['id'];?>">Approve?</button>
                      <?php } ?>
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
<?php 
$appendScript = '
  <script>
    $(document).ready(function() {
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to delete this review?",
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
      jQuery(document).on("click",".dev-approve",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  title: "Are you sure you want to approve this review?",
                  message: "<span class='."'text-danger'".'>Review will be shown on product page.</span>",
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
                        jQuery(".active_inactive-form input:nth(1)").val("approve");
                      jQuery(".active_inactive-form").submit();
                    }
                  }
              });
          }
      });
    });
  </script>';
require_once('templates/footer.php');?>