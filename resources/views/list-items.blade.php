@extends ('layout')

@section ('content')
<div class="jumbotron">
	<h1>Listing items</h1>
	<p>In: Home > {{ $category_data->name }}</p>
</div>
<div class="item-card-wrapper">
	@foreach ($items as $item)
		<div class="item-card">
			<div class="item-image" style="background: url(../{{ $item->image_link }}) no-repeat center center !important;">
			</div>
			<div class="item-details">
				<h2>{{ $item->name }}</h2>
				<p>{{ $item->description }}</p>
				<!-- @if($category_data->id == "discounted")
					<p>{{ $item->category_id }}</p>
				@endif -->
			</div>
			<div class="item-price">
				@if($item->sale == 1)
				<h5 class="item-old-price">{{ $item->price }}&nbspFt</h5>
				<h2 class="item-sale-price">{{ $item->sale_price }}&nbspFt</h2>
				@else
				<h2 class="item-normal-price">{{ $item->price }}&nbspFt</h2>
				@endif
			</div>
		</div>
	@endforeach
</div>
@endsection