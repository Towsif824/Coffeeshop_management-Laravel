@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
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
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="{{route('home.userHistory')}}">History</a>
                <a class="dropdown-item" href="room.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
            <li class="nav-item"><a href="{{route('logout.index')}}" class="nav-link">LogOut</a></li>
            <li class="nav-item cart"><a href="{{route('cart.index')}}" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{Cart::getContent()->count()}}</small></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
@endsection

<body>
	
<br>
<br>
<br>
<div class="p-3 mb-2 bg-primary text-white">
	<h1>Welcome home! {{$users->username}}</h1>

<form method="post" enctype="multipart/form-data" align="center" >
	@csrf
	
	
	
	<table align="center">
		<tr><td colspan="2"><img src="{{asset('img/profile/'.$users->image) }}" style="width:300px; height:300px; float:top; border-radius:90%; margin-right:0px;"></td></tr>
		<tr>
			<td>Name</td>
			<td>{{$users->name}}</td></tr>
		<tr>
			<td>User Name</td>
			<td>{{$users->username}}</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>{{$users->password}}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{$users->phone}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$users->email}}</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>{{$users->address}}</td>
		</tr>	
		<tr>
			<td>Membership</td>
			<td>{{$users->membership}}</td>
		</tr>
		</tr>
		<tr><td colspan="2"><br><a href="{{route('home.edit',$users->c_id)}}" class="btn btn-dark">Edit</a></td></tr>
	</table>
</form>
</div>
</body>

</html>