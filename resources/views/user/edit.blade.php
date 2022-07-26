@extends ('layout.base')
@section('title','OCPP')
@section('content')


<div class="d-flex" id="wrapper">
	
	@include('../template.sidebar')
	<!-- Page Content -->
	<div id="page-content-wrapper">
		@include('template.nav')

		<div class="container content">
			<h3 class="mt-2 mb-4 title">Users Update</h3>
            
			<div class="container-content shadow mt-5">
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
                <form action="{{route('userUpdate',$Datauser->name)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input name="username" type="text" value="{{$Datauser->name}}" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input name="email" type="text" value="{{$user->email}}" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input name="telp" type="text" value="{{$Datauser->no}}" class="form-control" id="telp">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                    
			</div>

       
		</div>

	@include('template.footer')

	</div>
	<!-- /#page-content-wrapper -->
</div>
  
@endsection