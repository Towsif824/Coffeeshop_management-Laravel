<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
</head>
<body>
	<h2>Cart</h2>

	
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>price</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($carts as $cart)
		<tr>
			<td>{{$cart->name}}</td>
			<td>
				{{Cart::get($cart->id)->getPriceSum()}}
			</td>
			<td>
				<form action="{{route('cart.update',$cart->id)}}">

					<input type="number" name="quantity" value="{{$cart->quantity}}">
					<input type="submit" value="Save">
				</form>	
			</td>
			<td>
				<a href="{{route('cart.destroy',$cart->id)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
	

</body>
</html>