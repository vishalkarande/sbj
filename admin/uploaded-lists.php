<?php
$active_tab = 'uploaded lists';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(!empty($_POST['user_action'])) {
  switch($_POST['user_action']) {
    case 'contacted':
        //$QueryFire->deleteDataFromTable("users",' id='.$_POST['id']);
        $QueryFire->upDateTable("uploaded_lists",' id='.$_POST['id'],array('is_deleted'=>1));
        $msg = 'Record marked as contacted.';
        break;
  }
}
$data = $QueryFire->getAllData('uploaded_lists',' 1 order by id desc');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Upload List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Uploaded Lists</li>
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
            <table class="table table-bordered table-striped table-bordered table-hover dt-responsive nowrap">
              <thead>
                <tr>
                  <th>Sr No.</th>
                  <th>Name</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>List</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($data)) {
                  $cnt=1;
                  foreach($data as $row) { ?>
                  <tr>
                    <td><?php echo $cnt++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['mobile_no'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo ucwords($row['status']);?></td>
                    <td><a href="<?php echo base_url.'images/uploaded-lists/'.$row['image_name'];?>" target="_blank"> View List</a></td>
                    <td>
                        <?php if($row['status']=='contacted') { ?>
                            <button class="btn btn-danger btn-xs disabled mt-1" readonly>Contacted?</button>
                        <?php } else { ?>
                            <button class="btn btn-danger btn-xs dev-delete mt-1" data-id="<?php echo $row['id'];?>">Contacted?</button>
                        <?php } ?>
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
      var table = jQuery(".dt-responsive").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
               extend: "copy",
               footer: true,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
            },
            {
               extend: "csv",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
              
            },
            {
               extend: "excel",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
            },
            {
               extend: "pdf",
               footer: false,
               exportOptions: {
                  columns: [0,1,2,3,4]
                }
            }
        ]
      });
      jQuery(document).on("click",".dev-delete",function(e){
          if(jQuery(this).data("id") != "") {
              var id = jQuery(this).data("id");
              bootbox.confirm({
                  message: "<span class='."'text-danger'".'>Are you sure you have contacted with this list owner?</span>",
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
                        jQuery(".active_inactive-form input:nth(1)").val("contacted");
                      jQuery(".active_inactive-form").submit();
                    }
                  }
              });
          }
      });
    });
  </script>';
require_once('templates/footer.php');?>