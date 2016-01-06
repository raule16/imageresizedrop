<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
include( 'function.php');

$max_file_size = 1024*200; // 200kb CONTROLAR AQUI TAMAÑO DE IMAGENES
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');

$sizes = array(100 => 100, 150 => 150, 250 => 250);

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

echo '<pre>';

  if( $_FILES['file']['size'] < $max_file_size ){
    // get file extension
    $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $valid_exts)) {
      /* resize image */
      foreach ($sizes as $w => $h) {
        $files[] = resize($w, $h);
      }

    } else {
      $msg = 'Unsupported file';
    }
  } else{
    $msg = 'Please upload image smaller than 200KB';
  }
echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";

?>




