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
	var sekolah = L.layerGroup();

    var map = L.map('map', {
		center: [-3.314364214631249, 114.59249471889544],
		zoom: 12.5,
		layers: [peta, 
		@foreach ($kecamatan as $data)
			data{{ $data->id_kecamatan }},
		@endforeach
		sekolah, 
	]
	});

	var baseMaps = {
		"Peta" : peta,
	};

	var overlayer = {
    @foreach ($kecamatan as $data)
    	"{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
    @endforeach
	"sekolah" : sekolah, 
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

	@foreach ($sekolah as $data)	
		// var iconsekolah = L.icon({
		// 	iconUrl: '{{ asset('icon') }}/{{ $data->icon }}',
		// 	iconSize: [38, 55],
		// });

		// L.marker([<?= $data->posisi ?>], {icon: iconsekolah}).addTo(map);

		var informasi = '<table style="border-collapse:collapse;border-spacing:0" class="tg"><tr><td colspan="2" style="text-align:center"><img src="{{ asset('icon') }}/{{ $data->icon }}" width="100px"></td></tr><tbody><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Nama </td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->nama_sekolah }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">NPSN</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->npsn_sekolah }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Status</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->status }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Akreditasi</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->akreditasi }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Alamat</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->alamat }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal" colspan="2" class="text-center"><a href="/detailsekolah/{{ $data->id_sekolah }}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';

		L.marker([<?= $data->posisi ?>])
		.addTo(sekolah)
		.bindPopup(informasi);
	@endforeach
    
	

</script>
@endsection