<?php
set_time_limit(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('constant.php');
$connection = new mysqli(dbserver,dbuser, dbpass,dbname);
if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}
class QueryFire {
	public function getAllData($table_name,$where,$cust=null) {	
		if($cust!=null)
			$sql= $cust;
		else	
			$sql = "SELECT * FROM ".$table_name." WHERE ".$where;
		//echo $sql;
		$p = mysqli_query($GLOBALS['connection'],$sql);
		while($data = mysqli_fetch_array($p,MYSQLI_ASSOC)){
			$q[] = $data;
		}
		if(!empty($q))
			return $q;
		else
			return array();
	}

	//this is for uploding files
	function fileUpload($data,$path='../assets/images/',$cstm=false,$ff=0) {
		//check path exists or not
		if(!is_dir($path))
		{
			mkdir($path);
		}
		$ret = false;
		$arr = array();
		//set actual path for image
		$target_dir = '';
		$image_type = strtolower(pathinfo($data['name'],PATHINFO_EXTENSION));
		$image_name = rand(99,10).date('Ymdhis').'.'.$image_type;
		if($image_type =='jpg'|| $image_type =='jpeg' || $image_type =='png' || $image_type =='gif' || $image_type =='bmp')
		  $ret =true;

		if($cstm)
			if(in_array($image_type, $ff))
				$ret = true;
		/*if($data['size']> 2000000)
		  $ret = false;*/
		if($ret)
		  if(move_uploaded_file($data['tmp_name'],$path.$image_name))
		  {
		    $arr['image_name'] = $image_name;
		    $success = " New record added successfully.";
		  }
		  else
		    $success = "Can not upload file.";
		else
		  $success = "Unable to add record.";
		$arr['status'] = $ret;
		$arr['message'] = $success;
		return $arr;
	}

	function multipleFileUpload($data,$path='../assets/images/') {
		if(!is_dir($path))
		{
			mkdir($path);
		}
		$ret = false;
		$arr = array();
		//set actual path for image
		$target_dir = '';
		for($i=0;$i<count($data['name']);$i++)
		{
			$image_type = strtolower(pathinfo($data['name'][$i],PATHINFO_EXTENSION));
			$image_name = rand(99,10).date('Ymdhis').'.'.$image_type;
			if($image_type =='jpg'|| $image_type =='jpeg' || $image_type =='png' || $image_type =='gif' || $image_type =='bmp')
			  $ret =true;
			/*if($data['size']> 2000000)
			  $ret = false;*/
			  if(!file_exists($path))
			  	mkdir($path);
			if($ret)
			  if(move_uploaded_file($data['tmp_name'][$i],$path.$image_name))
			  {
			    $arr['image_name'][$i] = $image_name;
			    $success = " New record added successfully.";
			   /* if($BaseClassObject->insertData('galleries',$data,$fields))
			      $success = " New record added successfully.";
			    else
			      $success = " System error while adding record.";*/
			  }
			  else
			    $success[$i] = "Can not upload file.";
			else
			  $success[$i] = "Unable to add record.";
		}
		$arr['status'] = $ret;
		$arr['message'] = $success;
		return $arr;
	}

	public function insertData($table_name,$data) {
		//using InserArray function
		/*$da = $this->insertArray($data);
		$sql = 'INSERT INTO '.$table_name.'('.$da['fields'].') VALUES ('.$da['values'].')';*/
		$da = $this->changeArrayToString($data);
		$sql = 'INSERT INTO '.$table_name.'('.implode(",",array_keys($data)).') VALUES ('.$da.')';
		return mysqli_query($GLOBALS['connection'],$sql);
	}

	public function upDateTable($table_name,$where,$data) {
		$da = $this->changeArrayToKeyValue($data);
		$sql = 'UPDATE '.$table_name.' SET '.$da.' WHERE '.$where;
		return mysqli_query($GLOBALS['connection'],$sql);
	}

	function updateTableAsIt($sql) {
		return mysqli_query($GLOBALS['connection'],$sql);
	}

