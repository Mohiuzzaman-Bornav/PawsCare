adoption.php
<?php
session_start();
if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- //for-mobile-apps -->
<link href="css/bootstrap4/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap4/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
<!-- pignose css -->
<link href="css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all" />


<!-- //pignose css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery.easing.min.js"></script>
</head>
<body>


	<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home1.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    
    <a href="userprofile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php
   $dbUser = "root";
        $dbPass = "";
        $dbServer = "localhost";
        $dbDatabase = "paws_care";
        try{
              $conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUser, $dbPass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $uid="garbage";
              if(isset($_SESSION['acc_id'])) $uid=$_SESSION['acc_id'];
              //echo $uid;
              $query = "SELECT name FROM account_info WHERE acc_id=$uid";
              $stmt = $conn->query($query);
              $table = $stmt->fetchAll(PDO::FETCH_ASSOC); 

              if ($stmt->rowCount() > 0) {
                // output data of each row
                foreach($table as $row){
                    echo $row['name'];
                }
              }
              else {
                echo "0 results";
              }
        
        }
        catch(PDOEXCEPTION $ex){
          echo "ERROR I AM";
        }
      ?></a>

    <a href="foodandmed.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Food & Medicine</a>
    <a href="adoption.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Adoption</a>
    <a href="donation.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Donation</a>
    <a href="help.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Support</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>



<!-- product-nav -->

<div class="product-easy">
	<div class="container">
		
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Cat Food</span></li> 
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Dog Food</span></li> 
					<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Medicine</span></li> 
				</ul>				  	 
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<?php
						$query = "SELECT * FROM food where FOOD_TYPE='Cat'"  ;
					    $stmt = $conn->query($query);
					    $table = $stmt->fetchAll(PDO::FETCH_NUM); 

					    if ($stmt->rowCount() > 0) {
					      // output data of each row
					      foreach($table as $row){
						?>
					
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="SellFood/<?php echo $row[7] ?>" alt="" class="pro-image-front">
									<img src="SellFood/<?php echo $row[7] ?>" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												
												<a href="details.php?FOOD_ID =<?php echo $row[0] ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html"><?php echo $row[1] ?></a></h4>
									<div class="info-product-price">
										<span class="item_price">BDT <?php echo $row[8] ?></span>
										<!-- <del>$69.71</del> -->
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						<?php
							}
						}
						?>
						

					</div>


					<!-- -------------------------------------------------- DOG FOOD--------------------------- -->
					

					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
						<?php
						$query = "SELECT * FROM food where FOOD_TYPE='Dog'";
					    $stmt = $conn->query($query);
					    $table = $stmt->fetchAll(PDO::FETCH_NUM); 

					    if ($stmt->rowCount() > 0) {
					      // output data of each row
					      foreach($table as $row){
						?>
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="SellFood/<?php echo $row[7] ?>" alt="" class="pro-image-front">
									<img src="SellFood/<?php echo $row[7] ?>" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="details.php?FOOD_ID =<?php echo $row[0] ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html"><?php echo $row[1] ?></a></h4>
									<div class="info-product-price">
										<span class="item_price">BDT <?php echo $row[8] ?></span>
										<!-- <del>$69.71</del> -->
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
							<?php
							}
						}
						?>
				
					</div>


				<!-- -------------------------------------------------- MED--------------------------- -->

					


					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
						<?php
						$query = "SELECT * FROM medicine";
					    $stmt = $conn->query($query);
					    $table = $stmt->fetchAll(PDO::FETCH_NUM); 

					    if ($stmt->rowCount() > 0) {
					      // output data of each row
					      foreach($table as $row){
						?>
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="SellMed/<?php echo $row[6] ?>" alt="" class="pro-image-front">
									<img src="SellMed/<?php echo $row[6] ?>" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="details1.php?MEDICINE_ID =<?php echo $row[0] ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html"><?php echo $row[1] ?></a></h4>
									<div class="info-product-price">
										<span class="item_price">BDT <?php echo $row[7] ?></span>
										<!-- <del>$69.71</del> -->
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>

							<?php
							}
						}
						?>



					</div>	
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- //product-nav -->


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    
    <h1 class="w3-margin w3-xlarge">Get in Touch</h1>
    <h3 class="w3-margin w3-xlarge">Want to learn more about Paws Care or about what you can do to help?</h3>
    <h3 class="w3-margin w3-xlarge">Please contact us via the details below and we will endeavour to get back to you shortly.</h3>
    <i class="fa fa-at"> info_pawscare@gmail.com</i><br>
    <i class="fa fa-mobile"> +8801737373130</i><br>
    <i class="fa fa-location-arrow"> PAWS CARE, House no 420,Goran khilgaon, Dhaka</i>
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 
</footer>


</body>
</html>



