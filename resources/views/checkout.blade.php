@extends('layout')

@section('content')
<div class="jumbotron">
	<h1>Checkout</h1>
</div>
<div class="checkout-wrapper">
	<div class="order-summary">
		<h2>Items</h2>
		<ul class="list-group">
		@foreach ($items as $item)
			@if($item->sale == 1)
				<li class="list-group-item d-flex justify-content-between align-items-center">{{ $item->name }}<span class="badge badge-success badge-pill">{{ $item->sale_price }} Ft | On sale <i class="fas fa-percent"></i></span></li>
			@else
				<li class="list-group-item d-flex justify-content-between align-items-center">{{ $item->name }}<span class="badge badge-primary badge-pill">{{ $item->price }} Ft</span></li>
			@endif
		@endforeach
		</ul>
		<hr>
		<h2 class="order-total">Total: {{ $total }} Ft</h2>
		<a href="/pay" class="btn btn-success btn-lg btn-block" role="button">Order</a>
	</div>
	<div class="separator"></div>
	<div class="order-details">
		<h2>Customer details</h2>
		<ul>
			<li>Name: {{Auth::user()->name}}</li>
			<li>Address: {{Auth::user()->name}}</li>
		</ul>
	</div>
</div>

@endsection