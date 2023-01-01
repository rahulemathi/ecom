<?php 
require_once("./config.php");
session_start();
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
    $username = $_POST["email"];
  $email = $_POST["email"];
  $password = $_POST["Password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' OR username ='$username'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if(($password = $row['password'])){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: products.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./includes/header.php"); ?>
<head>
   <style>
    .contact-form{
        padding: 100px 0 0 0;
    }
   </style>
</head>

<body>
    <?php include("./includes/navbar.php");?>
        <div class="container">
            <div class="seperator-head text-center">
                <h2 class="text-blue">Login</h2>
</div>
            <form action="" class="contact-form" method="POST">
                <h3 class="text-center text-blue my-2">Credientails</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control element-block" placeholder="Enter Your Email or Username"
                                name="email" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="password" class="form-control element-block" placeholder="Enter Your Password"
                                name="Password">
                        </div>
                    </div>
                    <div class="text-center col-xs-12 col-sm-12">
                        <button id="submit" type="submit" name="submit"
                            class="btn btn-theme btn-warning text-uppercase font-lato fw-bold text-blue">Login</button>
                        </br>
                        </br>
                        <small>Not Registered Yet ? <a href="./registration.php">Click Here</a></small>
                    </div>
            </form>
        </div>



    <?php include("./includes/footer.php") ?>
    <?php include("./includes/footerscripts.php") ?>


</body>

</html>