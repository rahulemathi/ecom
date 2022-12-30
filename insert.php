<?php
include("config.php");

$product = $_POST["product"];
$productimage = $_POST["productimage"];
$price = $_POST["price"];
$dprice = $_POST["dprice"];
$description = $_POST["description"];


$sql = "INSERT INTO products (image_url,product_name,price, discounted_price, description)
VALUES ('$productimage','$product','$price','$dprice','$description')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">

    <input type="text" placeholder="product" name="product">
    <input type="text" placeholder="productimage" name="productimage">
    <input type="text" placeholder="price" name="price">
    <input type="text" placeholder="discount price" name="dprice">
    <input type="text" placeholder="description" name="description">

    <input type="submit" name="submit" id="" value="submit">
    </form>
</body>
</html>