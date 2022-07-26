@extends ('layout.base')
@section('title','OCPP')
@section('content')


<div class="d-flex" id="wrapper">
	
	@include('../template.sidebar')
	<!-- Page Content -->
	<div id="page-content-wrapper">
		@include('template.nav')

		<div class="container content">
			<h3 class="mt-2 mb-4 title">Users</h3>

			<div class="container-content shadow mt-5">
                <div class="row justify-content-between">
                    <div class=" col-8 mb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">UserName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">tlp.</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $users)
                                <tr>
                                    <th scope="col" style="color: #888;">{{$users['name']}}</th>
                                    <th scope="col" style="color: #888;">{{$users['email']}}</th>
                                    <th scope="col" style="color: #888;">{{$users['no']}}</th>
                                    <th scope="row" style="color: #888;"> <a href="{{route('userDetail',$users['name'])}}">detail</a></th>
                                </tr>
                                @endforeach		
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="">
                            <div class="card card-user">
                                <div class="card-body">
                                    <h5 class="card-title">Total ID</h5>
                                    <p class="card-text">{{$count}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>

	@include('template.footer')

	</div>
	<!-- /#page-content-wrapper -->
</div>
  
@endsection