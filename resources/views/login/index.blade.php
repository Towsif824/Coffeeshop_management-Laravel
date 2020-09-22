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
            <li class="nav-item active"><a href="{{('/')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{('login')}}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{('register')}}" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="room.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <li class="nav-item cart"><a href="{{route('cart.index')}}" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{Cart::getContent()->count()}}</small></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
@endsection

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<form method="post">
    @csrf
		<fieldset align="center">
			<legend>Login Page</legend>
		<table align="center">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>

				<td>     
        </td>
				<td><input type="submit" name="submit" value="Submit"></td>
         
        
			</tr>
      <tr><td><a href="login/facebook/callback" class="btn bg-dark">Facebook</td></tr>
		</table>
    <h4 style="color: red">@foreach($errors->all() as $err)
        {{$err}} <br>
        @endforeach
		</fieldset>
	</form>
</body>
</html>

