@extends('welcome')
@section('nav-bar')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{route('home.index')}}" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="{{route('home.food')}}" class="nav-link">Menu</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Others</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="/download/{id}">Download Menu</a>
                <a class="dropdown-item" href="{{route('home.userHistory')}}">History</a>
              </div>
            </li>
            <li class="nav-item"><a href="{{route('logout.index')}}" class="nav-link">LogOut</a></li>
            <li class="nav-item cart"><a href="{{route('cart.index')}}" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{Cart::getContent()->count()}}</small></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
@endsection

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
	<br>
	<br>
	<br>

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

