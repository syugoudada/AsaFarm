<?php
  include '../action/itemAction.php';

  $orderId = $_GET['order_id'];

  $itemHandle->deleteOrderItem($orderId);
?>
