@extends('layouts.frontend')
@section('content')

<div id="map" style="width: 100%; height: 450px;"></div>


<script>

	var peta = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});


    var map = L.map('map', {
		center: [-3.314364214631249, 114.59249471889544],
		zoom: 12.5,
		layers: [peta]
	});

	var baseMaps = {
		"Peta" : peta,
	};


	L.control.layers(baseMaps).addTo(map);

	@foreach ($kecamatan as $data)
		L.geoJSON(<?= $data->geojson ?>, {
			style : {
				color : "white",
				fillColor : "{{ $data->warna }}",
				fillOpacity : 0.7,
			}
		}).addTo(map);
	@endforeach
    
	@foreach ($sekolah as $data)
		L.marker([{{ $data->posisi }}]).addTo(map);
	@endforeach

</script>
@endsection