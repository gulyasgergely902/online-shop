@extends ('layout')

@section ('content')
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="/">Home</a></li>
    	<li class="breadcrumb-item" aria-current="page">{{ $category_data->name }}</li>
	</ol>
</nav>
<div class="item-card-wrapper">
	@foreach ($items as $item)
		<div class="card mb-3">
			@if($item->type == 1)
				@php($date = \Carbon\Carbon::parse($item->endtime))
				@if($date->isPast())
					<a class="text-decoration-none text-body" href="/item-details/{{ $item->id }}"><div class="card-header">{{ $item->name }} | <b class="text-danger">Auction ended: {{ $item->endtime }}</b></div></a>
				@else
					<a class="text-decoration-none text-body" href="/item-details/{{ $item->id }}"><div class="card-header">{{ $item->name }} | <b class="text-warning">Auction will end: {{ $item->endtime }}</b></div></a>
				@endif
			@else
				<a class="text-decoration-none text-body" href="/item-details/{{ $item->id }}"><div class="card-header">{{ $item->name }}</div></a>
			@endif
				@if($item->sale == 1 && $item->type == 1)
					<div class="card-body list-items-card auction-sale-effect">
				@elseif($item->sale == 1)
					<div class="card-body list-items-card sale-effect">
				@elseif($item->type == 1)
					<div class="card-body list-items-card auction-effect">
				@else
					<div class="card-body list-items-card">
				@endif
					<div class="item-image" style="background: url(../{{ $item->image_link }}) no-repeat center center !important;"></div>
					<div class="item-details">
						<p class="text-muted">{{ $item->description }}</p>
					</div>
					<div class="item-price text-right">
						@if($item->sale == 1)
							<h5 class="text-danger">{{ $item->price }}&nbspFt</h5>
							<h2 class="text-success">{{ $item->sale_price }}&nbspFt</h2>
						@else
							<h2>{{ $item->price }}&nbspFt</h2>
						@endif
					</div>
					<div class="item-buttons">
						@php($date = \Carbon\Carbon::parse($item->endtime))
						@if($date->isPast())
							<a class="btn btn-light" role="button"><i class="fas fa-cart-plus"></i>&nbspAuction over</a>
						@else
							<a href="/add-to-cart/{{ $item->id }}" class="btn btn-success" role="button"><i class="fas fa-cart-plus"></i>&nbspAdd to cart</a>
						@endif
					</div>
				</div>
		</div>
	@endforeach
</div>
@endsection