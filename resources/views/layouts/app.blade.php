@include('header')

    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($globalCategories as $category)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#{{$category->id}}">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												{{ $category->name }}
											</a>
										</h4>
									</div>
									<div id="{{$category->id}}" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												@foreach($category->brands as $brand)
													<li><a href="/products/category/{{$brand->pivot->id}}">{{ $brand->name }} </a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							@endforeach
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($globalBrands as $brand)
										<li><a href="/products/brand/{{$brand->id}}"> <span class="pull-right">({{ count($brand->products) }})</span>{{ $brand->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
                @yield('right_content')
				
			</div>
		</div>
	</section>

@include('footer')
