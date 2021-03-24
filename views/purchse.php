<?php
session_start();
include '../action/ItemAction.php';

$row = $itemHandle->selectRecipteItems($_SESSION['user_id']);
$purchaseItemsArray = json_decode($row['purchase_items'],true);
$items = [];
$itemPurchaseQuantity = [];
foreach($purchaseItemsArray as $itemInfo){
  $items[] = $itemHandle->selectItem($itemInfo["item_id"]);
  $itemPurchaseQuantity[] = $itemInfo['buy_quantity'];
}
$today = date('y/m/d');

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
  <link rel="stylesheet" href="../css/font.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="../views/signInShop.php">AsaFarm</a>
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

  <div class="container main-container" style="margin-top:100px; margin-bottom: 30px; padding:30px;">
    <div class="row">
      <div class="col-12">
        <div class="invoice-title">
          <h2>請求書</h2>
          <h3 class="pull-right"></h3>
        </div>
        <hr>
        <div class="row">
          <div class="col-6">
            <address>
              <strong>請求先:</strong><br>
              <?php echo $_SESSION['username'];?>様<br>
              1234 Main<br>
              Apt. 4B<br>
              Springfield, ST 54321
            </address>
          </div>
          <div class="col-6 text-right">
            <address>
              <strong>注文日:</strong><br>
              <?php echo $today ?><br><br>
            </address>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <address>
              <strong>購入方法:</strong><br>
              Visa ending **** 4242<br>
            </address>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>購入詳細</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                  <tr>
                    <td><strong>商品名</strong></td>
                    <td class="text-center"><strong>価格</strong></td>
                    <td class="text-center"><strong>個数</strong></td>
                    <td class="text-right"><strong>合計</strong></td>
                  </tr>
                </thead>
                <tbody>
                  <?php      
                  $total = 0;
                  foreach ($items as $index => $item) {
                    $total += ($item['item_price'] * $itemPurchaseQuantity[$index]);
                  ?>
                    <tr>
                      <td><?php echo $item['item_name']; ?></td>
                      <td class="text-center"><?php echo  number_format($item['item_price']) ?>円</td>
                      <td class="text-center"><?php echo number_format($itemPurchaseQuantity[$index]); ?></td>
                      <td class="text-right"><?php echo number_format($item['item_price'] * $itemPurchaseQuantity[$index]); ?>円</td>
                    </tr>
                  <?php
                  }
                  ?>
                  
                  <tr>
                    <td class="thick-line"></td>
                    <td class="thick-line"></td>
                    <td class="thick-line text-center"><strong>小計</strong></td>
                    <td class="thick-line text-right"><?php echo number_format($total); ?>円</td>
                  </tr>
                 
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>合計</strong></td>
                    <td class="no-line text-right"><?php echo number_format($total); ?>円</td>
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