	public function deleteDataFromTable($table_name,$where) {
		$sql = 'DELETE FROM '.$table_name.' WHERE '.$where;
		return mysqli_query($GLOBALS['connection'],$sql);
	}

	function changeArrayToKeyValue($data) {
		$str ='';
		foreach($data as $key=>$value)
		{
			if(empty($str))
				$str = $key.' ="'.strip_tags(trim($value)).'"';
			else
				$str .= ' ,'.$key.' ="'.strip_tags(trim($value)).'"';
		}
		return $str;
	}

	function getLastInsertId() {
		return mysqli_insert_id($GLOBALS['connection']);
	}

	//this is unused now but can be used when need to make string from array
	function changeArrayToString($data) {
		$str = '';
		foreach($data as $value)
		{
			if(empty($str))
				$str = '"'.strip_tags(trim($value)).'"';
			else
				$str .=' ,"'.strip_tags(trim($value)).'"';
		}
		return $str;
	}

	//makes cols n different just like list ** not using implode function as implode do not give prover result 
	function insertArray($data) {
		$ar  = array();
		$str = '';
		$str1 = '';
		foreach($data as $key=>$value)
		{
			if(empty($str))
			{
				$str1 = $key;
				$str = '"'.strip_tags(trim($value)).'"';
			}
			else
			{
				$str1 = ','.$key;
				$str .=' ,"'.strip_tags(trim($value)).'"';
			}
		}
		$ar['fields'] = $str1;
		$ar['values'] = $str;
		return $ar;
	}

	function getAllCount($tablename) {
		$sql = 'SELECT * FROM '.$tablename;
		return mysqli_num_rows(mysqli_query($GLOBALS['connection'],$sql));
	}

	function tableFields($sql) {
		return mysqli_query($GLOBALS['connection'],$sql);
		//return mysqli_num_fields(mysqli_query($GLOBALS['connection'],$sql));
	}
	
