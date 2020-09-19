<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Hello</h2>

	<h3>{{$foods->price}}</h3>
	<h3>{{$foods->id}}</h3>

	<form method="post" action="{{url('comment/'.$foods->id) }}" >
		{{csrf_field()}}
	<table>
		<tr>
			<td><input type="text" name="comment"></td>
			<td><button type="submit" class="btn btn-primary">Comment</button></td>
		</tr>
		@foreach($comment as $item)
			<tr><td>{{$item->comment}}</td></tr>
		@endforeach
	</table>
</form>
</body>
</html>
