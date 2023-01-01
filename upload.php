<?php
include("config.php");
$target_dir = "assets/images/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["upload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  $product = $_POST["product"];
  $productimage = $target_file;
  $price = $_POST["price"];
  $dprice = $_POST["dprice"];
  $description = $_POST["description"];
  
  
  $sql = "INSERT INTO products (image_url,product_name,price, discounted_price, description)
  VALUES ('$productimage','$product','$price','$dprice','$description')";
  
  if (mysqli_query($conn, $sql)) {
    echo "data added to the database";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}


if (file_exists($target_file)) {
  echo "oops, image file already exists.";
  $uploadOk = 0;
}


if ($_FILES["upload"]["size"] > 10000000) {
  echo "oops, your image file is too large.";
  $uploadOk = 0;
}



if ($uploadOk == 0) {
  echo "oops, your image file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["upload"]["name"])). " has been uploaded.";
  } else {
    echo "oops, there was an error uploading your image file.";
  }
}


header("refresh:5; url=product-upload.php");
?>
