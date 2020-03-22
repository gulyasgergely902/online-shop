@extends ('layout')

@section ('content')
<div class="jumbotron">
	<h1>Shopping cart</h1>
</div>
<div class="item-card-wrapper">
	@foreach ($items as $item)
		<div class="item-card">
			<div class="item-image" style="background: url(../{{ $item->image_link }}) no-repeat center center !important;">
			</div>
			<div class="item-details">
				<h2>{{ $item->name }}</h2>
				<p>{{ $item->description }}</p>
			</div>
			<div class="item-price">
				@if($item->sale == 1)
				<h5 class="item-old-price">{{ $item->price }}&nbspFt</h5>
				<h2 class="item-sale-price">{{ $item->sale_price }}&nbspFt</h2>
				@else
				<h2 class="item-normal-price">{{ $item->price }}&nbspFt</h2>
				@endif
			</div>
			<div class="item-buttons">
				<a href="/remove-from-cart/{{ $item->id }}" class="btn btn-danger" role="button"><i class="fas fa-trash-alt"></i>&nbspRemove</a>
			</div>
		</div>
	@endforeach
</div>
<div class="jumbotron">
	<a href="/checkout" class="btn btn-success btn-lg btn-block" role="button">Checkout</a>
</div>
@endsection