<?php

use function PHPSTORM_META\type;

require_once 'Database.php';
date_default_timezone_set('Asia/Tokyo');
class Item extends Database{

  /**
   * selectAllItems
   * 
   * @return array $row
   */

  public function selectAllItems($userId){
    $sql = "SELECT items.item_id,items.item_name,items.item_price,items.item_stocks,items.item_image,categorys.category_name from items,categorys WHERE items.category_id = categorys.category_id and items.user_id = $userId Order By item_id";
    
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

  public function selectPopularItems(){
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

  /**
   * @param string $itemId
   * @return array $result
   */

   public function selectItem($itemId){
    $sql = "SELECT * from items where item_id = '$itemId'";
    $result = $this->conn->query($sql);
    return $result->fetch_assoc();
   }

  /**
   * Add Item
   * 
   * @param string $userId
   * @param string $itemId
   * @param string $quantity
   * 
   */

  public function insertOrderItem($userId,$itemId,$quantity){
    $today = date("Y-m-d H:i:s");     
    $sql = "Insert Into orders(user_id,item_id,buy_quantity,ordered_date) VALUES('$userId','$itemId','$quantity','$today')";
    if($this->conn->query($sql)){
      return true;
    }else{
      return false;
    }
  }

  /**
   * Order Item List
   * 
   * @param string $userId
   * @return array $row
   */

  public function selectOrderItems($userId){
    $sql = "SELECT * from orders JOIN items ON orders.item_id = items.item_id WHERE orders.user_id = '$userId'";

    $row = array();
    $result = $this->conn->query($sql);

    if($result->num_rows > 0){
      while($item = $result->fetch_assoc()){
        $row[] = $item;
      }
    }
    return $row;
  }

  /**
   * Register Item
   * 
   * @param string $name
   * @param string $price
   * @param string $stock
   * @param string $description
   * @return boolean
   * 
   */

  public function insertItem($name,$price,$stock,$description,$image_name,$userId,$categoryId){
    $sql = "Insert Into items(item_name,item_price,item_stocks,description,item_image,user_id,category_id) VALUES('$name','$price','$stock','$description','$image_name','$userId','$categoryId')";

    if($this->conn->query($sql)){
      return true;
    }else{
      return false;
    } 
  }

}