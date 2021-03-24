<?php
require_once '../class/Item.php';
$itemHandle = new Item();
session_start();

if (isset($_POST['register'])) {
  $image = $_FILES['item_image']['name'];
  
  $targetDir = "../uploads/";
  $targetFile = $targetDir . basename($_FILES['item_image']['name']);

  if ($itemHandle->insertItem($_POST['item_name'], $_POST['item_price'], $_POST['item_stock'], $_POST['description'], $image,$_POST['seasonRadio'],$_SESSION['user_id'])) {
    move_uploaded_file($_FILES['item_image']['tmp_name'], $targetFile);
    header("Location:../views/dashboard.php");
  }else{
    header("Location:../views/register.php");
  }
}elseif(isset($_POST['order'])){
  if($itemHandle->insertOrderItem($_SESSION['user_id'],$_POST['item_id'],$_POST['quantity'])){
    $itemHandle->updateItemQuantity($_POST['item_id'],$_POST['quantity']);
  }
}elseif(isset($_POST['review'])){
  $itemHandle->insertReview($_SESSION['user_id'],$_POST['item_id'],$_POST['comment']);
}elseif(isset($_POST['update'])){
  if(isset($_FILES['new_item_image']['name'])){
    $image = $_FILES['new_item_image']['name'];
  }
  if($itemHandle->updateItem($_POST['item_name'], $_POST['item_price'], $_POST['item_stock'], $_POST['description'],$_POST['now_item_image'] ,$image,$_POST['seasonRadio'],$_POST['item_id'])){
    if($image != ""){
      $targetDir = "../uploads/";
      $targetFile = $targetDir . basename($_FILES['new_item_image']['name']);
      move_uploaded_file($_FILES['new_item_image']['tmp_name'], $targetFile);
    }
    header("Location:../views/dashboard.php");
  }else{
    header("Location:../views/update.php?item_id=".$_POST['item_id']);
  }
}elseif(isset($_POST['purchase'])){
  if($itemHandle->insertRecipte($_SESSION['user_id'])){
    $itemHandle->deleteOrderItemsToPuchase($_SESSION['user_id']);
  }
}