@extends('layouts.frontend')
@section('content')

<div id="map" style="width: 100%; height: 450px;"></div>


<script>

	var peta = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

	@foreach ($kecamatan as $data )
		var data{{ $data->id_kecamatan }} = L.layerGroup();
	@endforeach

    var map = L.map('map', {
		center: [-3.314364214631249, 114.59249471889544],
		zoom: 12.5,
		layers: [peta, 
		@foreach ($kecamatan as $data)
			data{{ $data->id_kecamatan }},
		@endforeach
	]
	});

	var baseMaps = {
		"Peta" : peta,
	};

	var overlayer = {
    @foreach ($kecamatan as $data)
    	"{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
    @endforeach
};

	L.control.layers(baseMaps, overlayer).addTo(map);

	@foreach ($kecamatan as $data)
		L.geoJSON(<?= $data->geojson ?>, {
			style : {
				color : "white",
				fillColor : "{{ $data->warna }}",
				fillOpacity : 0.7,
			}
		}).addTo(data{{ $data->id_kecamatan}});
	@endforeach


    

</script>
@endsection