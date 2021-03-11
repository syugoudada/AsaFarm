<?php
  require_once '../class/User.php';
  $userHandle = new User();
  session_start();

  if(isset($_POST['sign_up'])){
    $create_result = $userHandle->createUser($_POST['username'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['first_name'],$_POST['last_name']);
  }elseif(isset($_POST['sign_in'])){
    $userHandle->login($_POST['username'],$_POST['password']);
  }
?>