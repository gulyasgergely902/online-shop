@extends ('layout')

@section ('content')
<div class="carousel slide" id="carousel-148306">
	<ol class="carousel-indicators">
		<li data-slide-to="0" data-target="#carousel-148306" class="active">
		</li>
		<li data-slide-to="1" data-target="#carousel-148306">
		</li>
		<li data-slide-to="2" data-target="#carousel-148306">
		</li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" alt="Item" src="imgs/we-are-open.png" />
			<div class="carousel-caption">
				<h4>
					Opening Sale!
				</h4>
				<p>
					Everything is on sale from now until 03/31! Act quick to get the best deals!
				</p>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" alt="Item" src="imgs/garden.png" />
			<div class="carousel-caption">
				<h4>
					New Home & Garden category!
				</h4>
				<p>
					Furniture, statues, outdoor lights! Anything that your home or garden needs!
				</p>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" alt="Item" src="imgs/discount.png" />
			<div class="carousel-caption">
				<h4>
					Discounts!
				</h4>
				<p>
					Be prepared! <br>Our Health section has special discounts on hand sanitizers for the flu season!
				</p>
			</div>
		</div>
	</div> 
	<a class="carousel-control-prev" href="#carousel-148306" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carousel-148306" data-slide="next">
		<span class="carousel-control-next-icon"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
@endsection