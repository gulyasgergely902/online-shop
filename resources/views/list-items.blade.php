<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Shop | Items</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- styles -->
        <link rel="stylesheet" type="text/css" href="../style.css">
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!-- custom script -->
    	<script src="../script.js"></script>
    </head>
    <body>
		<div class="spinner" id="spinner"></div>
		<!-- Bootstrap Grid -->
		<div class="container-fluid" id="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
							<span class="navbar-toggler-icon"></span>
						</button>
						<a class="navbar-brand" href="/">Online Shop</a>
						<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
							<ul class="navbar-nav">
								<li class="nav-item">
									 <a class="nav-link" href="#">Home</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown">Categories</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="/list-items/discounted">Discounted</a>
										<a class="dropdown-item" href="/list-items/lowest">All time lowest</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/list-items/clothing">Clothing</a>
										<a class="dropdown-item" href="/list-items/electronics">Electronics</a>
										<a class="dropdown-item" href="/list-items/home-garden">Home & Garden</a>
										<a class="dropdown-item" href="/list-items/pets">Pets</a>
										<a class="dropdown-item" href="/list-items/sports">Sports</a>
										<a class="dropdown-item" href="/list-items/health">Health</a>
										<a class="dropdown-item" href="/list-items/car-accessories">Car accessories</a>
										<a class="dropdown-item" href="/list-items/tools">Tools</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link disabled" href="/search">Search</a>
								</li>
							</ul>
							<ul class="navbar-nav ml-md-auto">
								<li class="nav-item">
									 <a class="nav-link" href="#">Login</a>
								</li>
							</ul>
						</div>
					</nav>
					<div class="jumbotron">
						<h1>Items</h1>
						<p>In: Home > {{ $category_data->name }}</p>
					</div>
					<div>
						@foreach ($items as $item)
							{{ $item->name }}
                        @endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- End of Bootstrap Grid -->

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
