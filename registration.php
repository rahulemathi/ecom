<?php
require_once("./config.php");
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["cpassword"];
  $users = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($users) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
        $encypassword = $confirmpassword;
      $query = "INSERT INTO users (username,email,password) VALUES('$username','$email','$encypassword')";
      mysqli_query($conn, $query);
      echo
      '<script>alert("Registered Successfully")</script>';
      header("location: login.php");
    }
    else{
      echo
      '<script> alert("Password Does Not Match"); </script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   <?php include("./includes/header.php"); ?>
   <style>
    .contact-form{
        padding: 100px 0 0 0;
    }
   </style>
</head>

<body>
   <?php include("./includes/navbar.php");?>
        <div class="container">
            <form action="" class="contact-form" method="POST">
                <h3 class="text-center text-blue my-2">Credientails</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control element-block" placeholder="Enter Your Username"
                                name="username" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="email" class="form-control element-block" placeholder="Enter Your Email"
                                name="email" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="password" id="password" class="form-control element-block"
                                placeholder="Type your password" name="password" required>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="password" id="cpassword" class="form-control elemnt-block"
                                placeholder="Retype your password" name="cpassword" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 text-center">
                        <button id="button" type="submit" value="submit" name="submit"
                            class="btn btn-theme btn-warning text-uppercase font-lato fw-bold text-blue">Register</button>
                        </br>
                        </br>
                        <small>Already Registered <a href="./login.php">Click Here</a></small>
                    </div>
            </form>
        </div>




    <?php include("./includes/footer.php") ?>
    <?php include("./includes/footerscripts.php") ?>
    <!-- <script>
    const password = document.getElementById("password");
    const cpassword = document.getElementById("cpassword");
    const submit = document.getElementById("button");
    const wrongPassword = document.getElementById("wrong-password");

    function check() {
        if (password.value === cpassword.value) {
            submit.removeAttribute("disabled");
            wrongPassword.style.display = "none";
        } else {
            wrongPassword.style.display = "block";
            submit.setAttribute("disabled", "true");
        }


    }
    </script> -->

</body>

</html>