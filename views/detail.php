<?php
include '../action/ItemAction.php';
$itemId = $_GET['item_id'];
$item = $itemHandle->selectItem($itemId);
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AsaFarm</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/detail.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    //your javascript goes here
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="./shop.php">AsaFarm</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./shop.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="super_container my-5">
    <div class="single_product">
      <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
        <div class="row">

          <div class="col-lg-6 order-lg-2 order-1">
            <div class="image_selected"><img src="../uploads/<?php echo $item['item_image'] ?>" alt=""></div>

          </div>
          <div class="col-lg-6 order-3 my-3">
            <div class="product_description">
              <div class="product_name"><?php echo $item['item_name'] ?></div>
              <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35 Ratings & 45 Reviews</span></div>
              <div> <span class="product_price">￥<?php echo $item['item_price'] ?></span> </div>
              <hr class="singleline">
              <div>
                <span class="product_info"><?php echo $item['description'] ?></span><br>
                <span class="product_info">7 Days easy return policy</span><br>
                <span class="product_info">7 Days easy return policy</span><br>
                <span class="product_info">In Stock:<?php echo $item['item_stocks']; ?>個</span>
              </div>

              <hr class="singleline">
              <div class="order_info d-flex flex-row">
                <form action="#">
              </div>
              <div class="row">
                <div class="col-xs-6" style="margin-left: 13px;">
                  <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="number" name="quantity" required min="1"></div>
                  <input type="hidden" name="item_id" value="<?php echo $itemId; ?>">
                </div>
                <div class="col-xs-6"> <button type="submit" class="btn btn-primary shop-button" disabled>Add to Order</button> <button type="button" class="btn btn-success shop-button" disabled>Buy Now</button>
                  </form>
                </div>
                <div class="media position-relative mt-5" style="margin-left: 13px;">
                  <div class="media-body">
                    <h5 class="mt-0 text-danger">サインインしてください</h5>
                    <p>注文するためには必要です。</p>
                    <a href="./signIn.php" class="stretched-link">Go SignIn</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>