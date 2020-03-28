@extends('layout')

@section('content')
	<div class="jumbotron">
		<h1>Hi, {{Auth::user()->name}}!</h1>
	</div>
	<div class="jumbotron">
		<h2>User details</h2>
		<ul>
			<li>Name: {{Auth::user()->name}}</li>
			@if($details != NULL)
				@if($details->address != NULL)
					<li>Address: {{ $details->address }}</li>
				@else
					<li>Address: not set</li>
				@endif

				@if($details->isSeller != NULL || $details->isSeller == 1)
					<li>User status: Seller</li>
				@else
					<li>User status: Customer</li>
				@endif
			@else
				<li>Address: not set</li>
			@endif
		</ul>
		<form method="GET" action="/change-address">
			<input type="text" name="new-address">
			<button class="btn btn-success" role="button">Change Address</button>
		</form>
		<hr>
		@if($details != NULL)
			@if($details->isSeller != NULL || $details->isSeller == 1)
				<h3>You are a seller!</h3>
				<p>Being a seller you are able to create and modify your listings and sell your products to our ever growing group of customers!</p>
				<form method="GET" action="/sell-item">
					<input type="hidden" name="uid" value="{{ Auth::id() }}">
					<button class="btn btn-success" role="button">Sell an item</button>
				</form>
			@else
				<h3>Become a seller!</h3>
				<p>Become a seller to be able to sell your products on our site!<br>
				By becoming a seller you will be able to create and modify your listings and sell your products to our ever growing group of customers!</p>
				<p class="text-danger">Be careful! You cannot revert your status to customer! The only way to achieve that is by sending an email to us!</p>
				<form method="GET" action="/become-seller">
					<button class="btn btn-success" role="button">Become a seller!</button>
				</form>
			@endif
		@endif
	</div>
	@if($details != NULL)
		@if($details->isSeller != NULL || $details->isSeller == 1)
			<div class="jumbotron">
				<h2>My listings</h2>
				<div class="vertical-scrollable-list">
					@foreach($myListings as $item)
					    <div class="card">
					      	<div class="card-body">
					        	<h5 class="card-title">{{ $item->name }}</h5>
					        	<p class="card-text">{{ $item->description }}</p>
					        	<form method="GET" class="listing-control-form" action="/edit-item">
					        		<input type="hidden" name="id" value="{{ $item->id }}">
					        		<button class="btn btn-success" role="button">Edit</button>
					        	</form>
					        	<form method="GET" class="listing-control-form" action="/remove-listing">
					        		<input type="hidden" name="id" value="{{ $item->id }}">
					        		<button class="btn btn-danger" role="button">Delete</button>
					        	</form>
					    	</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	@endif
	<div class="jumbotron">
		<h2>Last purchases</h2>
	</div>
@endsection