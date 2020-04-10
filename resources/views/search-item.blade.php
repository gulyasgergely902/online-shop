@extends ('layout')

@section ('content')
<div class="item-card-wrapper">
	@if(count($items) > 0)
		@foreach ($items as $item)
			<div class="card mb-3">
			<a class="text-decoration-none text-body" href="/item-details/{{ $item->id }}"><div class="card-header">{{ $item->name }}</div></a>
			@if($item->sale == 1)
					<div class="card-body list-items-card sale-effect">
				@else
					<div class="card-body list-items-card">
				@endif
					<div class="item-image" style="background: url(../{{ $item->image_link }}) no-repeat center center !important;">
					</div>
					<div class="item-details">
						<p class="text-muted">{{ $item->description }}</p>
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
						<a href="/add-to-cart/{{ $item->id }}" class="btn btn-success" role="button"><i class="fas fa-cart-plus"></i>&nbspAdd to cart</a>
					</div>
				</div>
			</div>
		@endforeach
	@else
		<div class="jumbotron">
			<h1>Can't find that one :(</h1>
			<h3>Come back later, we might get that for you!</h3>
		</div>
	@endif
</div>
 
@endsection