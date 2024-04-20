<?php
$active_tab = 'products';
$active_sub_tab = 'products';
$prependScript='
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
';
require_once('templates/header.php');
require_once('templates/sidebar.php');
if(isset($_POST['submit'])) {
  $where = ' name ="'.trim(strip_tags($_REQUEST['name'])).'" and item_code="'.trim(strip_tags($_REQUEST['item_code'])).'"';
  $data = $QueryFire->getAllData('products',$where);
  $slug = to_prety_url($_REQUEST['name']);
  if(!empty($data) && $data[0]['item_code'] != $_REQUEST['item_code']) {
    $slug = $slug.'-'.$_REQUEST['item_code'];
    $data = array();
  }
  if(empty($data)) {
    if(isset($_FILES) && !empty($_FILES['file_upload']['tmp_name'])) {
      $ret = $QueryFire->fileUpload($_FILES['file_upload'],'../images/products/');
      if($ret['status'] && isset($ret['image_name'])) {
        $arr = array();
        $arr['slug'] = $slug;
        $arr['name'] = trim(strip_tags($_REQUEST['name']));
        $arr['trendings'] = trim(strip_tags($_REQUEST['trendings']));
        //$arr['price'] = trim(strip_tags($_REQUEST['price']));
        //$arr['qty'] = trim(strip_tags($_REQUEST['qty']));
        $arr['meta_title'] = trim(strip_tags($_REQUEST['meta_title']));
        $arr['meta_description'] = trim(strip_tags($_REQUEST['meta_description']));
        //$arr['param_value'] = trim(strip_tags($_REQUEST['param_value']));
        //$arr['param_value_id'] = implode(',',$_REQUEST['param_value_id']);
        //$arr['discount'] = trim(strip_tags($_REQUEST['discount']));
        $arr['cat_id'] = trim(strip_tags($_REQUEST['cat_id']));
        $arr['is_show'] = trim(strip_tags($_REQUEST['is_show']));
        $arr['item_code'] = trim(strip_tags($_REQUEST['item_code']));
        $arr['brand_id'] = trim(strip_tags($_REQUEST['brand_id']));
        $arr['is_mm_special'] = trim(strip_tags($_REQUEST['is_mm_special']));
        $_REQUEST['sub_category'] = trim(strip_tags($_REQUEST['sub_category']));
        if(!empty($_REQUEST['sub_category'])) {
          $arr['cat_id'] = $_REQUEST['sub_category'];
        }
        $arr['image_name'] = $ret['image_name'];
        $arr['details'] = htmlentities(addslashes($_POST['details']));
        if($QueryFire->insertData('products',$arr)) {
          //get last id
          $last_id = $QueryFire->getLastInsertId();
          $inventory = array();
          $inventory['product_id'] = $last_id;
          foreach($_REQUEST['param_value'] as $key=>$value) {
            if(!empty($_POST['param_value'][$key]) && !empty($_POST['qty'][$key]) && !empty($_POST['price'][$key]) && !empty($_POST['rate'][$key]) && !empty($_POST['param_value_id'][$key])) {
                $inventory['param_value'] = $_POST['param_value'][$key];
                $inventory['purchase_qty'] = $inventory['qty'] = $_POST['qty'][$key];
                $inventory['price'] = $_POST['price'][$key];
                $inventory['purchase_rate'] = $_POST['rate'][$key];
                $inventory['param_value_id'] = $_POST['param_value_id'][$key];
                $inventory['discount'] = $_POST['discount'][$key];
                $QueryFire->insertData('inventry',$inventory);
    		    $QueryFire->insertData('inventry_log',$inventory);
            }
          }
          //now insert images into db
          if(isset($_FILES) && !empty($_FILES['images']['tmp_name'][0])) {
            $ret1 = $QueryFire->multipleFileUpload($_FILES['images'],'../images/products/');
            if($ret1['status'] && isset($ret1['image_name'][0])) {
              foreach($ret1['image_name'] as $img) {
                $QueryFire->insertData('products_has_images',array('image_name'=>$img,'product_id'=>$last_id));
              }
            }
          }
          $msg = 'Product added successfully.';
        } else {
          $msg = 'Unable to add product.';
        }
      } else {
        $msg = "Unable to upload product image";
      }
    }
  } else {
      $msg = 'Product already exists.';
  }
}
$categories = $QueryFire->getAllData('categories',' is_show=1 and level=1 and is_deleted=0 order by name');
$brands = $QueryFire->getAllData('brands',' is_show=1 order by name');
$params = $QueryFire->getAllData('product_has_params','is_deleted=0 order by name');
?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="products">Product Management</a></li>
            <li class="breadcrumb-item active">Add Product</li>
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
                    <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
                  </div>
                </div>
                <div class="col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                    <label for="trendings">Show on Home</label>
                    <select class="form-control" name="trendings">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                    <label for="is_mm_special">MM Special</label>
                    <select class="form-control" name="is_mm_special">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="brand_id"> Brand</label>
                    <select class="form-control" name="brand_id">
                      <option value=""> -- Select brand -- </option>
                      <?php if(!empty($brands)) {
                        foreach($brands as $brand) {
                          echo '<option value="'.$brand['id'].'">'.$brand['name'].'</option>';
                        }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-5 col-md-5 col-xs-12">
                  <div class="form-group">
                    <label for="cat_id"> Category</label>
                    <select class="form-control category" name="cat_id">
                      <option value=""> -- Select Category -- </option>
                      <?php if(!empty($categories)) {
                        foreach($categories as $cat) {
                          echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                        }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-5 col-md-5 col-xs-12 sub_category hide">
                  <div class="form-group">
                    <label for="sub_category">Sub Category</label>
                    <select name="sub_category" class="form-control ">
                      <option value=""> -- Select Sub Category -- </option>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-xs-12">
                          <div class="form-group">
                            <label for="param_id"> Parameter</label>
                            <select class="form-control param" name="param_id[]">
                              <option value=""> Select Parameter</option>
                              <?php if(!empty($params)) {
                                foreach($params as $param) {
                                  echo '<option value="'.$param['id'].'">'.$param['name'].'</option>';
                                }
                              } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-12">
                          <div class="form-group">
                            <label for="param_id"> Select Parameter Unit</label>
                            <select class="form-control select2bs4 param_value_id" data-placeholder="Select Parameter Unit" style="width: 100%;" name="param_value_id[]">
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-12">
                          <div class="form-group">
                            <label for="param_value"> Parameter Value</label>
                            <input type="text" name="param_value[]" placeholder="Enter param value" class="form-control">
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="text" name="qty[]" class="form-control" placeholder="Enter Product Quantity">
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="price">Sales Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                              </div>
                              <input type="text" name="price[]" class="form-control" placeholder="Enter sales price">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="price"> Purchase Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                              </div>
                              <input type="text" name="rate[]" class="form-control" placeholder="Enter purchas price">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="discount"> Discount</label>
                            <div class="input-group">
                              <input type="text" name="discount[]" class="form-control" placeholder="Enter Discount" value="0">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-percent"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label>&nbsp;</label><br>
                            <button class="btn btn-default btn-add-row" type="button"> Add More</button>
                          </div>
                        </div>
                    </div>
                    <div class="row copyMe hide">
                        <div class="col-sm-3 col-md-3 col-xs-12">
                          <div class="form-group">
                            <label for="param_id"> Parameter</label>
                            <select class="form-control param" required name="param_id[]">
                              <option value=""> Select Parameter</option>
                              <?php if(!empty($params)) {
                                foreach($params as $param) {
                                  echo '<option value="'.$param['id'].'">'.$param['name'].'</option>';
                                }
                              } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-12">
                          <div class="form-group">
                            <label for="param_id"> Select Parameter Unit</label>
                            <select class="form-control param_value_id" data-placeholder="Select Parameter Unit" style="width: 100%;" name="param_value_id[]">
                                <option value="">Select Parameter Unit</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-12">
                          <div class="form-group">
                            <label for="param_value"> Parameter Value</label>
                            <input type="text" required name="param_value[]" placeholder="Enter param value" class="form-control">
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="text" required name="qty[]" class="form-control" placeholder="Enter Product Quantity">
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="price">Sales Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                              </div>
                              <input type="text" required name="price[]" class="form-control" placeholder="Enter sales price">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="price"> Purchase Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                              </div>
                              <input type="text" required name="rate[]" class="form-control" placeholder="Enter purchas price">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label for="discount"> Discount</label>
                            <div class="input-group">
                              <input type="text" name="discount[]" class="form-control" placeholder="Enter Discount" value="0">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-percent"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-xs-6">
                          <div class="form-group">
                            <label>&nbsp;</label><br>
                            <button class="btn btn-default btn-add-row" type="button"> Add More</button>
                            <button class="btn btn-default btn-remove-row" type="button"> Remove</button>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                    <label for="is_show">Is Show</label>
                    <select class="form-control" name="is_show">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                    <label for="item_code">Item Code</label>
                    <input type="text" class="form-control" name="item_code" placeholder="Enter item code" />
                  </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label for="name">SEO - Meta Title</label>
                    <input class="form-control" name="meta_title" placeholder="Enter Meta Title" >
                  </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                  <label for="name">SEO - Meta Description</label>
                  <input class="form-control" name="meta_description" placeholder="Enter Meta Description" >
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="file_upload">Featured Image</label>
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
                    <textarea name="details"  placeholder="Enter Product Description" rows="6" class="form-control summernote"></textarea>
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
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".select2bs4").select2({
        theme: "bootstrap4"
      });
      $(".select2bs4").val(null).trigger("change");
      $(document).on("change",".param",function(){
        var This = $(this);
        $(this).closest(".row").find(".param_value_id").empty();
        $.ajax({
          url:"query",
          method:"post",
          data:{action:"getparamvalues",id:$(this).val()},
          success:function(response){
            response = $.parseJSON(response);
            response = $.makeArray( response );
            if(response !="") {
              $(This).closest(".row").find(".param_value_id").select2({
                theme: "bootstrap4",
                placeholder: "Select Parameter Unit",
                data: response
              });
              $(This).closest(".row").find(".param_value_id").val(null).trigger("change");
            }
          }
        });
      });
      $(".category").on("change",function(){
        $.ajax({
          url:"query",
          method:"post",
          data:{action:"getsubcat",id:$(this).val()},
          success:function(response){
            if(response !="") {
              $(".sub_category").removeClass("hide");
              $(".sub_category select").html(response);
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
           ["view", ["fullscreen", "codeview"]],
           ["help", ["help"]],
        ],
      });
      $(".user-form").validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          "qty[]": {
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
          "param_id[]": {
            required: true,
          },
          "param_value_id[]": {
            required: true,
          },
          sub_category: {
            required: true,
          },
          item_code: {
            required: true,
          },
          weight: {
            required: true,
            min: 5,
            number:true
          },
          "price[]": {
            required: true,
            min: 1,
            number:true
          },
          "rate[]": {
            required: true,
            min: 1,
            number:true
          },
          file_upload: {
            required: true
          }
        },
        messages: {
          name: {
            required: "Enter product name",
            minlength: "Enter product name more than 3 characters",
          },
          "qty[]": {
            required: "Enter product quantity",
            min: "Enter valid product quantity",
            number:"Enter valid product quantity"
          },
          "param_id[]": {
            required: "Select Parameter",
          },
          "param_value_id[]": {
            required: "Select Parameter Value",
          },
          cat_id: {
            required: "Select Category",
          },
          brand_id: {
            required: "Select brand",
          },
          sub_category: {
            required: "Select Sub Category",
          },
          item_code: {
            required: "Enter Item Code",
          },
          "price[]": {
            required: "Enter sales price",
            min: "Enter valid sales price",
            number:"Enter valid sales price"
          },
          "rate[]": {
            required: "Enter purchase price",
            min: "Enter valid purchase price",
            number:"Enter valid purchase price"
          },
          file_upload: {
            required: "Upload product image"
          }
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
      $(document).on("click",".btn-add-row",function(event){
          var cloned = $(".copyMe").clone();
          $(".copyMe").after(cloned).removeClass("copyMe hide");
      });
      $(document).on("click",".btn-remove-row",function(event){
          $(this).closest(".row").html("").hide();
      });
        if($(".note-editable").html() == "<p><br></p>") {
        	$(".note-editable").html($(".note-editable").html().replace("<p><br></p>",""));
        }
    });
  </script>';
require_once('templates/footer.php');?>