@extends ('layout.base')
@section('title','OCPP')
@section('content')

<?php
	$countData = 0;
	$model = 0;

	foreach($data as $dt)
	{
		$model = $dt->model;
		$countData++;
	}
?>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light shadow fixed-sidebar" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <img src="image/chargers.png" alt="" style="width: 170px;">   
      </div>
      <div class="list-group list-group-flush">
        <a href="{{route('home')}}" class="d-flex align-items-center list-group-item list-group-item-action hover-bg-blue rounded">
          <svg class="mr-2" style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M7,17L10.2,10.2L17,7L13.8,13.8L7,17M12,11.1A0.9,0.9 0 0,0 11.1,12A0.9,0.9 0 0,0 12,12.9A0.9,0.9 0 0,0 12.9,12A0.9,0.9 0 0,0 12,11.1M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" />
          </svg>
          Dashboard
        </a>
        <a href="" class="d-flex align-items-center list-group-item list-group-item-action hover-bg-blue rounded">
          <svg class="mr-2" style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M6,16.5L3,19.44V11H6M11,14.66L9.43,13.32L8,14.64V7H11M16,13L13,16V3H16M18.81,12.81L17,11H22V16L20.21,14.21L13,21.36L9.53,18.34L5.75,22H3L9.47,15.66L13,18.64" />
          </svg>
          Data
        </a>
@if(session('name'))
        <a href="{{route('setting')}}" class="d-flex align-items-center list-group-item list-group-item-action hover-bg-blue rounded">
          <svg class="mr-2" style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M11.7 20H11.3L10.9 17.4C9.7 17.2 8.7 16.5 7.9 15.6L5.5 16.6L4.7 15.3L6.8 13.7C6.4 12.5 6.4 11.3 6.8 10.1L4.7 8.7L5.5 7.4L7.9 8.4C8.7 7.5 9.7 6.9 10.9 6.6L11.2 4H12.7L13.1 6.6C14.3 6.8 15.4 7.5 16.1 8.4L18.5 7.4L19.3 8.7L17.2 10.2C17.4 10.8 17.5 11.4 17.5 12H18C18.5 12 19 12.1 19.5 12.2V12L19.4 11L21.5 9.4C21.7 9.2 21.7 9 21.6 8.8L19.6 5.3C19.5 5 19.3 5 19 5L16.5 6C16 5.6 15.4 5.3 14.8 5L14.4 2.3C14.5 2.2 14.2 2 14 2H10C9.8 2 9.5 2.2 9.5 2.4L9.1 5.1C8.5 5.3 8 5.7 7.4 6L5 5C4.7 5 4.5 5 4.3 5.3L2.3 8.8C2.2 9 2.3 9.2 2.5 9.4L4.6 11L4.5 12L4.6 13L2.5 14.7C2.3 14.9 2.3 15.1 2.4 15.3L4.4 18.8C4.5 19 4.7 19 5 19L7.5 18C8 18.4 8.6 18.7 9.2 19L9.6 21.7C9.6 21.9 9.8 22.1 10.1 22.1H12.6C12.1 21.4 11.9 20.7 11.7 20M16 12.3V12C16 9.8 14.2 8 12 8S8 9.8 8 12C8 14.2 9.8 16 12 16C12.7 14.3 14.2 12.9 16 12.3M10 12C10 10.9 10.9 10 12 10S14 10.9 14 12 13.1 14 12 14 10 13.1 10 12M18 14.5V13L15.8 15.2L18 17.4V16C19.4 16 20.5 17.1 20.5 18.5C20.5 18.9 20.4 19.3 20.2 19.6L21.3 20.7C22.5 18.9 22 16.4 20.2 15.2C19.6 14.7 18.8 14.5 18 14.5M18 21C16.6 21 15.5 19.9 15.5 18.5C15.5 18.1 15.6 17.7 15.8 17.4L14.7 16.3C13.5 18.1 14 20.6 15.8 21.8C16.5 22.2 17.2 22.5 18 22.5V24L20.2 21.8L18 19.5V21Z" />
          </svg>
         Setting
        </a>
@endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('template.nav')

      <div class="container content">
        <h3 class="mt-2 mb-4 title">Dashboard</h3>

				<div class="row justify-content-around ">

					<div class="col-sm-4 margin-left mb-2">
						<div class="card border-left-one shadow " >
								<div class="card-body">
										<div class=" font-weight-bold text-primary text-uppercase mb-1">
												Amount ID
										</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">{{$countData}}</div>
								</div>
						</div>
					</div>
					<div class="col-sm-4 margin-left mb-2">
						<div class="card border-left-one shadow " >
								<div class="card-body">
										<div class=" font-weight-bold text-primary text-uppercase mb-1">
												Version ocpp
										</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">1.6</div>
								</div>
						</div>
					</div>
					<div class="col-sm-4 margin-left mb-2">
						<div class="card border-left-one shadow " >
								<div class="card-body">
										<div class=" font-weight-bold text-primary text-uppercase mb-1">
												Latest data
										</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">{{$model}}</div>
								</div>
						</div>
					</div>

				</div>
        
				
        <div class="container-content shadow mt-5">
          <div class="row justify-content-between ">
            <div class="ml-2 col-6 mb-4">
              <h4 class="font mb-1">Recent Data</h4 >
            </div>
          </div>
          <div class="row">
            <div class=" col-12 mb-4 table-overflow">
            	<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">ID</th>
										<th scope="col">Model</th>
										<th scope="col">vendor</th>
										<th scope="col">Series</th>
										<th scope="col">Firmware</th>
                    <th scope="col">status</th>
									</tr>
								</thead>
								<tbody>

								@foreach($data as $dt)
									<tr>
										<th scope="row">1</th>
										<td><a href="{{route('detail',$dt->idHW)}}">{{$dt->idHW}}</a></td>
										<td>{{$dt->model}}</td>
										<td>{{$dt->vendor}}</td>
										<td>{{$dt->series}}</td>
										<td>{{$dt->firmware}}</td>
                    <td>{{$status[$dt->idHW]}}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
            </div>
            <!-- <div class="col-sm-6 mb-4">
              <div>
                <canvas id="myChart" width="200" height="100"></canvas>
              </div>
            </div> -->
          </div>


          <!-- <canvas id="condition" width="400" height="100"></canvas> -->
        </div>
      </div>
      
      @include('template.footer')
    </div>
    <!-- /#page-content-wrapper -->
  </div>

  <script>
    var labels = [];
		var dataFW = [];
		
		let i =0;

		@foreach($data as $dt)
			labels.push(<?=json_encode($dt->idHW)?>)
			dataFW[i] = <?=json_encode($dt->firmware)?>;
			i = i+1;
		@endforeach

  const data = {
    labels: labels,
    datasets: [{
      label: 'firmware version',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: dataFW,
    }]
  };

  const config = {
    type: 'radar',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  </script>
  
@endsection