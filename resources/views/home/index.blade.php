@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="p-3 mb-2 bg-primary text-white">
	<h1>Welcome home!<br>{{$users->username}}</h1>

	<a href="{{route('logout.index')}}" class="btn btn-dark" style="float:right;"> logout</a>
	<a href="{{route('home.create')}}" class="btn btn-dark" style="float:right;">Create User</a> 
	

<form method="post" enctype="multipart/form-data" align="center">
	@csrf

	
	<table align="center">
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
		<tr><td><a href="{{route('home.edit',$users->c_id)}}" class="btn btn-dark">Edit</a></td></tr>
	</table>
</form>
</body>
</div>
</html>