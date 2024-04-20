<?php
$active_tab = 'faqs';
$active_sub_tab = 'user faqs';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(isset($_POST['submit']) && !empty($_POST['answer'])) {
  $where = 'question ="'.trim(strip_tags($_REQUEST['question'])).'"';
  $data = $QueryFire->getAllData('faq',$where);
  if(!empty($data)) {
    $msg = 'User faq already exist !';
  } else {
    $arr = array();
    $arr['fc_id'] = trim(strip_tags($_REQUEST['fc_id']));
    $arr['question'] = trim(strip_tags($_REQUEST['question']));
    $arr['answer'] = htmlentities(addslashes($_POST['answer']));
    if($QueryFire->insertData('faq',$arr)) {
      $msg = 'FAQ added successfully.';
    } else {
      $msg = 'Unable to add faq.';
    }
  }
}
 $arr = $QueryFire->getAllData('faqs_category','1');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New FAQ</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="user-faqs">FAQs</a></li>
            <li class="breadcrumb-item active">Add New FAQs</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <?php echo !empty($msg)?'<h5 class="text-center text-success mt-3">'.$msg.'</h5>':''?>
          <form role="form" method="post" class="user-form" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                      <label for="fc_id">FAQS Category</label>
                       <select class="form-control fc_idT" name="fc_id" required>
                             <option value=""> --Select category-- </option>
                             <?php if(!empty($arr)) {
                                foreach($arr as $row) {
                                  echo '<option value="'.$row['id'].'" >'.$row['name'].'</option>';
                                }
                                } ?>
                         </select>
                  
                    <label for="question"> Question</label>
                    <textarea name="question" class="form-control" rows="3" placeholder="Enter question"></textarea>
                  </div>
                </div>                
                <div class="col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label for="">Answer</label>
                    <textarea name="answer"  placeholder="Enter answer" rows="6" class="form-control summernote"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php 
$appendScript = '
  <script>
    $(document).ready(function() {
      $(".summernote").summernote({
        height:250,
        fontNames: ["Arial", "Arial Black", "Comic Sans MS", "Courier New","Times New Roman","Century","Verdana","Vrinda","Candara","Tahoma","Georgia","Impact","Helvetica","Neutra Text TF","Lucida Console"],
        fontSizes: ["8","9","10","11","12","14","16","18", "20", "24", "36","60","72"],
        toolbar:[
           ["style", ["bold", "italic", "underline", "clear"]],
           ["font", ["strikethrough","superscript", "subscript"]],
           ["fontsize", ["fontsize"]],
           ["fontname", ["fontname"]],
           ["color", ["color"]],
           ["para", ["ul", "ol", "paragraph"]],
           ["height", ["height"]],
           ["table", ["table"]],
           ["insert", ["link", "picture", "hr","video"]],
           ["view", ["fullscreen", "codeview"]],
           ["help", ["help"]],
        ],
      });
      $(".user-form").validate({
        rules: {
          question: {
            required: true,
          },
          answer: {
            required: true,
          },
        },
        messages: {
          question: {
            required: "Enter question",
          },
          answer: {
            required: "Enter answer",
          },
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
    });
  </script>';
require_once('templates/footer.php');?>
