<?php
  include '../action/itemAction.php';

  $itemId = $_GET['item_id'];

  $itemHandle->deleteItem($itemId);
?>
