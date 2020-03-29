@extends ('layout')

@section ('content')
<form method="GET" action="/searchItem" class="mt-3">
	<div class="form-group">
		<label for="item-search-box">Search for an item...</label>
		<input type="text" class="form-control" id="item-search-box" aria-describedby="item-search-box-help" placeholder="Search for an item here (e.g. Motul)" name="item-name">
	</div>
	<button class="btn btn-primary" role="button"><i class="fas fa-search"></i>&nbspSearch item</button>
</form>
@if(null !== $found-items)
	<div class="item-card-wrapper">
		@foreach ($found-items as $item)
			@if($item->sale == 1)
				<div class="item-card sale-effect">
			@else
				<div class="item-card">
			@endif
					<div class="item-image" style="background: url(../{{ $item->image_link }}) no-repeat center center !important;">
					</div>
					<div class="item-details">
						<h2><a class="text-decoration-none text-body" href="/item-details/{{ $item->id }}">{{ $item->name }}</a></h2>
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
		@endforeach
	</div>
@endif

@endsection