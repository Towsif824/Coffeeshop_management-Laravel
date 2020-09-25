@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
                <a class="dropdown-item" href="shop.html">Others</a>
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
<body>
	<br>
	<br>
	<br>
	<br>
	<h2>Comment Section</h2>

	<form method="post" action="{{url('comment/'.$foods->id) }}" >
		{{csrf_field()}}
	<table align="center" border="1" class="table table-dark" style="width: 30px;">
		<tr>
			<td><input type="text" name="comment"></td>
			<td><button type="submit" class="btn btn-primary">Comment</button><br>@error('comment')
                    <strong>{{ $message }}</strong>
            @enderror</td>
		</tr>
		@foreach($comment as $item)
			<tr><td colspan="">{{$item->customer_name}}</td><td> {{$item->comment}}</td></tr>
		@endforeach
	</table>
</form>
</body>
</html>
