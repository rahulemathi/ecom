<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("config.php");?>
 <?php include("./includes/header.php"); ?>


 <?php 
 $id = $_GET['id'];

 $sql = "SELECT * FROM products WHERE id='$id' ";
 if($result = mysqli_query($conn,$sql)){
  if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($result);
      $image = $row['image_url'];
      $product = $row['product_name'];
      $price = $row['price'];
      $dprice = $row['discounted_price'];
      $description= $row['description'];
      mysqli_free_result($result);
  }else{
    echo "unable to fetch results";
  }
}else{
  echo "fail";
}
 ?>
  <body>

    <?php include("./includes/navbar.php");?>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>Product Details</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div>
              <img src="<?php echo $image;?>" alt="" class="img-fluid wc-image">
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 col-xs-6">
                <div>
                  <img src="assets/images/product-1-370x270.jpg" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
                  <img src="assets/images/product-2-370x270.jpg" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
                  <img src="assets/images/product-3-370x270.jpg" alt="" class="img-fluid">
                </div>
                <br>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-xs-12">
            <form action="#" method="post" class="form">
              <h2><?php echo $product;?></h2>

              <br>

              <p class="lead">
                <small><del> $<?php echo $price;?></del></small><strong class="text-primary">$<?php echo $dprice;?></strong>
              </p>

              <br>

              <p class="lead">
               <?php echo $description;?>
              </p>

              <br> 

              <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">Extra 1</label>
                  <div class="form-group">
                    <select class="form-control">
                      <option value="0">18 gears</option>
                      <option value="1">21 gears</option>
                      <option value="2">27 gears</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-8">
                  <label class="control-label">Quantity</label>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="1">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Similar Products</h2>
              <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/product-1-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>Omega bicycle</h4></a>
                <h6><small><del>$999.00 </del></small> $779.00</h6>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/product-2-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>Nike Revolution 5 Shoes</h4></a>
                <h6><small><del>$99.00</del></small>  $79.00</h6>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/product-3-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>Treadmill Orion Sprint</h4></a>
                <h6><small><del>$1999.00</del></small>   $1779.00</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>

<?php include("./includes/footerscripts.php");?>
    
  </body>

</html>
