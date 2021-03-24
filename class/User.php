<?php
require_once 'Database.php';
class User extends Database
{

  /**
   * createUser
   * 
   * @param string $username  
   * @param string $password
   * @param string $first_name
   * @param string $last_name
   */

  public function createUser($username, $password, $first_name, $last_name)
  {

    $sql = "INSERT INTO users(username,password,first_name,last_name) VALUES ('$username','$password','$first_name','$last_name')";

    if ($this->conn->query($sql)) {
      header("Location: ../views/signIn.php");
    } else {
      header("Location: ../views/signUp.php");
    }
  }

  /**
   * login
   * 
   * @param string $username
   * @param string $password
   */

  public function login($username, $password)
  {
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $this->conn->query($sql);
    setcookie('userName',$username,time()+3600);

    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['status'] = $row['status'];
        if ($_SESSION['status'] == 'U') {
          header("Location:../views/signInShop.php");
        } else {
          header("Location:../views/dashboard.php");
        }
      } else {
        header("Location:../views/signIn.php");
      }
    }else{
      header("Location:../views/signIn.php");
    }
  }
}
