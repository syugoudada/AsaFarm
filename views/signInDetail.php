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
  <link rel="stylesheet" href="../css/font.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>
  <script src="../js/review.js" defer></script>

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
            <li class="nav-item" style="display:flex;">
              <a class="nav-link" href="./order.php">Cart</a>
              <i class="fas fa-shopping-cart mt-2"></i>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="super_container mt-5">
    <div class="single_product">
      <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
        <div class="row">
          <div class="col-lg-6 order-lg-2 order-1">
            <div class="image_selected"><img src="../uploads/<?php echo $item['item_image'] ?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-3 my-3">
            <div class="product_description">
              <div class="product_name"><?php echo $item['item_name'] ?></div>
              <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35 Ratings & 45 Reviews</span></div>
              <div> <span class="product_price">￥<?php echo $item['item_price'] ?></span> </div>
              <hr class="singleline">
              <div>
                <span class="product_info"><?php echo $item['description'] ?></span><br>
                <span class="product_info">賞味期限 : 7日</span><br>
                <span class="product_info"></span><br>
                <span class="product_info">在庫 : <?php echo $item['item_stocks']; ?>個</span>
              </div>

              <hr class="singleline">
              <div class="order_info d-flex flex-row">
                <form action="./../action/ItemAction.php" method="POST">
              </div>
              <div class="row">
                <div class="col-xs-6" style="margin-left: 13px;">
                  <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="number" name="quantity" required min="1" max="<?php echo $item['item_stocks']; ?>"></div>
                  <input type="hidden" name="item_id" value="<?php echo $itemId; ?>">
                </div>
                <div class="col-xs-6"> <button type="submit" name="order" class="btn btn-primary shop-button">Add to Order</button>
                  <!-- <button type="button" class="btn btn-success shop-button">Buy Now</button> -->
                  </form>
                </div>
              </div>
              <div class="row" style="margin-top:40px;">
                <div class="col-md-6">
                  <div class="well well-sm">
                    <div class="right">
                      <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                    </div>

                    <div class="row" id="post-review-box" style="display:none;">
                      <div class="col-md-12">
                        <form accept-charset="UTF-8" action="../action/itemAction.php" method="post">
                          <input id="ratings-hidden" name="rating" type="hidden">
                          <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                          <input type="hidden" name="item_id" value="<?php echo $itemId; ?>">

                          <div class="text-right mt-2">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                              <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-sm" type="submit" name="review">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
      $row = $itemHandle->selectReview($itemId);
      if(count($row) > 1){
  ?>
  <div class="super_container">
    <div class="single_product" style="height: 60vh;">
      <div class="container-fluid mt-5" style="background-color: #fff;">
        <h3 class="pt-3">Review</h3>
        <div class="row" style="padding: 10px;">
        <?php 
          foreach($row as $review){
        ?>
          <div class="col-4 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h4 class="card-title">
                  <p><?php echo $item['item_name']; ?></p>
                </h4>
                <h5><?php echo $review['username'];?></h5>
                <p class="card-text"><?php echo $review['review_text'];?></p>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php 
      }
  ?>
</body>

</html>