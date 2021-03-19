<?php
include '../action/itemAction.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- <script src="https://kit.fontawesome.com/f3d03e8132.js"></script> -->

  <!-- Custom styles for this template -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id = "navbar">
    <div class="container">
      <a class="navbar-brand" href="#">AsaFarm</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./signInShop.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./signInShop.php"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./signOut" >SignOut</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card mx-auto w-75 my-5 border border-0">
      <div class="card-header bg-white border-0 text-primary">
        <h1 class="text-center">Edit</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Price</th>
              <th>Stocks</th>
              <th>Categories</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $row = $itemHandle->selectAllItems($_SESSION['user_id']);
            foreach ($row as $item) {
            ?>
              <tr>
                <td><?php echo $item['item_id'] ?></td>
                <td><?php echo $item['item_name'] ?></td>
                <td><?php echo $item['item_price'] ?></td>
                <td><?php echo $item['item_stocks'] ?></td>
                <td><?php echo $item['category_name'] ?></td>
                <td><a href="./update.php?item_id=<?php echo $item['item_id']; ?>" class="btn btn-primary  btn-sm active" role="button" aria-pressed="true">Update</a></td>
                <td><a href="./deleteItem.php?item_id=<?php echo $item['item_id']; ?>?>" class="btn btn-danger  btn-sm active" role="button" aria-pressed="true">Delete</a></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
          <a href="./register.php">Go Register</a>
      <!-- <div class="row no-gutters bg-light position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
          <img src="../image/register.jpg" class="w-100" alt="...">
        </div>
        <div class="col-md-6 position-static p-4 pl-md-0">
          <h5 class="mt-0">Let's Register Vegetable</h5>
          <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
        </div>
      </div> -->
    </div>
  </div>




</body>