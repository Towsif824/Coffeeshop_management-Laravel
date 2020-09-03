@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

	<h1>Welcome home!</h1>

	<a href="{{route('home.create')}}">Create User</a> |
	<a href="{{route('logout.index')}}">logout</a>

	<h2>user list</h2>
<form method="post">
	@csrf
	<table border="1">
		
			<tr>
				<td>Name</td>
				<td>{{$users->name}}</td>
			</tr>
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
				<td>Image</td>
				<td>{{$users->image}}</td>
			</tr>
			<tr>
				<td>Membership</td>
				<td>{{$users->membership}}</td>
			</tr>
		</tr>
		<tr><td><a href="{{route('home.edit',$users->c_id)}}">Edit</a></td></tr>

	</table>
</form>
</body>
</html>