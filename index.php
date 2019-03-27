<?php

include "./stock/stock.php";

/*echo "<pre>\$_GET";
print_r($_GET);
echo "</pre>";*/

//prepare array for the chosen items by user
$selectedItems = [];

//check if $_GET array has any element!
 if (sizeof($_GET)>0) {
	 for($i = 0; $i < sizeof($hats); $i++){
		 if (isset($_GET["prod-id"]) && $_GET["prod-id"] === $hats[$i]["id"]) {
			 
			 array_push($selectedItems, $hats[$i]);
		 }
	 }
 }
 
//declare a variable that will store initial value for markup
$markup = NULL;

//check if the number of elements is greater than 0
if (sizeof($selectedItems) > 0) {
	/*echo"<pre>\$selectedItems";
	print_r($selectedItems);
	echo "</pre>";*/
	//create markup and populate the markup with data
	//loop through selectedItems
	for($a = 0; $a < sizeof($selectedItems); $a++) {
		$markup .= "<div class=\"col-sm-12 col-md-6 col-xl-3 hat\">
						<figure>
							<img src=\"{$selectedItems[$a]["thumbnail"]}\" alt=\"{$selectedItems[$a]["type"]}\"/>
							<figcaption>
								<ul>
									<li>{$selectedItems[$a]["type"]}</li>
									<li>{$selectedItems[$a]["price"]}</li>
								</ul>
							</figcaption>
						</figure>
					</div>";	
	} 
} else {
	//  do the same as in if-block, only difference is 
	// that you are going to loop through $products
	for($b = 0; $b < sizeof($hats); $b++) {
		$markup .="<div class=\"col-sm-12 col-md-6 col-xl-3 hat\">
						<figure>
							<img src=\"{$hats[$b]["thumbnail"]}\" alt=\"{$hats[$b]["type"]}\"/>
							<figcaption>
								<ul>
									<li>{$hats[$b]["type"]}</li>
									<li>{$hats[$b]["price"]}</li>
								</ul>
							</figcaption>
						</figure>
					</div>";
	}
}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Midterm</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<nav class="navbar navbar-expand-md navbar-light bg-light">
			  <a class="navbar-brand" href="#"><img class="brand-img" src="./img/nav-brand.png" alt="brand"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link active" href="./index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Select Hats</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="hats">
							<a class="dropdown-item" href="./index.php?prod-id=sh">Straw hats</a>
							<a class="dropdown-item" href="./index.php?prod-id=ca">Caps</a>
							<a class="dropdown-item" href="./index.php?prod-id=fh">Fedora hats</a>
						</div>
					</li>
				</ul>
			  </div>
			</nav>
		</header>

		<main>
			<div class="container-fluid">
				<div class="row masthead">
					<div class="col-sm-12 col-lg-4">
						<h1>Hats<br>For Women<br>Forever!</h1>
						<button class="shop">SHOP</button>
					</div>
					<div class="col-sm-12 col-lg-4">	
						<img class="masthead-image" src="./img/masthead.jpg" alt="masthead">
					</div>
					<div class="col-sm-12 col-lg-4">
						<p>In our store, you can find different kinds of hats include Beret, Straw Hat, Fascinator, Bucket Hat and Caps. There is always one for you.</p>
					</div>
				</div>
				<div class="row hats">
					<div class="col-sm-12">
						<h2>Hats</h2>
					</div>
					<?php
					if(isset($markup)){
					echo $markup;
					}
					?>
				</div>
			</div>	
		</main>

		<footer>
			<div class="container-fluid">
				<img class="footer-brand" src="img/brand.png" alt="footer-brand">
				<div class="row footer">
					<div class="col-sm-12 col-lg-4">
						<h3>Support & Info</h3>
						<ul>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Shipping&Returning</a></li>
							<li><a href="#">Privacy policy</a></li>
							<li><a href="#">Find a store</a></li>
						</ul>	
					</div>
					<div class="col-sm-12 col-lg-4 join">
						<h4>Join Us</h4>
						<p>Get $5 for your first purchase!</p>
						<button class="signup">Sign Up</button>
					</div>
					<div class="col-sm-12 col-lg-4 social-media">
						<h3>Social Media</h3>
						<ul>
							<li><a href="https://www.facebook.com">Facebook</a></li>
							<li><a href="https://twitter.com">Twitter</a></li>
							<li><a href="https://www.instagram.com">Instagram</a></li>
							<li><a href="https://www.youtube.com">Youtube</a></li>
						</ul>	
					</div>
				</div>
				<p>@ Y.C Hat 2018. All rights reserved.</p>
			</div>
		</footer>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>