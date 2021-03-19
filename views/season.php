<?php
include '../action/ItemAction.php';
$seasonId = $_GET['season_id'];
$season = ["1"=>array("season"=>"spring"),"2"=>array("season"=>"summer"),"3"=>array("season"=>"autumn"),"4"=>array("season"=>"winter")];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AsaFarm</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- <script src="https://kit.fontawesome.com/f3d03e8132.js"></script> -->

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/season.css">


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>

</head>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="./shop.php">AsaFarm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
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
        <li class="nav-item">
          <a class="nav-link" href="./signIn.php">SignIn</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div>
  <section class="area <?php echo $season[$seasonId]["season"]?>">
    <h1 class="title"><?php echo $season[$seasonId]["season"] ?></h1>
  </section>
</div>


<!-- Page Content -->
<!-- <section> -->

<div class="container my-5">

  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <?php
        $row = $itemHandle->selectSeasonItems($seasonId);
        foreach ($row as $item) {
        ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="./detail.php?item_id=<?php echo $item['item_id'] ?>"><img class="card-img-top" src="../uploads/<?php echo $item['item_image'] ?>" alt="" height="200px" style="object-fit:cover"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="./detail.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['item_name'] ?></a>
                </h4>
                <h5>￥<?php echo number_format($item['item_price']) ?></h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- </section> -->
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
  </div>
  <!-- /.container -->
</footer>

</body>

</html>