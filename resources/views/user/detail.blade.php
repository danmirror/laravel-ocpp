@extends ('layout.base')
@section('title','OCPP')
@section('content')


<div class="d-flex" id="wrapper">
	
	@include('../template.sidebar')
	<!-- Page Content -->
	<div id="page-content-wrapper">
		@include('template.nav')

		<div class="container content">
			<h3 class="mt-2 mb-4 title">Users Detail</h3>

			<div class="container-content shadow mt-5">
                <div class="row justify-content-between">
                    <div class=" col-6 mb-4 ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Identity</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col" style="color: #888;">Name</th>
                                    <th scope="col" style="color: #888;">{{$user->name}}</th>
                                </tr>
                                <tr>
                                    <th scope="col" style="color: #888;">Email</th>
                                    <th scope="col" style="color: #888;">{{$user->email}}</th>
                                </tr>
                                <tr>
                                    <th scope="col" style="color: #888;">No</th>
                                    <th scope="row" style="color: #888;">{{$Datauser->no}}</th>
                                </tr>
                            </tbody>
                        </table>
@if(session('role') == "user")
                        <a href="{{route('userEdit', $user->name)}}" class="btn btn-info"> Edit </a>
@endif
                    </div>
                    <div class="col-6 mb-4 ">
                        <div class="text-center">
                            <img src="/image/user.png" alt="" style="width: 170px;">       
                        </div>
                    </div>
                </div>
				
			</div>

            <div class="container-content shadow mt-5">
                <div class="row justify-content-between">
                    <div class=" col-8 mb-4 ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Money</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col" style="color: #888;">Your monay</th>
                                    <th scope="col" style="color: #888;"> $0</th>
                                </tr>
                                <tr>
                                    <th scope="col" style="color: #888;">Status</th>
                                    <th scope="col" style="color: #888;">{{$Datauser->status}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4 mb-4 ">
                        <div class="text-center">
                            <img src="/image/money.png" alt="" style="width: 100px;">       
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