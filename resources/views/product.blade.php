@extends('layouts.app')

@section('content')
	
	@section('right_content')
		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">
					@if(!is_null($selectedCategory))
						{{ $selectedCategory->name }} - {{ $selectedBrand->name }}
					@else 
						{{ $selectedBrand->name }}
					@endif 
				</h2>
				@foreach($products as $product)
				{!! Form::open(['method' => 'POST', 'route' => ['cart.store']]) !!}
				{!! Form::hidden('product_id', $product->id, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				{!! Form::hidden('quantity', 1, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
									
										<img src="{{ asset(json_decode($product->images)->normal) }}" alt="" />
										<h2>${{ $product->price }}</h2>
										<p>{{ $product->name }}</p>
										{!! Form::submit(trans('Add to cart'), ['class' => 'btn btn-default add-to-cart']) !!}
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>${{ $product->price }}</h2>
											<p>{{ $product->name }}</p>
											{!! Form::submit(trans('Add to cart'), ['class' => 'btn btn-default add-to-cart']) !!}
											<div class="view-details">
												<ul class="nav nav-pills nav-justified">
													<li><a href="/product-detail/{{$product->id}}">View Details</a></li>
												</ul>
											</div>
										</div>
									</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
				@endforeach
			</div><!--features_items-->
		</div>
	@endsection

@endsection