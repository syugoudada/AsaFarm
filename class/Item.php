<?php
require_once 'Database.php';
class Item extends Database{

  public function selectAllItems($userId){
    $sql = "SELECT items.item_id,items.item_name,items.item_price,items.item_stocks,categorys.category_name from items,categorys WHERE items.category_id = categorys.category_id and items.user_id = $userId";
    $result = $this->conn->query($sql);
    return $result->fetch_assoc();
  } 

}