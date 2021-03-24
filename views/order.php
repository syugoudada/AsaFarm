<?php

use function PHPSTORM_META\type;

include '../action/ItemAction.php';
$row = $itemHandle->selectOrderItems($_SESSION['user_id']);

if (isset($_SESSION['user_id'])) {
  $url = "./signInShop.php";
} else {
  $url = "./shop.php";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/cart.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="../css/font.css">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <script src="https://use.fontawesome.com/c560c025cf.js"></script>
  <script src="../js/detail.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="./signInShop.php">AsaFarm</a>
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
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <?php
          if (isset($_SESSION['user_id']) && $_SESSION['status'] != 'U') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="./dashboard.php">
              <?php
              echo 'DashBoard';
            }
              ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./signOut.php">SignOut</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container main">
    <form action="../action/ItemAction.php" method="POST">
      <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          ショッピングカート
          <a href="" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">

          <!-- PRODUCT -->
          <?php
          $total = 0;
          foreach ($row as $item) {
            $total += ($item['item_price'] * $item['buy_quantity']);
          ?>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-2 text-center">
                <img class="img-responsive img-item" src="../uploads/<?php echo $item['item_image'] ?>" alt="prewiew" width="140" height="100">
              </div>
              <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                <h4 class="product-name"><strong><?php echo $item['item_name'] ?></strong></h4>
                <h4>
                  <small><?php echo $item['description'] ?></small>
                </h4>
              </div>
              <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                  <h6><strong><?php echo ($item['item_price'] * $item['buy_quantity']) ?><span class="text-muted"></span></strong></h6>
                </div>
                <div class="col-4 col-sm-4 col-md-4">
                  <div class="quantity">
                    <!-- <input type="button" value="+" class="plus"> -->
                    <input type="number" step="1" max="99" min="1" value="<?php echo $item['buy_quantity'] ?>" title="Qty" class="qty" size="4">
                    <!-- <input type="button" value="-" class="minus"> -->
                  </div>
                </div>
                <div class="col-2 col-sm-2 col-md-2 text-right">
                  <a href="./deleteOrderItem.php?order_id=<?php echo $item['order_id'];  ?>" class="btn btn-outline-danger btn-xs delete-btn" role="button" aria-pressed="true"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <hr>
          <?php
          }
          ?>
          <!-- END PRODUCT -->
          <div class="pull-right">
            <a href="" class="btn btn-outline-secondary pull-right">
              Update shopping cart
            </a>
          </div>
        </div>
        <div class="card-footer">
          <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
            <div class="row">
              <div class="col-6">
                <input type="text" class="form-control" placeholder="cupone code">
              </div>
              <div class="col-6">
                <input type="submit" class="btn btn-default" value="Use cupone">
              </div>
            </div>
          </div>
          <div class="pull-right" style="margin: 10px">
            <button type="submit" name="purchase" class="btn btn-success shop-button pull-right">CheckOut</button>
            <div class="pull-right" style="margin: 5px">
              Total price: <b><?php echo number_format($total); ?>円</b>
              <input type="hidden" name="total" value="<?php echo $total?>">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

</body>

</html>