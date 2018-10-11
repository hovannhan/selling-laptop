@extends('layouts.master')
@section('content')

    <div class="col-md-12  cart">
        <p class="gio-hang">Giỏ hàng <small>({{ Cart::count() }} sản phẩm)</small></p>
        <div class="col-md-8">
	        <table class="table table-hover">
	        	<thead>
	        		<tr>
	        			<th>image</th>
	        			<th>name product</th>
	        			<th>Quality</th>
	        			<th>Price</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		@foreach($carts as $item)
	        		<tr>
	        			<td>
	        				<?php $i=1 ?>
					  		@foreach($product->images as $image)
					  			@if($i==1)
					  				<div class="item active">
						      			<img src="{{asset('storage/'.$image->images_url)}}">
						    		</div>
						    	@else
						    		<div class="item">
					      				<img src="{{asset('storage/'.$image->images_url)}}">
					    			</div>
					  			@endif
					  			<?php $i++ ?>
					  		@endforeach
				  		</td>
	        			<td>{{ $item->name }}</td>
	        			<td>{{ $item->qty }}</td>
	        			<td>{{ $item->price }}</td>
	        		</tr>
	        		@endforeach
	        	</tbody>
	        </table>
	    </div>
	    <div class="col-md-4">
	     	<div class="row">
	     		<p>Tạm tính: {{ Cart::subtotal() }}</p>
	     		<p>Thành tiền: {{ Cart::tax() }}</p>
	     	</div>
	     	<div class="row"><a href="{{ route('Cartdestroy') }}">Hủy giỏ hàng</a></div>
	    </div>
    </div>

@endsection
