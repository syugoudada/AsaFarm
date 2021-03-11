<?php
require_once 'Database.php';
class Item extends Database{

  /**
   * selectAllItems
   * 
   * @return array $row
   */

  public function selectAllItems($userId){
    $sql = "SELECT items.item_id,items.item_name,items.item_price,items.item_stocks,categorys.category_name from items,categorys WHERE items.category_id = categorys.category_id and items.user_id = $userId";
    
    $row = array();
    $result = $this->conn->query($sql);

    if($result->num_rows > 0){
      while($itemDetail = $result->fetch_assoc()){
        $row[] = $itemDetail;
      }
    }
    return $row;
  } 

  /**
   * selectItems 12 Items Get
   * 
   * @return array $row
   */

  public function selectItems(){
    $sql = "SELECT * from items LIMIT 12";
    $row = array();
    $result = $this->conn->query($sql);

    if($result->num_rows > 0){
      while($itemDetail = $result->fetch_assoc()){
        $row[] = $itemDetail;
      }
    }
    return $row;
  }

}