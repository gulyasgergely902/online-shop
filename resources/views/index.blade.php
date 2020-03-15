<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Shop</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
		<!-- Bootstrap Grid -->

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
						 
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="navbar-toggler-icon"></span>
						</button> <a class="navbar-brand" href="#">Online Shop</a>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="navbar-nav">
								<li class="nav-item">
									 <a class="nav-link" href="#">Home</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Categories</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="#">Discounted</a>
										<a class="dropdown-item" href="#">All time lowest</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Clothing</a>
										<a class="dropdown-item" href="#">Electronics</a>
										<a class="dropdown-item" href="#">Jewelry</a>
										<a class="dropdown-item" href="#">Home & Garden</a>
										<a class="dropdown-item" href="#">Pets</a>
										<a class="dropdown-item" href="#">Sports</a>
										<a class="dropdown-item" href="#">Health</a>
										<a class="dropdown-item" href="#">Car accessories</a>
										<a class="dropdown-item" href="#">Tools</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Search</a>
								</li>
							</ul>
							<ul class="navbar-nav ml-md-auto">
								<li class="nav-item active">
									 <a class="nav-link" href="#">Login</a>
								</li>
							</ul>
						</div>
					</nav>
					<div class="jumbotron">
						<h2>
							Welcome to Online Shop!
						</h2>
						<p>
							Browse through our growing catalog of wares!
						</p>
						<p>
							<a class="btn btn-primary btn-large" href="#">Start shopping</a>
						</p>
					</div>
				</div>
			</div>
			<div class="carousel slide" id="carousel-148306">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-148306" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-148306">
					</li>
					<li data-slide-to="2" data-target="#carousel-148306">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" alt="Item" src="imgs/we-are-open.png" />
						<div class="carousel-caption">
							<h4>
								Opening Sale!
							</h4>
							<p>
								Everything is on sale from now until 03/31! Act quick to get the best deals!
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Item" src="imgs/garden.png" />
						<div class="carousel-caption">
							<h4>
								New Home & Garden category!
							</h4>
							<p>
								Furniture, statues, outdoor lights! Anything that your home or garden needs!
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Item" src="imgs/discount.png" />
						<div class="carousel-caption">
							<h4>
								Discounts!
							</h4>
							<p>
								Be prepared! <br>Our Health section has special discounts on hand sanitizers for the flu season!
							</p>
						</div>
					</div>
				</div> 
				<a class="carousel-control-prev" href="#carousel-148306" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-148306" data-slide="next">
					<span class="carousel-control-next-icon"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<!-- End of Bootstrap Grid -->

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
