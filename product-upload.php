<?php session_start(); ?>
<?php 
require_once("./config.php");
if(!empty($_SESSION["id"])){
  $uid = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $uid");
  $rows = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .contact-form {
      padding: 100px 0 0 0;
    }
  </style>
</head>
<?php require_once("config.php"); ?>
<?php include("./includes/header.php"); ?>

<body>
  <?php include("./includes/navbar.php"); ?>
  <div class="container">
    <div class="row">
    <form class="contact-form" action="upload.php" method="POST" enctype="multipart/form-data">
      <h2 class="my-2">Upload your product</h2>
      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
        <input class="form-control element-block" type="text" placeholder="product name" name="product" required>
  </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
        <label>upload a image</label>
        <input class="form-control element-block" type="file" placeholder="upload" id="upload" name="upload" required>
  </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
        <input class="form-control element-block" type="text" placeholder="price" name="price" required>
  </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
        <input class="form-control element-block" type="text" placeholder="discount price" name="dprice" required>
  </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
        <input class="form-control element-block" type="text" placeholder="description" name="description" required>
  </div>
      </div>


      <div class="col-xs-12 col-sm-12 text-center">
        <button id="button" type="submit" value="submit" name="submit" class="btn btn-theme btn-warning text-uppercase font-lato fw-bold text-blue">submit</button>
    
      </div>

      <!-- <input type="text" placeholder="productimage" name="productimage"> -->
    </form>
    </div>
  </div>
  <?php include("./includes/footerscripts.php"); ?>
</body>

</html>