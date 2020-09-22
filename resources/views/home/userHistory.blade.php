@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>History</title>
</head>
<body>
	<h2>Order Details</h2>
	<form method="post" enctype="multipart/form-data" align="center" >
	@csrf

	<h5><table align="center" border="1" class="table table-dark" style="width: 30px;">
		<tr>
			<th>Order No</th>
			<th>Name</th>
			<th>Shipping Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Phone</th>
			<th>Short Note</th>
		</tr>

		@foreach($data as $order)
		<tr>
			<td> {{ $order->order_number }} </td>
		
			<td> {{ $order->user }} </td>
		
			<td> {{ $order->shipping_name }} </td>
		
			<td> {{ $order->shipping_address }} </td>
		
			<td> {{ $order->shipping_city }} </td>
		
			<td> {{ $order->shipping_phone }} </td>
		
			<td> {{ $order->shipping_notes }} </td>
		</tr>
		@endforeach
	</table></h5>
	
</form>
</body>
</html>