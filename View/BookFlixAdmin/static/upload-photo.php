<?php
include('../../../Model/Admin.php');
session_start();
if (isset($_FILES['myFile'])) {
    $new_width = $new_height = 200;
    $file_name = $_FILES['myFile']['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize($file_name);
    $src = imagecreatefromstring(file_get_contents($file_name));
    $dst = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagedestroy($src);
    $upload_dir = 'imageAdmin/'; // adjust directory path as needed
    $target_filename = $_FILES['myFile']['name'];
    $target_filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $target_filename);
    $target_filename = $target_filename . ".png";
    $target_path = $upload_dir . $target_filename;
    imagepng($dst, $target_path); // adjust format as needed
    imagedestroy($dst);
    //echo "The file has been uploaded and resized successfully as $target_filename.";
    $image = file_get_contents($target_path);
    // Escape special characters in the image data
    //$newadmin=new Admin('','','','','','','','','',$image);
    CrudAdmin::UpdateImageAdmin($_SESSION['idAdmin'],$image);
    header("location: AdminProfile.php");
}
?>
