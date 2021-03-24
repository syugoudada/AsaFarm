<?php
require_once "Database.php";
define("IMAGE_PATH", "../items_image");

class Image extends Database
{

  public function insertToTable($image)
  {
    $sql = "INSERT INTO items(image_name) VALUES('$image') ";

    if ($this->conn->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function showAllImages()
  {
    $sql = "SELECT user_picture FROM users";

    $rows = array();

    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }

      return $rows;
    }
  }

  public function showSpecificImage($id)
  {
    $sql = "SELECT user_picture FROM users WHERE user_id = '$id'";

    $result = $this->conn->query($sql);

    return $result->fetch_assoc();
  }
}