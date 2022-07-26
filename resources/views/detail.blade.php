@extends ('layout.base')
@section('title','OCPP')
@section('content')

<div class="d-flex" id="wrapper">

	@include('template.sidebar')
    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('template.nav')

		<div class="container content">
			<h3 class="mt-2 mb-4 title">Detail</h3>

		
			<div class="container-content shadow mt-5">

				<div class="row">
					<div class=" col-6 mb-4 table-overflow">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Spesifikasi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="col" style="color: #888;">ID</th>
									<th scope="row" style="color: #888;">{{$dataSelection->idHW}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Model</th>
									<th scope="row" style="color: #888;">{{$dataSelection->model}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Vendor</th>
									<th scope="row" style="color: #888;">{{$dataSelection->vendor}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Model</th>
									<th scope="row" style="color: #888;">{{$dataSelection->idHW}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Series</th>
									<th scope="row" style="color: #888;">{{$dataSelection->series}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Firmware</th>
									<th scope="row" style="color: #888;">{{$dataSelection->firmware}}</th>
								</tr>
							</tbody>
						</table>
					</div>
					<div class=" col-6 mb-4 table-overflow">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Log</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row" style="color: #888;">Last Update</th>
									<th scope="row" style="color: #888;">{{date('F d, Y H:m:i', strtotime('+7 hour',strtotime($routine->updated_at)) )}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Longitude</th>
									<th scope="row" style="color: #888;">{{$settings->long}}</th>
								</tr>
								<tr>
									<th scope="row" style="color: #888;">Latitude</th>
									<th scope="row" style="color: #888;">{{$settings->lat}}</th>
								</tr>
							
							</tbody>
						</table>
					</div>
				</div>
			
			</div>
			<div class="container-content shadow mt-5 map">
				<div class="map_box_container">
					<div id="map"></div>
				</div>
			</div>
		</div>
      
	@include('template.footer')
	@include('template.modal')
    </div>
    <!-- /#page-content-wrapper -->
</div>

<script>
	var loc = [<?= json_encode($settings->long);?>,<?= json_encode($settings->lat);?>];
	console.log(loc);

	mapboxgl.accessToken = 'pk.eyJ1IjoiZGFudWFuZHJlYW4iLCJhIjoiY2tteHBhOTFyMHI0aTJwcXNpcTIwYjNleSJ9.oMR_l45ewZHKxkXUmEjDcg';
	const map = new mapboxgl.Map({
	container: 'map', // container ID
	style: 'mapbox://styles/mapbox/streets-v11', // style URL
	center: loc, // starting center in [lng, lat]
	zoom: 13, // starting zoom
	// projection: 'globe' // display map as a 3D globe
	});

	
	map.on("load", () => {
		map.addSource("mine", {
			type: "geojson",
			data: {
				type: "FeatureCollection",
				features: [
					{
						type: "Feature",
						geometry: {
							type: "Point",
							coordinates: loc
						}
					}
				]
			}
		});

		map.addLayer({
			id: "mylayer",
			source: "mine",
			type: "circle",
			paint: {
				// Make circles larger as the user zooms from z12 to z22.
				"circle-radius": 10,
				// Color circles by ethnicity, using a `match` expression.
				"circle-color": "red",
				"circle-stroke-color": "red",
				"circle-opacity": 0.5,
				"circle-stroke-opacity": 1,
				"circle-stroke-width": 5
			}
		});
	});
</script>

@endsection