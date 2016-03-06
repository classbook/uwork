<?php
require 'Uploader.php';

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

if (!$result) {
  exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
}

echo json_encode(array('success' => true, 'msg' => $uploader->newFileName));