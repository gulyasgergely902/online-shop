@extends ('layout')

@section ('content')
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/">Home</a></li>
    	<li class="breadcrumb-item active" aria-current="page">{{ $category_data->name }}</li>
	</ol>
</nav>
<div class="item-card-wrapper">
	@foreach ($items as $item)
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
@endsection