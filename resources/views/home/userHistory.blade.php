@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>History</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script type="text/javascript">
        function Ordersearch(){
          var value = document.getElementById('Ordersearch').value;
          var xhttp = new XMLHttpRequest();
          xhttp.open("GET", "http://localhost:3000/Ordersearch/"+value, true);
          xhttp.send();
            xhttp.onreadystatechange = function() {
              if (this.status==404) {
                document.getElementById('ok').innerHTML='<div class="mt-4"><h3><strong>No Data Found!</h3><strong></div>';
              }
              else
              {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById('ok').innerHTML = this.responseText;
                }
              }
            };
        }
    </script>
</head>
<body>
	<h2>Order Details</h2>
	<input type="text" class="form-controller" id="Ordersearch" name="Ordersearch" value="" onkeyup="Ordersearch()"  >
	<div name="ok" id="ok"></div>

	<form method="post" enctype="multipart/form-data" align="center" >
	@csrf

	<h5><table align="center" border="1" class="table table-dark" style="width: 30px;">
		<tr>
			<th>Order No</th>
			<th>Name</th>
			<th>Price</th>
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

			<td> {{ $order->grand_total }} </td>
		
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