	function sensSMS($numbers,$message) {
	    $apiKey = urlencode('hrWj4EnJO7g-dRvdQSdhRP4UP8Je9hSUzCUh1vK1ad');
    	$sender = urlencode('MMMART');
    	$message = rawurlencode($message);
    	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    	$ch = curl_init('https://api.textlocal.in/send/');
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response = curl_exec($ch);
    	curl_close($ch);
    	return $response;
	}
}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//from here custom functions starts
function pr(&$data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function sendEmail($data) {
	$headers = "From:" . $data['from'];
	return mail($data['to'],$data['subject'],$data['message'],$headers);
}

//generating random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//major function to get different size images using following function(Nilesh Lathe)
function makeThumbnails($updir, $img, $imgName,$thumbnail_width,$thumbnail_height) {
	//check path exists or not
	if(!is_dir($updir))
	{
		mkdir($updir);
	}
    $arr_image_details = getimagesize($img); // pass id to thumb name
    $original_width = $arr_image_details[0];
    $original_height = $arr_image_details[1];
    if($original_width > $original_height)
    {
      $new_width = $thumbnail_width;
      $new_height = intval($original_height * $new_width / $original_width);
    }
    else
    {
      $new_height = $thumbnail_height;
      $new_width = intval($original_width * $new_height / $original_height);
    }
    $dest_x = intval(($thumbnail_width - $new_width) / 2);
    $dest_y = intval(($thumbnail_height - $new_height) / 2);
    if($arr_image_details[2] == IMAGETYPE_GIF)
    {
        $imgt = "ImageGIF";
        $imgcreatefrom = "ImageCreateFromGIF";
    }
    if($arr_image_details[2] == IMAGETYPE_JPEG)
    {
      $imgt = "ImageJPEG";
      $imgcreatefrom = "ImageCreateFromJPEG";
    }
    if($arr_image_details[2] == IMAGETYPE_PNG)
    {
      $imgt = "ImagePNG";
      $imgcreatefrom = "ImageCreateFromPNG";
    }
    if($imgt)
    {
      $old_image = $imgcreatefrom($img);
      $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
      //$black = imagecolorallocate($new_image, 0, 0, 0);
      //imagecolortransparent($new_image, $black);
      $image = imagecreatetruecolor(100, 100);

      // Transparent Background
      imagealphablending($new_image, false);
      $transparency = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
      imagefill($new_image, 0, 0, $transparency);
      imagesavealpha($new_image, true);

      // Drawing over
      $black = imagecolorallocate($new_image, 0, 0, 0);
      imagefilledrectangle($new_image, 25, 25, 75, 75, $black);

      imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
      $imgt($new_image, $updir.$imgName);
      imagedestroy($old_image);
    }
}

function makeShortString($string, $length=15, $dots = "...") {
    return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}

function to_prety_url($str) {
	if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
		$str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
	$str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
	$str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
	$str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
	$str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
	$str = strtolower( trim($str, '-') );
	return $str;
}

function validateyoutubelink($id) {
	$valid = file_get_contents('https://img.youtube.com/vi/'.$id.'/mqdefault.jpg');
	if(!empty($valid)) {
		return 1;
	}
	return 0;
}

//unlkinking/deleting images
function unlinkImage($file) {
	if(file_exists($file))
		return unlink($file);
	else
		return true;
}

$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
//creat quey object
$QueryFire = new QueryFire();
if(isset($_REQUEST)&& !empty($_REQUEST['action'])) {
	switch ($_REQUEST['action']) {
		case 'delete-product':
			$where = 'id ='.$_REQUEST['id'];
			$QueryFire->upDateTable("products",$where,array('is_deleted'=>1));
			echo "success";
			break;
		case 'getsubcat':
			$res = '';
			$categories = $QueryFire->getAllData('categories',' is_deleted=0 and is_show=1 and level=2 and parent_id ='.$_REQUEST['id']);
			if(!empty($categories)) {
				$res = '<option value=""> -- Select Sub Category -- </option>';
				foreach($categories as $cat) {
					$res.='<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
				}
			}
			echo $res;
			break;
		case 'get-products':
		    session_start();
		    $subquery = '';
		    $where = 'p.is_deleted=0';
		    if(!empty($_POST['filters']['keyword'])) {
		        $where.=' and p.name like"%'.$_POST['filters']['keyword'].'%"';
		    }
		    if(!empty($_POST['filters']['discount'])) {
		        $where.=' and p.discount>='.$_POST['filters']['discount'];
		    }
		    //brand specific
		    if(!empty($_POST['filters']['brand'])) {
		        $where.=' and p.brand_id='.$_POST['filters']['brand'];
		    }
		    //mm special
		    if(!empty($_POST['filters']['mmspecial'])) {
		        $where.=' and p.is_mm_special=1';
		    }
		    
		    if(!empty($_POST['filters']['category'])) {
		        $where.=' and p.cat_id='.$_POST['filters']['category'];
		    }
		    if(!empty($_POST['filters']['sortby'])) {
		        //value is based on price use
		        if(strtolower($_POST['filters']['sortby'])=='price' || strtolower($_POST['filters']['sortby'])=='discount') {
		            //$cwhere.=' order by i.'.$_POST['filters']['sortby'].' '.$_POST['filters']['order'];
		            $sort = 1;
		        } else {
		            $where.=' order by p.'.$_POST['filters']['sortby'].' '.$_POST['filters']['order'];
		            //popular products
		            //$data = $QueryFire->getAllData('','','SELECT sum(ohp.qty) AS sold,(ohp.price- (ohp.price * ohp.discount / 100) ) as price,sum( (ohp.price- (ohp.price * ohp.discount / 100) ) * ohp.qty ) AS total,p.name,p.item_code,p.id FROM order_has_products as ohp JOIN products as p ON p.id=ohp.product_id WHERE p.is_deleted=0 GROUP BY ohp.product_id');
		        }
		    }
		    if(!isset($_POST['page'])) {
		        $_POST['page'] = 1;
		    }
		    $where.=' limit '.(($_POST['page']-1)*20).',20';
		    $products = $QueryFire->getAllData('products',$where,'SELECT p.*,(SELECT concat(discount,"___",price)'.$subquery.' FROM inventry as i WHERE i.product_id=p.id LIMIT 1) as discount_price FROM products as p WHERE '.$where);
		    $option = '';
		    if(!empty($products)) {
		        $products = array_map(function($a){
		            $price = explode('___',$a['discount_price']);
		            $a['price'] = $price[1];
		            $a['discount'] = $price[0];
		            return $a;
		        },$products);
		        if(isset($sort)) {
		            $filters = $_POST['filters'];
		            if($filters['sortby']=='price') {
                        if(strtolower($filters['order'])=='desc') {
                            usort($products, function($a, $b) {
                                if($b['price'] == $a['price'])
		                            return 0;
                                return $a['price'] <=> $b['price'];
                            });
                        } else {
                            usort($products, function($a, $b) {
                                if($b['price'] == $a['price'])
		                            return 0;
                                return $b['price'] <=> $a['price'];
                            });
                        }
		            } else {
		                usort($products, function($a, $b) {
		                    if($b['discount'] == $a['discount'])
		                        return 0;
                            return $b['discount'] <=> $a['discount'];
                        });
		            }
                    /*usort($products, function($a,$b) use($filters){
                        $price1 = explode('___',$a['discount_price']);
                        $price2 = explode('___',$a['discount_price']);
                        if(strtolower(filters['sortby'])=='price') {
                            $price1 = $price1[1];
                            $price2 = $price2[1];
                        } else {
                            $price1 = $price1[0];
                            $price2 = $price2[0];
                        }
                        if(strtolower(filters['order'])=='desc') {
                            return ($price1 < $price2) ? -1 : 1;
                        } else {
                            return ($price1 > $price2) ? -1 : 1;
                        }
                    });*/
		        }
                foreach($products as $row){
                    $price = explode('___',$row['discount_price']);
                    $discount=$price[0];
                    
                    $price = $price[1];
                    $option.="<div class='col-sm-3 col-md-3 col-xs-12 ' style='height:410px'>
                        <div class='box-shadow box-cs ' style=''>
                           <div class='image' style='padding:10px'> 
                              <img src='".base_url.'images/products/'.$row['image_name']."' alt='' class='img-responsive'> 
                           </div>
                           <label style='padding-left:8px; font-size:12px; font-weight:600'>".$row['name']."</label><br /> 
                          
                           <label style='padding-left:8px; font-size:16px; font-weight:800; '> <i class='mdi mdi-currency-inr'></i>".($price-($price*$discount/100))."</label><br />
                           ".($discount>0?"<label style='padding-left:8px; font-size:13px; font-weight:300; '>M.R.P. <font style='text-decoration:line-through; text-decoration-color:#8DC133; font-weight:300'> <i class='mdi mdi-currency-inr'></i>".($price)."</font> </label><br /><br />":"")."
                        </div>";
                    $flag=0; 
                    foreach($_SESSION['cartitems'] as $cart){
                      if($cart['id']==$row['id']){
                          $flag=1;
                      } 
                    } 
				   if($flag==1){ 
    				    $option.="<div class='input-group text-center box-shadow add-cart'  >
                            <span class='input-group-btn' >
                            <button data-id=". $row['id'] ." class='btn minus' style='background-color:#ffc248;color:#fff' type='button'>-</button>
                            </span>
                            <input type='text' class='form-control text-center input-qty' style='padding:0px;' value=". $cart['quantity'] ." >
                            <span class='input-group-btn'>
                            <button data-id=". $row['id'] ." class='btn  plus' style='background-color:#ffc248;color:#fff' type='button'>+</button>
                            </span>
                         </div>";
                    } else{
                        $option.="<div class='input-group box-shadow add-cart' style=''> 
                            <a style='' class='btn-cart add-cart2' data-id='".$row['id']."' href='#'>Add To Cart</a>
                        </div>";
                    }
                    $option.='</div></div>';
                    /*<div class='input-group' style='margin-top: 10px; width:100%; background-color:#ffc248; padding:4px; border-radius:15px;'> 
                           <span class='input-group-addon' style='border:none ;background-color:#ffc248 '> 
                           <a style='border:none ;background-color:#ffc248' data-id='".$row['id']."' class='add-qty' href='#'><i class='fa fa-minus-circle' style='color:white'></i> </a>
                           </span> 
                           <a style='border:none ;background-color:#ffc248' class='btn-cart' data-id='".$row['id']."' href='#'>Add To Cart</a> 
                           <span   class='input-group-addon' style='border:none ;background-color:#ffc248'> 
                           <a style='border:none ;background-color:#ffc248' class='remove-qty' data-id='".$row['id']."' href='#'><i class='fa fa-plus-circle'></i> </a> 
                           </span> 
                        </div>*/
                    }
            }
            echo $option;
		    break;
		case 'getparamvalues':
			$data = array();
			$states = $QueryFire->getAllData('product_params_values',' is_deleted=0 and param_id ='.$_REQUEST['id']);
			$selected = !empty($_REQUEST['selected'])?explode(',', $_REQUEST['selected']):array();
			if(!empty($states)) {
				foreach($states as $state) {
					if(in_array($state['id'], $selected))
						array_push($data, array('id'=> $state['id'],'text'=>$state['param_value'],"selected" => true));
					else
						array_push($data, array('id'=> $state['id'],'text'=>$state['param_value']));
				}
			}
			echo json_encode($data);
			break;
		case 'useraddress':
			$where = ' id ='.$_REQUEST['id'];
			$data = $QueryFire->getAllData('user_addresses',$where);
			$ar = array();
			if(!empty($data[0]))
			{
				$ar['status'] = true;
				$ar['data'] = $data;
			}
			else
			{
				$ar['status'] = false;
				$ar['error'] = "Data not found";
			}
			echo json_encode($ar);
			break;
		case 'del_user_add':
			$where = 'id ='.$_REQUEST['id'];
			$QueryFire->upDateTable("user_addresses",$where,array('is_deleted'=>1));
			//$QueryFire->deleteDataFromTable('user_addresses',$where);
			header('Location:'.$_SERVER['HTTP_REFERER']);
			break;
		case 'sendsms':
			$res = $QueryFire->sensSMS('8698511512','test');
			pr($res);
			header('Location:'.$_SERVER['HTTP_REFERER']);
			break;
		case 'add-pincodes':
		    if(!empty($_GET['start']) && !empty($_GET['end']) && ($_GET['end']-$_GET['start'] > 0 )) {
    		    for($i=$_GET['start'];$i<=$_GET['end'];$i++) {
                    $data = $QueryFire->getAllData('pincodes',' pincode ='.$i);
        			if(empty($data)) {
        			    $QueryFire->insertData('pincodes',array('pincode'=>$i));
        			}
                }
                echo "success";
		    }
			break;
		case 'add-product-inventry':
            $data = $QueryFire->getAllData('products',' is_deleted =0');
            $i = 0;
			if(!empty($data)) {
			    foreach($data as $product) {
			        $duplicate = $QueryFire->getAllData('inventry',' product_id='.$product['id']);
			        if(empty($duplicate)) {
			            $i++;
			            $price = $product['price'] - ($product['price']*$product['discount']/100);
			            $QueryFire->insertData('inventry',array('product_id'=>$product['id'],'qty'=>$product['qty'],'rate'=>$price));
			            $QueryFire->insertData('inventry_log',array('product_id'=>$product['id'],'qty'=>$product['qty'],'rate'=>$price));
			        }
			    }
			}
			echo $i." records added ";
			break;
		default:
			echo "No action Found";
			break;
	}
}

