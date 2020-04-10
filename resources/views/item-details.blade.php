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
        @if($item->type == 1)
        	<p class="card-text"><b class="text-danger">Auction over: {{ $item->endtime }}</b></p>
        @endif
        @if($item->sale == 1)
			<h5 class="item-old-price">{{ $item->price }}&nbspFt</h5>
			<h2 class="item-sale-price">{{ $item->sale_price }}&nbspFt</h2>
		@else
			<h2 class="item-normal-price">{{ $item->price }}&nbspFt</h2>
		@endif
		@php($date = \Carbon\Carbon::parse($item->endtime))
		@if($date->isPast())
			<a class="btn btn-light" role="button"><i class="fas fa-cart-plus"></i>&nbspAuction over</a>
		@else
			<a href="/add-to-cart/{{ $item->id }}" class="btn btn-primary" role="button"><i class="fas fa-cart-plus"></i>&nbspAdd to cart</a>
		@endif

		<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#messageModal"><i class="fas fa-comment"></i>&nbspMessage to seller</button>

		<!-- Message to seller modal -->
		<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="messageModalLabel">New message</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="/message/{{ $item->id }}" action="get">
						<div class="modal-body">
							<div class="form-group">
								<label for="message-text" class="col-form-label">Message:</label>
								<textarea class="form-control" id="message-text" name="message-text"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" role="button"><i class="fas fa-paper-plane"></i>&nbspSend message</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Message to seller modal end -->


		
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