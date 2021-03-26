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

  <title>AsaFarm</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- <script src="https://kit.fontawesome.com/f3d03e8132.js"></script> -->
  <link rel="stylesheet" href="../css/font.css">

  <!-- Custom styles for this template -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>

  <style>
    body{
      /* background-color: #e5e2df; */
      background-color: rgba(229,226,223,.7);
    }
  </style>
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
            <a class="nav-link" href="./signInShop.php"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./signOut.php">SignOut</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
  <header class="section-heading" style="margin-top: 100px;">
    <h3 class="section-title display-4" style="color:rgba(0,0,0,.68)">管理者ページ</h3>
  </header>
  </div>
  <section class="section-content padding-y-sm" style="margin-top: 50px;">

    <div class="container">
      <article class="card card-body" style="border-radius: 20px;">
        <div class="row">
          <div class="col-md-4">
            <figure class="item-feature">
              <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
              <figcaption class="pt-3">
                <h5 class="title">高速配達</h5>
                <p>全国津々浦々配達いたします。 </p>
              </figcaption>
            </figure> <!-- iconbox // -->
          </div><!-- col // -->
          <div class="col-md-4">
            <figure class="item-feature">
              <span class="text-primary"><i class="fa fa-2x fa-landmark"></i></span>
              <figcaption class="pt-3">
                <h5 class="title">クリエイティブ戦略</h5>
                <p>農家さんが値段を決め販売可能
                </p>
              </figcaption>
            </figure> <!-- iconbox // -->
          </div><!-- col // -->
          <div class="col-md-4">
            <figure class="item-feature">
              <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
              <figcaption class="pt-3">
                <h5 class="title">安全性</h5>
                <p>あなたの安全を私たちに守ります。
                </p>
              </figcaption>
            </figure> <!-- iconbox // -->
          </div> <!-- col // -->
        </div>
      </article>

    </div> <!-- container .//  -->
  </section>

  <div class="container">
    <div class="card mx-auto my-5 border border-0" style="border-radius: 10px;">
      <div class="table-responsive" style="padding:20px 10px">
        <table class="table table-striped table-sm" style="border-radius: 30px;">
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
              <tr style="line-height: 5rem;">
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
      <!-- <a href="./register.php">Go Register</a> -->
    </div>
  </div>

  <footer class="section-footer border-top bg-dark">
    <div class="container">
      <section class="footer-top  padding-y mt-3">
        <div class="row text-white">
          <aside class="col-md col-6">
            <h6 class="title">Brands</h6>
            <ul class="list-unstyled">
            <li> <a href="#">Kirby</a></li>
              <li> <a href="#">Asa</a></li>
              <li> <a href="#">Nino</a></li>
              <li> <a href="#">Atu</a></li>
              <li> <a href="#">Tomo</a></li>
            </ul>
          </aside>
          <aside class="col-md col-6">
            <h6 class="title">Company</h6>
            <ul class="list-unstyled">
              <li> <a href="#">About us</a></li>
              <li> <a href="#">Career</a></li>
              <li> <a href="#">Find a store</a></li>
              <li> <a href="#">Rules and terms</a></li>
              <li> <a href="#">Sitemap</a></li>
            </ul>
          </aside>
          <aside class="col-md col-6">
            <h6 class="title">Help</h6>
            <ul class="list-unstyled">
              <li> <a href="#">Contact us</a></li>
              <li> <a href="#">Money refund</a></li>
              <li> <a href="#">Order status</a></li>
              <li> <a href="#">Shipping info</a></li>
              <li> <a href="#">Open dispute</a></li>
            </ul>
          </aside>
          <aside class="col-md col-6">
            <h6 class="title">Account</h6>
            <ul class="list-unstyled">
              <li> <a href="#"> User Login </a></li>
              <li> <a href="#"> User register </a></li>
              <li> <a href="#"> Account Setting </a></li>
              <li> <a href="#"> My Orders </a></li>
            </ul>
          </aside>
          <aside class="col-md">
            <h6 class="title">Social</h6>
            <ul class="list-unstyled">
              <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
              <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
              <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
              <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
            </ul>
          </aside>
        </div> <!-- row.// -->
      </section> <!-- footer-top.// -->

      <section class="footer-bottom row text-white">
        <div class="col-md-12">
          <p class="text-center"> © 2021 AsaFarm</p>
        </div>

      </section>
    </div><!-- //container -->
  </footer>




</body>