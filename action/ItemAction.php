<?php
  require_once '../class/Item.php';
  $itemHandle = new Item();
  session_start();

  if(isset($_POST['register'])){
    
    if($itemHandle->insertItem($_POST['item_name'],$_POST['item_price'],$_POST['item_stock'],$_POST['seasonRadio'])){
      
    }

  }