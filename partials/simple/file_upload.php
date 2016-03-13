<?php
require 'Uploader.php';
require "../Image.php";
// Directory where we're storing uploaded images
// Remember to set correct permissions or it won't work
$upload_dir = 'upload_files/';

$uploader = new FileUpload('uploadfile');

// Handle the upload
$ext = $uploader->getExtension();
$filename = $uploader->getFileName();
$num = 0;
while (file_exists($upload_dir."tmp_$num.$ext"))
	$num++;
$uploader->newFileName = "tmp_$num.$ext";
$result = $uploader->handleUpload($upload_dir);

$thumb = "upload_files/thumb_$num.jpeg";
if (Image::isValidImage("upload_files/tmp_$num.$ext")){
	$image = Image::createSquareThumbNail("upload_files/tmp_$num.$ext", 340);
	Image::flushImage($image, $thumb, "jpg");
}
else{
	echo json_encode(array("success"=>false, "msg"=>"Invalid image file"));
}

if (!$result) {
  exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
}

echo json_encode(array('success' => true, 'msg' => $uploader->newFileName, 'thumb'=>$thumb));