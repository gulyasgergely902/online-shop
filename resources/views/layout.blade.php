<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Shop</title>

        <!-- Bootstrap -->
        @if(Session::get('darkMode') == 'on')
        	<link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css" crossorigin="anonymous">
        @else
        	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        @endif

        <!-- styles -->
        <link rel="stylesheet" type="text/css" href="../style.css">
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!-- custom script -->
    	<script src="../script.js"></script>

    	<!-- FontAwesome -->
    	<script src="https://kit.fontawesome.com/1eaaf45e00.js" crossorigin="anonymous"></script>
    </head>
    <body>
    	<div class="spinner-border" role="status" id="spinner-border"></div>
		<!-- Bootstrap Grid -->
		<div class="container-fluid" id="container-fluid">
			<div class="row">
				<div class="col-md-12">
					@if(Session::get('darkMode') == 'on')
			        	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
			        @else
			        	<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
			        @endif
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
							<span class="navbar-toggler-icon"></span>
						</button>
						<a class="navbar-brand" href="/">Online Shop</a>
						<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
							<ul class="navbar-nav">
								<li class="nav-item">
									 <a class="nav-link {{ Request::path() == '/' ? 'active text-primary' : ''}}" href="/">Home</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle {{ Request::is('list-items/*') ? 'active text-primary' : ''}}" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown">Categories</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="/list-items/discounted"><i class="fas fa-percent mr-2"></i>Discounted</a>
										<a class="dropdown-item" href="/list-items/auction"><i class="fas fa-user-tag mr-2"></i>Auction</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/list-items/clothing"><i class="fas fa-tshirt mr-2"></i>Clothing</a>
										<a class="dropdown-item" href="/list-items/electronics"><i class="fas fa-microchip mr-2"></i>Electronics</a>
										<a class="dropdown-item" href="/list-items/home-garden"><i class="fas fa-home mr-2"></i>Home & Garden</a>
										<a class="dropdown-item" href="/list-items/pets"><i class="fas fa-dog mr-2"></i>Pets</a>
										<a class="dropdown-item" href="/list-items/sports"><i class="fas fa-basketball-ball mr-2"></i>Sports</a>
										<a class="dropdown-item" href="/list-items/health"><i class="fas fa-first-aid mr-2"></i>Health</a>
										<a class="dropdown-item" href="/list-items/car-accessories"><i class="fas fa-car mr-2"></i>Car accessories</a>
										<a class="dropdown-item" href="/list-items/tools"><i class="fas fa-tools mr-2"></i>Tools</a>
									</div>
								</li>
							</ul>
							<form class="form-inline my-2 my-lg-0" method="GET" action="/search">
								<input class="form-control mr-sm-2 ml-1" type="search" placeholder="Search" aria-label="Search" name="item-name">
								<button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i>&nbspSearch</button>
							</form>
							<ul class="navbar-nav ml-md-auto">
								@if(session()->has('cart'))
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle {{ Request::path() == 'shopping-cart' ? 'active text-primary' : ''}}" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i>&nbspShopping Cart</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										@foreach(Session::get('cart') as $cartItem)
											<a class="dropdown-item" href="#">{{ $cartItem[1]->name }}</a>
										@endforeach
										<a class="dropdown-item" href="/shopping-cart">Show items</a>
									</div>
								</li>
								@endif
								@if(Auth::check())
									<li class="nav-item">
										<a class="nav-link {{ Request::path() == 'profile' ? 'active text-primary' : ''}}" href="/profile"><i class="fas fa-user"></i>&nbspProfile</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
									</li>
									<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
									   {{ csrf_field() }}
									</form>
									@else
									<li class="nav-item">
										<a class="nav-link {{ Request::path() == 'login' ? 'active text-primary' : ''}}" href="/login"><i class="fas fa-sign-in-alt"></i>&nbspLogin</a>
									</li>
									<li class="nav-item">
										<a class="nav-link {{ Request::path() == 'register' ? 'active text-primary' : ''}}" href="/register"><i class="fas fa-user-plus"></i>&nbspRegister</a>
									</li>	
									@endif
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			@if(session()->has('message'))
	            <div class="mt-3 alert {{session('alert') ?? 'alert-info'}}">
	                {{ session('message') }}
	            </div>
 			@endif

			<!-- Content -->
			@yield ('content')
			<!-- End of Content -->

		</div>

		<!-- End of Bootstrap Grid -->

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
