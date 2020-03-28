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
<form method="GET" action="/create-listing">
  <input type="hidden" id="uid" name="uid" value="{{ $uid }}">
  <div class="form-group">
    <label for="itemName">Item Name</label>
    <input type="text" class="form-control" id="itemName" name="itemName" aria-describedby="itemName" placeholder="Enter the item's name">
    <small id="itemNameHelp" class="form-text text-muted">Type in the short name of your item</small>
  </div>

  <div class="form-group">
    <label for="itemDescription">Item Description</label>
    <textarea class="form-control" id="itemDescription" name="itemDescription" placeholder="Enter item's description"></textarea>
  </div>

  <div class="form-group">
    <label for="itemCategory">Category</label>
    <select id="itemCategory" name="itemCategory">
		@foreach($category_data as $category)
			<option value="{{ $category->id }}">{{ $category->name}}</option>
		@endforeach
	</select>
  </div>

  <div class="form-group">
    <label for="itemPrice">Item Price (Ft)</label>
    <input type="text" class="form-control" id="itemPrice" name="itemPrice" aria-describedby="itemPrice" placeholder="1599">
  </div>

  <div class="form-group">
    <input type="checkbox" id="isDiscounted" name="isDiscounted" aria-describedby="isDiscounted">
    <label for="isDiscounted">Discounted</label>
  </div>

  <div class="form-group">
    <label for="discountedPrice">Discounted Price (Ft)</label>
    <input type="text" class="form-control" id="discountedPrice" name="discountedPrice" aria-describedby="discountedPrice" placeholder="990">
  </div>

  <button type="submit" class="btn btn-primary">Create listing</button>
</form>
@endsection