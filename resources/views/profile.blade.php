@extends('layout')

@section('content')
	<div class="jumbotron mt-3">
		<h1>Hi, {{Auth::user()->name}}!</h1>
	</div>
	<div class="card mb-3">
		<div class="card-header">User details</div>
		<div class="card-body">
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
				<button class="btn btn-primary" role="button"><i class="fas fa-edit"></i>&nbspChange Address</button>
			</form>
			<hr>
			@if($details != NULL)
				@if($details->isSeller != NULL || $details->isSeller == 1)
					<h3>You are a seller!</h3>
					<p>Being a seller you are able to create and modify your listings and sell your products to our ever growing group of customers!</p>
					<form method="GET" action="/sell-item">
						<input type="hidden" name="uid" value="{{ Auth::id() }}">
						<button class="btn btn-primary" role="button"><i class="far fa-money-bill-alt"></i>&nbspSell an item</button>
					</form>
				@else
					<h3>Become a seller!</h3>
					<p>Become a seller to be able to sell your products on our site!<br>
					By becoming a seller you will be able to create and modify your listings and sell your products to our ever growing group of customers!</p>
					<p class="text-danger">Be careful! You cannot revert your status to customer! The only way to achieve that is by sending an email to us!</p>
					<form method="GET" action="/become-seller">
						<button class="btn btn-primary" role="button">Become a seller!</button>
					</form>
				@endif
			@endif
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-header">Messages</div>
		<div class="card-body">
			@foreach($messages as $message)
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Message about item {{ $message->item_id }}</h5>
						<p class="card-text">{{ $message->message }}</p>
						<form method="GET" class="listing-control-form" action="/delete-message">
							<input type="hidden" name="id" value="{{ $message->id }}">
							<button class="btn btn-danger" role="button"><i class="fas fa-trash-alt"></i>&nbspDelete</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-header">Settings</div>
		<div class="card-body">
			<form method="GET" action="/save-settings">
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="darkModeCheck" name="darkModeCheck" {{ Session::get('darkMode') == 'on' ? 'checked' : ''}}>
					<label class="form-check-label" for="darkModeCheck">Enable dark mode</label>
					<small id="darkModeHelp" class="form-text text-muted">Switch to darker colors for easier reading in dark conditions</small>
				</div>
				<button class="btn btn-primary" role="button"><i class="far fa-save"></i>&nbspSave</button>
			</form>
		</div>
	</div>
	@if($details != NULL)
		@if($details->isSeller != NULL || $details->isSeller == 1)
			<div class="card mb-3">
				<div class="card-header">My Listings</div>
				<div class="card-body">
					<div class="vertical-scrollable-list">
						@foreach($myListings as $item)
						    <div class="card">
						      	<div class="card-body">
						        	<h5 class="card-title">{{ $item->name }}</h5>
						        	<p class="card-text">{{ $item->description }}</p>
						        	<form method="GET" class="listing-control-form" action="/edit-item">
						        		<input type="hidden" name="id" value="{{ $item->id }}">
						        		<button class="btn btn-primary" role="button"><i class="fas fa-edit"></i>&nbspEdit</button>
						        	</form>
						        	<form method="GET" class="listing-control-form" action="/remove-listing">
						        		<input type="hidden" name="id" value="{{ $item->id }}">
						        		<button class="btn btn-danger" role="button"><i class="fas fa-trash-alt"></i>&nbspDelete</button>
						        	</form>
						    	</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endif
	@endif
	<div class="card mb-3">
		<div class="card-header">Last Purchases</div>
		<div class="card-body">

		</dir>
	</div>
@endsection