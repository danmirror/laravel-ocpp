<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  
	<link href="{{secure_asset('style/css/style.css') }}" rel="stylesheet" type="text/css" >
	<title>Document</title>
</head>
<body class="background-auth">

	<div class="center-auth mt-5 " >
		<div class="panel-auth shadow rounded">
			<div>
				<img class="center-image" src="/image/logo" alt="" style="width: 170px;">   
			</div>
			<form action="{{route('login-store')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="username">User Name</label>
					<input name="username" type="texts" class="form-control" id="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input name="password" type="password" class="form-control" id="password">
				</div>
				<div class="form-group ">
					<a href="{{route('registration')}}"> register?</a>
				</div>
				<div class="form-group form-check">
					<input name="checkbox" type="checkbox" class="form-check-input" id="rememberme">
					<label class="form-check-label" for="rememberme">Remember me</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>