@extends ('layout')

@section ('content')
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb mt-3">
    	<li class="breadcrumb-item"><a href="/">Home</a></li>
    	<li class="breadcrumb-item active" aria-current="page">{{ $category_data->name }}</li>
    	<li class="breadcrumb-item" aria-current="page">{{ $item->name }}</li>
	</ol>
</nav>
<div class="card mb-3 mt-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../{{ $item->image_link }}" class="card-img" alt="Item Image">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $item->name }}</h5>
        <p class="card-text">{{ $item->description }}</p>
        @if($item->sale == 1)
			<h5 class="item-old-price">{{ $item->price }}&nbspFt</h5>
			<h2 class="item-sale-price">{{ $item->sale_price }}&nbspFt</h2>
		@else
			<h2 class="item-normal-price">{{ $item->price }}&nbspFt</h2>
		@endif
		<a href="/add-to-cart/{{ $item->id }}" class="btn btn-primary" role="button"><i class="fas fa-cart-plus"></i>&nbspAdd to cart</a>
      </div>
    </div>
  </div>
</div>
<div class="card-group">
	@foreach($relevant as $rel_item)
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><a class="text-decoration-none text-body" href="/item-details/{{ $rel_item->id }}">{{ $rel_item->name }}</a></h5>
				<p class="card-text">{{ $rel_item->description }}</p>
				@if($rel_item->sale == 1)
					<h5 class="item-old-price">{{ $rel_item->price }}&nbspFt</h5>
					<h2 class="item-sale-price">{{ $rel_item->sale_price }}&nbspFt</h2>
				@else
					<h2 class="item-normal-price">{{ $rel_item->price }}&nbspFt</h2>
				@endif
			</div>
			<div class="card-footer">
				
			</div>
		</div>
	@endforeach
</div>
@endsection