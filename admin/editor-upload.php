<?php
require_once('constant.php');
if(empty($_FILES['file']))
{
	exit();	
}
$destinationFilePath = '../assets/images/summernote/'.$_FILES['file']['name'];
if(move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath))
	echo base_url.'assets/images/summernote/'.$_FILES['file']['name'];
?>