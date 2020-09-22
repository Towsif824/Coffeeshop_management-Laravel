<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{csrf_token()}}">
	<style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
	</style>
</head>
<body>
	<h3>M</h3>

	<div >
    <input type="search" name="search" id="search" class="form-control input-lg" placeholder="Enter Item Name" />
    <p id="output"></p>
   </div>

</body>
</html>

<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     $("search").keyup(function(e){
     	
        e.preventDefault();
     	var search_data = $('#search').val();
        //var info = $("#search").val();
        $.ajax({
           type:'POST',
           url:"{{route('search.search')}}",
           data:{search_data: search_data},
           success:function(data){
              $('#output').html($data);
           }
        });
</script