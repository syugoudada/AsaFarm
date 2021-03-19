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
            <div class="image_selected"><img src="../uploads/<?php echo $item['item_image'] ?>" alt="">
            </div>
            <h3>Review</h3>
            <div class="row mt-5">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                      <title>Placeholder</title>
                      <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image</text>
                    </svg>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image">
                      <title>Placeholder</title>
                      <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image</text>
                    </svg>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
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
                <span class="product_info">7 Days easy return policy</span><br>
                <span class="product_info">7 Days easy return policy</span><br>
                <span class="product_info">In Stock:<?php echo $item['item_stocks']; ?>個</span>
              </div>

              <hr class="singleline">
              <div class="order_info d-flex flex-row">
                <form action="./../action/ItemAction.php" method="POST">
              </div>
              <div class="row">
                <div class="col-xs-6" style="margin-left: 13px;">
                  <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="number" name="quantity" required min="1"></div>
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

</body>

</html>