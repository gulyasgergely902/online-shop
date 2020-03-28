@extends('layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="GET" action="/edit-listing">
  <div class="form-group">
    <label for="itemName">Item Name</label>
    <input type="text" class="form-control" id="itemName" name="itemName" aria-describedby="itemName" value="{{ $item_data->name }}" placeholder="Enter the item's name">
    <small id="itemNameHelp" class="form-text text-muted">Type in the short name of your item</small>
  </div>

  <div class="form-group">
    <label for="itemDescription">Item Description</label>
    <textarea class="form-control" id="itemDescription" name="itemDescription" placeholder="Enter item's description">{{ $item_data->description }}</textarea>
  </div>

  <div class="form-group">
    <label for="itemCategory">Category</label>
    <select id="itemCategory" name="itemCategory" value="{{ $item_data->category_id }}">
		@foreach($category_data as $category)
			<option value="{{ $category->id }}">{{ $category->name}}</option>
		@endforeach
	</select>
  </div>

  <div class="form-group">
    <label for="itemPrice">Item Price (Ft)</label>
    <input type="text" class="form-control" id="itemPrice" name="itemPrice" value="{{ $item_data->price }}" aria-describedby="itemPrice">
  </div>

  <div class="form-group">
    @if ($item_data->sale == 1)
      <input type="checkbox" id="isDiscounted" name="isDiscounted" checked aria-describedby="isDiscounted">
    @else
      <input type="checkbox" id="isDiscounted" name="isDiscounted" aria-describedby="isDiscounted">
    @endif
    <label for="isDiscounted">Discounted</label>
  </div>

  <div class="form-group">
    <label for="discountedPrice">Discounted Price (Ft)</label>
    <input type="text" class="form-control" id="discountedPrice" name="discountedPrice" value="{{ $item_data->sale_price }}" aria-describedby="discountedPrice">
  </div>

  <input type="hidden" name="item-id" value="{{ $id }}">
  <button type="submit" class="btn btn-primary">Save listing</button>
</form>
@endsection