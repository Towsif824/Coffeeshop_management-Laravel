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
		</tr>
	</thead>
	<tbody>
		@foreach($carts as $cart)
		<tr>
			<td>{{$cart->name}}</td>
			<td>{{$cart->price}}</td>
			<td>{{$cart->quantity}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
	

</body>
</html>