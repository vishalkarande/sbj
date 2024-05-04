<?php
$active_tab = 'products';
$active_sub_tab = 'products';
$prependScript='
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(isset($_POST['act']))
{
  if($_POST['act']=='remove') {
    if($QueryFire->deleteDataFromTable('products_has_images','image_name="'.$_POST['image_name'].'"'))
    {
      unlinkImage('../images/products/'.$_POST['image_name']);
      $msg = "Image deleted";
    }
    else
      $msg = 'Sorry! unable to delete image';
  }
}
if(isset($_POST['submit'])) {
  $where = ' (name ="'.trim(strip_tags($_REQUEST['name'])).'" OR  item_code="'.trim(strip_tags($_REQUEST['item_code'])).'") and id !='.$_REQUEST['product_id'];
  $data = $QueryFire->getAllData('products',$where);
  $slug = to_prety_url($_REQUEST['name']);
  if(!empty($data) && $data[0]['item_code'] != strip_tags($_REQUEST['item_code']) ) {
    $slug = $slug.'-'.strip_tags($_REQUEST['item_code']);
    $data = array();
  }
  if(empty($data)) {
    $arr = array();
    $arr['slug'] = $slug;
    $arr['name'] = trim(strip_tags($_REQUEST['name']));
    $arr['meta_title'] = trim(strip_tags($_REQUEST['meta_title']));
    $arr['meta_description'] = trim(strip_tags($_REQUEST['meta_description']));
    $arr['is_show'] = trim(strip_tags($_REQUEST['is_show']));
    $arr['item_code'] = trim(strip_tags($_REQUEST['item_code']));
    $arr['details'] = htmlentities(addslashes($_POST['details']));
    if(isset($_FILES) && !empty($_FILES['file_upload']['tmp_name'])) {
      $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/products/');
      if($ret['status'] && isset($ret['image_name'])) {
        $arr['image_name'] = $ret['image_name'];
        $data = $QueryFire->getAllData('products','id ='.$_REQUEST['product_id']);
        unlinkImage('../images/products/'.$data[0]['image_name']);
        unset($data);
      } else {
        $msg = "Unable to upload product image";
      }
    }
    if(!isset($msg)) {
        if($QueryFire->upDateTable('products',' id='.$_REQUEST['product_id'],$arr)) {
          if(isset($_FILES) && !empty($_FILES['images']['tmp_name'][0])) {
            $ret1 = $QueryFire->multipleFileUpload($_FILES['images'],'../images/products/');
            if($ret1['status'] && isset($ret1['image_name'][0])) {
              foreach($ret1['image_name'] as $img) {
                $QueryFire->insertData('products_has_images',array('image_name'=>$img,'product_id'=>$_REQUEST['product_id']));
              }
            }
          }
          $msg = 'Product updated successfully.';
        } else {
          $msg = 'Unable to update product.';
        }
    }
  } else {
      $msg = "Product already exists.";
  }
}
$categories = $QueryFire->getAllData('categories',' is_show=1 and is_deleted=0 order by name');
$sub = $QueryFire->getAllData('categories',' is_show=1 and level=2 and is_deleted=0 order by name');
$images = $QueryFire->getAllData('products_has_images',' product_id='.$_REQUEST['product_id']);
$params = $QueryFire->getAllData('product_has_params','is_deleted=0 order by name');
$product = $QueryFire->getAllData('products','id='.$_REQUEST['product_id'])[0];
$categories = array_values(array_filter($categories,function($a) {return $a['level']==1;}));
unset($product_cat);
// $param_values = $QueryFire->getAllData('product_params_values',' id in('.$product['param_value_id'].')');
$brands = $QueryFire->getAllData('brands',' is_show=1 order by name');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="products">Product Management</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
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
                <div class="col-sm-5 col-md-5 col-xs-12">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?= $product['name']?>" class="form-control" placeholder="Enter Product Name">
                  </div>
                </div>
               
                
               
               
                
                <div class="col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                    <label for="is_show">Is Show</label>
                    <select class="form-control" name="is_show">
                      <option value="1" <?= $product['is_show']==1?'selected':''?>>Yes</option>
                      <option value="0" <?= $product['is_show']==0?'selected':''?>>No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                    <label for="item_code">Item Code</label>
                    <input type="text" class="form-control" name="item_code" value="<?= $product['item_code']?>" placeholder="Enter item code" />
                  </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label for="name">SEO - Meta Title</label>
                    <input class="form-control" value="<?= $product['meta_title']?>" name="meta_title" placeholder="Enter Meta Title" >
                  </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                  <label for="name">SEO - Meta Description</label>
                  <input class="form-control" name="meta_description"  value="<?= $product['meta_description']?>" placeholder="Enter Meta Description" >
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="file_upload">Change Featured Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file_upload" accept="image/*" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="images">Product Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/*" name="images[]" class="custom-file-input" multiple id="exampleInputFile1">
                        <label class="custom-file-label" for="exampleInputFile1">Choose files</label>
                      </div>
                    </div>
                    <small class="text-danger">You can upload multiple Images by pressing 'CTRL' button & selecting the desired images</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="details"  placeholder="Enter Product Description" rows="6" class="form-control summernote"><?= html_entity_decode($product['details'])?></textarea>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12">
                  <?php  if(!empty($images)){?>
                  <label>Product Images:</label><br>
                  <div class="row">
                    <?php
                    foreach($images as $img){?>
                      <div class="col-md-2 col-xs-3">
                        <img src="../images/products/<?= $img['image_name']?>" class="img-responsive img-thumbnail" style="margin-bottom: 10px;">
                        <button class="btn btn-danger btn-xs  remove" type="button" data-id="<?= $img['image_name']?>">Delete </button>
                      </div>
                    <?php } ?>
                  </div>
                  <br>
                  <?php } ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Change/Remove Image Modal -->
  <div id="editHomeSlider" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title m_name">Delete Product Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this image?</p>
      <form method="post" action="" class="imgs" enctype="multipart/form-data">
        <input type="hidden" name="image_name" class="img_nm">
        <input type="hidden" name="act" class="act">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="updateHomeSlider" >Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php 
$appendScript = '
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".remove").on("click",function(){
        $(".img_nm").val($(this).data("id"));
        $(".act").val("remove");
        $("#editHomeSlider").modal("show");
      });
      var sub_category="";
      $(".category").on("change",function(){
        $.ajax({
          url:"query",
          method:"post",
          data:{action:"getsubcat",id:$(this).val()},
          success:function(response){
            if(response !="") {
              $(".sub_category").removeClass("hide");
              $(".sub_category select").html(response);
              if(sub_category!="") {
                $(".sub_category select").val().trigger("change");
                sub_category="";
              }
            } else {
              $(".sub_category").addClass("hide");
            }
          }
        });
      });
      $(".summernote").summernote({
        height: 250,
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
           ["view", ["fullscreen"]],
           ["help", ["help"]],
        ],
      });
      $(".user-form").validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          qty: {
            required: true,
            min: 1,
            number:true
          },
          cat_id: {
            required: true,
          },
          brand_id: {
            required: true,
          },
          param_id: {
            required: true,
          },
          param_value_id: {
            required: true,
          },
          sub_category: {
            required: true,
          },
          item_code: {
            required: true,
          },
          price: {
            required: true,
            min: 1,
            number:true
          },
        },
        messages: {
          name: {
            required: "Enter product name",
            minlength: "Enter product name more than 3 characters",
          },
          qty: {
            required: "Enter product quantity",
            min: "Enter valid product quantity",
            number:"Enter valid product quantity"
          },
          param_id: {
            required: "Select Parameter",
          },
          param_value_id: {
            required: "Select Parameter Value",
          },
          brand_id: {
            required: "Select brand",
          },
          cat_id: {
            required: "Select Category",
          },
          sub_category: {
            required: "Select Sub Category",
          },
          item_code: {
            required: "Enter Item Code",
          },
          price: {
            required: "Enter product price",
            min: "Enter valid product price",
            number:"Enter valid product price"
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