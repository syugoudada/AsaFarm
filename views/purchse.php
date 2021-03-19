<?php
include '../action/ItemAction.php';
$row = $itemHandle->selectOrderItems($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="../css/purchase.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
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
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
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

  <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col-12">
        <div class="invoice-title">
          <h2>Invoice</h2>
          <h3 class="pull-right">Order # 12345</h3>
        </div>
        <hr>
        <div class="row">
          <div class="col-6">
            <address>
              <strong>Billed To:</strong><br>
              John Smith<br>
              1234 Main<br>
              Apt. 4B<br>
              Springfield, ST 54321
            </address>
          </div>
          <div class="col-6 text-right">
            <address>
              <strong>Shipped To:</strong><br>
              Jane Smith<br>
              1234 Main<br>
              Apt. 4B<br>
              Springfield, ST 54321
            </address>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <address>
              <strong>Payment Method:</strong><br>
              Visa ending **** 4242<br>
              jsmith@email.com
            </address>
          </div>
          <div class="col-6 text-right">
            <address>
              <strong>Order Date:</strong><br>
              March 7, 2014<br><br>
            </address>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Order summary</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                  <tr>
                    <td><strong>Item</strong></td>
                    <td class="text-center"><strong>Price</strong></td>
                    <td class="text-center"><strong>Quantity</strong></td>
                    <td class="text-right"><strong>Totals</strong></td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($row as $item) {
                  ?>
                    <tr>
                      <td><?php echo $item['item_name']; ?></td>
                      <td class="text-center"><?php echo  number_format($item['item_price']) ?>円</td>
                      <td class="text-center"><?php echo number_format($item['buy_quantity']); ?></td>
                      <td class="text-right"><?php echo number_format($item['item_price'] * $item['buy_quantity']); ?>円</td>
                    </tr>
                  <?php
                  }
                  ?>
                  <!-- <tr>
                    <td>BS-400</td>
                    <td class="text-center">$20.00</td>
                    <td class="text-center">3</td>
                    <td class="text-right">$60.00</td>
                  </tr>
                  <tr>
                    <td>BS-1000</td>
                    <td class="text-center">$600.00</td>
                    <td class="text-center">1</td>
                    <td class="text-right">$600.00</td>
                  </tr> -->
                  <tr>
                    <td class="thick-line"></td>
                    <td class="thick-line"></td>
                    <td class="thick-line text-center"><strong>小計</strong></td>
                    <td class="thick-line text-right"><?php echo number_format($_POST['total']); ?>円</td>
                  </tr>
                  <!-- <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>運送費</strong></td>
                    <td class="no-line text-right">$15</td>
                  </tr> -->
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right"><?php echo number_format($_POST['total']); ?>円</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>