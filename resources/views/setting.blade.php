@extends ('layout.base')
@section('title','OCPP')
@section('content')


<div class="d-flex" id="wrapper">

	@include('template.sidebar')
	
    <!-- Page Content -->
    <div id="page-content-wrapper">
      @include('template.nav')

		<div class="container content">
			<h3 class="mt-2 mb-4 title">Setting</h3>

			<div class="container-content shadow mt-5 map">
				<div class="map_box_container">
					<div id="map"></div>
				</div>
			</div>
			<div class="container-content shadow mt-5">

				<form action="{{route('setting-store')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="selection">ID</label>
						<select class="form-control" name="idHW" id="selection" required>
							@foreach($data as $dt)
							<option value="{{$dt->idHW}}">{{$dt->idHW}}</option>
							@endforeach
						</select>
						</div>
					<div class="form-group">
						<label for="long">Longitude</label>
						<input name="long" type="text" class="form-control" id="long" required>
					</div>
					<div class="form-group">
						<label for="lat">Latitude</label>
						<input name="lat" type="text" class="form-control" id="lat" required>
					</div>
					
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
      
      	@include('template.footer')
		@include('template.modal')
    </div>
    <!-- /#page-content-wrapper -->
</div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoianNjYXN0cm8iLCJhIjoiY2s2YzB6Z25kMDVhejNrbXNpcmtjNGtpbiJ9.28ynPf1Y5Q8EyB_moOHylw';
	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11',
		center: [106.816666, -6.200000],
		zoom: 14
	});


	map.on('style.load', function() {

		map.on('click', function(e) {
		var coordinates = e.lngLat;
		console.log(coordinates);
		document.getElementById("long").value = coordinates.lng;
		document.getElementById("lat").value = coordinates.lat;



		new mapboxgl.Popup()
			.setLngLat(coordinates)
			.setHTML('you clicked here: <br/>' + coordinates)
			.addTo(map);
		});
	});
</script>

@endsection