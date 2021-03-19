<?php

use function PHPSTORM_META\type;

require_once 'Database.php';
date_default_timezone_set('Asia/Tokyo');
class Item extends Database
{

  /**
   * selectAllItems
   * 
   * @return array $row
   */

  public function selectAllItems($userId)
  {
    $sql = "SELECT items.item_id,items.item_name,items.item_price,items.item_stocks,items.item_image,categorys.category_name from items,categorys WHERE items.category_id = categorys.category_id and items.user_id = $userId Order By item_id";

    $row = array();
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      while ($itemDetail = $result->fetch_assoc()) {
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

  public function selectPopularItems()
  {
    $sql = "SELECT * from items LIMIT 12";
    $row = array();
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      while ($itemDetail = $result->fetch_assoc()) {
        $row[] = $itemDetail;
      }
    }
    return $row;
  }

  public function selectSeasonItems($seasonId)
  {
    $sql = "SELECT * from items WHERE category_id = '$seasonId'";
    $row = array();
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      while ($itemDetail = $result->fetch_assoc()) {
        $row[] = $itemDetail;
      }
    }
    return $row;
  }

  /**
   * @param string $itemId
   * @return array $result
   */

  public function selectItem($itemId)
  {
    $sql = "SELECT * from items where item_id = '$itemId'";
    $result = $this->conn->query($sql);
    return $result->fetch_assoc();
  }

  
  /**
   * Order Item List
   * 
   * @param string $userId
   * @return array $row
   */
  
  public function selectOrderItems($userId)
  {
    $sql = "SELECT * from orders JOIN items ON orders.item_id = items.item_id WHERE orders.user_id = '$userId'";

    $row = array();
    $result = $this->conn->query($sql);
    
    if ($result->num_rows > 0) {
      while ($item = $result->fetch_assoc()) {
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
  
  public function insertItem($name, $price, $stock, $description, $imageName, $categoryId, $userId)
  {
    $sql = "Insert Into items(item_name,item_price,item_stocks,description,item_image,user_id,category_id) VALUES('$name','$price','$stock','$description','$imageName','$userId','$categoryId')";
    
    if ($this->conn->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
  
  /**
   * Add Item
   * 
   * @param string $userId
   * @param string $itemId
   * @param string $quantity
   * 
   */

  public function insertOrderItem($userId, $itemId, $quantity)
  {
    $today = date("Y-m-d H:i:s");
    $sql = "Insert Into orders(user_id,item_id,buy_quantity,ordered_date) VALUES('$userId','$itemId','$quantity','$today')";
    if ($this->conn->query($sql)) {
      return true;
    } else {
      return false;
    }
    return true;

  }

  /**
   *  Update Item Quantity
   * 
   *@param string $itemId
   *@param string $itemQuantity
   *   
   */

  public function updateItemQuantity($itemId, $itemQuantity)
  {
    $item = $this->selectItem($itemId);

    $stock = $item['item_stocks'] - $itemQuantity;

    $sql = "UPDATE items SET item_stocks = '$stock' WHERE item_id = '$itemId'";

    if ($this->conn->query($sql)) {
      header("Location:../views/order.php");
    } else {
      header("Location:../views/signInDetail.php");
    }
  }

  /**
   * Delete Order List Item
   * 
   * @param string $orderId
   */

  public function deleteOrderItem($orderId){
    $sql = "DELETE from orders WHERE order_id = $orderId";
    if ($this->conn->query($sql)) {
      header("Location:../views/order.php");
    } else {
      return false;
    }
  }

  /**
   * Insert Review
   * 
   * @param string userId
   * @param string itemId
   * @param string comment
   */

   public function insertReview($userId,$itemId,$comment){
    $sql = "Insert Into reviews(user_id,item_id,review_text) VALUES('$userId','$itemId','$comment')";
    if($this->conn->query($sql)){
      header("Location:../views/signInDetail.php?item_id=$itemId");
    }else{
      header("Location:../views/signInDetail.php?item_id=$itemId");
    }
   }

  /**
   * Delete Item
   * 
   * @param string $itemId
   */


   public function deleteItem($itemId){
    $sql = "DELETE from items WHERE item_id = '$itemId'";
    if ($this->conn->query($sql)) {
      $this->deleteWithOrderItem($itemId);
    } else {
      return false;
    }
  }

  /**
   * Delete Order Not Exist Items
   * 
   * @param string $itemId
   */

  public function deleteWithOrderItem($itemId){
    $sql = "DELETE from orders WHERE item_id = '$itemId'";
    if($this->conn->query($sql)){
      header("Location:../dashboard.php");
    }
  }

  /**
   * Update Item
   * 
   * @param string $name
   * @param string $price
   * @param string $description
   * @param string $nowImageName
   * @param string $newImageName
   * 
   * @return boolean 
   * 
   */

  public function updateItem($name, $price, $stock, $description,$nowImageName, $newImageName="", $categoryId,$itemId){
    if(isset($newImageName) && $newImageName!=""){
      $image = $newImageName;
    }else{
      $image = $nowImageName;
    }
    $today = date("Y-m-d H:i:s");
    $sql = "UPDATE items SET item_name = '$name',
                      item_price = '$price',
                      item_stocks = '$stock',
                      description = '$description',
                      item_image = '$image',
                      category_id = '$categoryId',
                      updated_date = '$today'
                      WHERE item_id = '$itemId'";
    if($this->conn->query($sql)){
      return true;
    }else{
      return false;
    }
  }
}
