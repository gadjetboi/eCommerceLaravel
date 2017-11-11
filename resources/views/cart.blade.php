@extends('layouts.full-width')

@section('content')

    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@if(count($productsOnCart) > 0)
					<?php $position_id = 0; ?>
						@foreach($productsOnCart as $productOnCart)
							<tr>
								<td class="cart_product">
									<a href=""><img src="{{ asset(json_decode($productOnCart->images)->thumb) }}" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{ $productOnCart->name }}</a></h4>
									<p>Web ID: {{ $productOnCart->sku }}</p>
								</td>
								<td class="cart_price">
									<p>${{ $productOnCart->price }}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">${{ $productOnCart->price }}</p>
								</td>
								<td class="cart_delete">
								{!! Form::open(['method' => 'POST', 'route' => ['cart.destroy', $position_id]]) !!}
									{!! Form::hidden('position_id', $position_id, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
									{{ method_field('DELETE') }}
									{!! Form::submit(trans('Delete'), ['class' => 'cart_quantity_delete']) !!}
									{{--  <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>  --}}
								{!! Form::close() !!}
								</td>
							</tr>
							<?php $position_id++; ?>
						@endforeach
					@else
							<tr>
								<td class="cart_empty" colspan="6">Cart is empty</td>
							</tr>
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-6 col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>${{ $cartSubTotal }}</span></li>
							<li>Shipping Cost <span>@if($shippingFee == 0) Free @else ${{ $shippingFee }} @endif</span></li>
							<li>Total <span>${{ $totalPrice }}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="/checkout">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection