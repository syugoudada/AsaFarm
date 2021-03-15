<?php
define("IMAGE_PATH", "../items_image");


/**
 * Image Register
 * @param stirng $id
 * @param array $file ['image_name'],['image_tmp']
 * @return boolean 
 */

function image_register(string $id,array $file){
  $name = $file['image_name'];
  $tmp_file = $file['image_tmp'];
  move_uploaded_file($tmp_file,IMAGE_PATH.$name);
  if (rename(IMAGE_PATH . $name, IMAGE_PATH . "item$id.png")) {
    image_extension($id);
    return true;
  } else {
    return false;
  }
}

  /**
 * Change Image extension
 * @param string $id
 */

function image_extension($id){
  $image = (IMAGE_PATH."item$id.png");
switch(exif_imagetype($image)){
  case IMAGETYPE_JPEG :
    $img = imagecreatefromjpeg($image);
    break;
  case IMAGETYPE_GIF :
    $img = imagecreatefromgif($image);
    break;
  case IMAGETYPE_PNG :
    $img = imagecreatefrompng($image);
    break;
}
image_resize($img,$id);
}

/**
 * Image Risize
 * @param $id product_id
 * @param $img old image
 */

function image_resize($img,$id){
  list($width, $height) = getimagesize(IMAGE_PATH."item$id.png");
  $new_width = 500;
  $new_height = 300;

  //New Image Size
  $image_r = imagecreatetruecolor($new_width, $new_height);

  imagecopyresampled($image_r, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

  imagepng($image_r, IMAGE_PATH."item$id.png");

  //Tmp area image remove
  imagedestroy($image_r);
  imagedestroy($img);
}
?>