@extends('welcome')

<!DOCTYPE html>
<html>
<head>
	<title> User</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script type="text/javascript">
        function search(){
          var value = document.getElementById('search').value;
          var xhttp = new XMLHttpRequest();
          xhttp.open("GET", "http://localhost:3000/search/"+value, true);
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

	<div class="p-3 mb-2 bg-primary text-white">

	<h1>Menu</h1>
	<input type="text" class="form-controller" id="search" name="search" value="" onkeyup="search()"  >
	<div name="ok" id="ok"></div>
	<a href="{{route('home.index')}}">Back</a>
	<form method="get">		
		{{csrf_field()}}
		@foreach($foods as $food)
		<br>
		<fieldset>
		<table class="center">
			<legend ><h4>{{ $food->name }}</h4></legend>
    			<tr>
    				<th>ID</th>
    				<td>{{ $food->id }}</td>
				</tr>
				<tr>
    				<th>NAME</th>
    				<td>{{ $food->name }}</td>
				</tr>
				<tr>
          			<th>Price/item</th>
          			<td>{{ $food->price }}</td>
          			<!--<td><a href="/customer/comment/<%= userList[i].id %>">review</a></td>-->
				</tr>
				<tr>
    				<th>Status</th>
    				<td>{{ $food->status }}</td>
				</tr>
				<tr>
    				<th>Ingredients</th>
    				<td>{{ $food->ingredients }}</td>
    			</tr>
    			<tr>
    				<td><a href="{{route('cart.add', $food->id)}}" class="btn btn-dark">Add cart</a></td>
    			</tr>
    			<tr>
    				<td><a href="{{route('cart.comment', $food->id)}}" class="btn btn-dark">Comment</a></td>
    			</tr>
    			
		</table>
	</fieldset>
	@endforeach
	</form>
	</div>

	
</body>
</html>

