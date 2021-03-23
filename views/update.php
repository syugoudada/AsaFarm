<?php
  include '../action/ItemAction.php';
  $itemId = $_GET['item_id'];
  $row = $itemHandle->selectItem($itemId); 
?>


<!DOCTYPE html>
<html>

<head>
  <title>Update</title>
  <!--Made with love by Mutiullah Samim -->

  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <!-- <link rel="stylesheet" type="text/css" href="../css/sign.css"> -->
  <link rel="stylesheet" type="text/css" href="../css/register.css">
  <link rel="stylesheet" href="../css/font.css">

</head>

<body>
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card" id="card">
        <div class="card-header">
          <h3>Update</h3>
        </div>
        <div class="card-body">
          <form action="../action/ItemAction.php" method="POST" enctype="multipart/form-data">
            <label for="item_name">Name</label>
            <div class="input-group form-group">
              <input type="text" name="item_name" class="form-control" value="<?php echo $row['item_name'] ?>" required>
            </div>

            <label for="item_stock">Price</label>
            <div class="input-group form-group">
              <input type="number" id="item_price" name="item_price" class="form-control" min="1" value="<?php echo $row['item_price'] ?>" required>
            </div>

            <label for="item_stock">Stock</label>
            <div class="input-group form-group">
              <input type="number" id="item_stock" name="item_stock" class="form-control" min="1" value="<?php echo $row['item_stocks']?>" required>
            </div>


            <div class="form-group">
              <label for="description">Product Description</label>
              <textarea class="form-control" id="description" name="description" rows="3"><?php echo $row['description'] ?></textarea>
            </div>

            <label for="season">Season</label>
            <div class="d-flex justify-content-between mt-3">
            <?php 
              $radioFlag = ["1"=>["1"=>"checked","2"=>"","3"=>"","4"=>""],
                            "2"=>["1"=>"","2"=>"checked","3"=>"","4"=>""],
                            "3"=>["1"=>"","2"=>"","3"=>"checked","4"=>""],
                            "4"=>["1"=>"","2"=>"","3"=>"","4"=>"checked"],
                            ]
            ?>
              <div class="custom-control custom-radio mr-2">
                <input type="radio" id="seasonRadio1" name="seasonRadio" class="custom-control-input" value="1" <?php echo $radioFlag[$row['category_id']]["1"]; ?> required>
                <label class="custom-control-label text-white" for="seasonRadio1">Spring</label>
              </div>

              <div class="custom-control custom-radio mr-2">
                <input type="radio" id="seasonRadio2" name="seasonRadio" class="custom-control-input" value="2" <?php echo $radioFlag[$row['category_id']]["2"]; ?>>
                <label class="custom-control-label text-white" for="seasonRadio2">Summer</label>
              </div>

              <div class="custom-control custom-radio mr-2">
                <input type="radio" id="seasonRadio3" name="seasonRadio" class="custom-control-input" value="3" <?php echo $radioFlag[$row['category_id']]["3"]; ?>>
                <label class="custom-control-label text-white" for="seasonRadio3">Autumn</label>
              </div>

              <div class="custom-control custom-radio mr-2">
                <input type="radio" id="seasonRadio4" name="seasonRadio" class="custom-control-input" value="4" <?php echo $radioFlag[$row['category_id']]["4"]; ?>>
                <label class="custom-control-label text-white" for="seasonRadio4">Winter</label>
              </div>
            </div>

            <label for="item_name" class="mt-4">Image</label>
            <div class="input-group form-group">
              <input type="hidden" name="now_item_image" class="form-control" value="<?php echo $row['item_image'] ?>">
            </div>
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="new_item_image" aria-describedby="inputGroupFileAddon01" value="<?php echo $row['item_image'] ?>">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
              <input type="hidden" name="item_id" value="<?php echo $itemId?>">
            </div>

            <script>
              bsCustomFileInput.init();
            </script>

            <div class="form-group flex-row">
              <input type="submit" value="Update" name="update" class="btn login_btn mt-3">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>