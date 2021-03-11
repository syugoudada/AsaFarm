<?php
include '../action/ItemAction.php';
// $itemId = $_GET['item_id'];
?>

<!DOCTYPE html>
<html lang="ja">

<!-- <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../detail.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  
</head> -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Snippet - BBBootstrap</title>
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
  <div class="super_container">
    <header class="header" style="display: none;">
      <div class="header_main">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
              <div class="header_search">
                <div class="header_search_content">
                  <div class="header_search_form_container">
                    <form action="#" class="header_search_form clearfix">
                      <div class="custom_dropdown">
                        <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                          <ul class="custom_list clc">
                            <li><a class="clc" href="#">All Categories</a></li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="single_product">
      <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
        <div class="row">
          <div class="col-lg-2 order-lg-1 order-2">
            <ul class="image_list">
              <li data-image="https://i.imgur.com/21EYMGD.jpg"><img src="https://i.imgur.com/21EYMGD.jpg" alt=""></li>
              <li data-image="https://i.imgur.com/DPWSNWd.jpg"><img src="https://i.imgur.com/DPWSNWd.jpg" alt=""></li>
              <li data-image="https://i.imgur.com/HkEiXfn.jpg"><img src="https://i.imgur.com/HkEiXfn.jpg" alt=""></li>
            </ul>
          </div>
          <div class="col-lg-4 order-lg-2 order-1">
            <div class="image_selected"><img src="https://i.imgur.com/qEwct2O.jpg" alt=""></div>
          </div>
          <div class="col-lg-6 order-3 my-3">
            <div class="product_description">
              <div class="product_name">Acer Aspire 3 Celeron Dual Core - (2 GB/500 GB HDD/Windows 10 Home) A315-33 Laptop (15.6 inch, Black, 2.1 kg)</div>
              <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35 Ratings & 45 Reviews</span></div>
              <div> <span class="product_price">￥ 29,000</span> </div>
              <hr class="singleline">
              <div> <span class="product_info">EMI starts at ₹ 2,000. No Cost EMI Available<span><br> <span class="product_info">Warranty: 6 months warranty<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">In Stock: 25 units sold this week<span> </div>
              <div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="br-dashed">
                      <div class="row">
                        <div class="col-md-3 col-xs-3"> <img src="https://img.icons8.com/color/48/000000/price-tag.png"> </div>
                        <div class="col-md-9 col-xs-9">
                          <div class="pr-info"> <span class="break-all">Get 5% instant discount + 10X rewards @ RENTOPC</span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7"> </div>
                </div>
              </div>
              <hr class="singleline">
              <div class="order_info d-flex flex-row">
                <form action="#">
              </div>
              <div class="row">
                <div class="col-xs-6" style="margin-left: 13px;">
                  <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="number"></div>
                </div>
                <div class="col-xs-6"> <button type="button" class="btn btn-primary shop-button">Add to Cart</button> <button type="button" class="btn btn-success shop-button">Buy Now</button>
                  <div class="product_fav"><i class="fas fa-heart"></i></div>
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