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
	
	@include('template.sidebar')
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
						<h4 class="font mb-1">Station Change</h4 >
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
				</div>
			</div>
		</div>

	@include('template.footer')
	@include('template.modal')

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