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
  
	<link href="{{asset('style/css/style.css') }}" rel="stylesheet">
	<title>Document</title>
</head>
<body class="background-auth">

	<div class="center-auth mt-5 " >
		<div class="panel-auth shadow rounded">
			<div>
				<img class="center-image" src="/image/logo" alt="" style="width: 170px;">   
			</div>

			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if(Session::has('alert'))
				<div class="alert alert-danger">
					<div>{{Session::get('alert')}}</div>
				</div>
			@endif

			<form action="{{route('regis-store')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="username">User Name</label>
					<input name="username" type="texts" class="form-control" id="username" required>
				</div>
				<div class="form-group">
					<label for="emails">Email address</label>
					<input name="email" type="email" class="form-control" id="emails" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input name="password" type="password" class="form-control" id="password" required>
				</div>
				<div class="form-group">
					<label for="repassword">Re-Password</label>
					<input name="repassword" type="password" class="form-control" id="password" required>
				</div>
				<div class="form-group ">
					<a href="{{route('login')}}"> Login?</a>
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>