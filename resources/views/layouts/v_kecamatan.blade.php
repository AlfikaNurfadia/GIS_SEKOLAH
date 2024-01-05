@extends('layouts.frontend')
@section('content')

<div id="map" style="width: 100%; height: 450px;"></div>

<div class="col-sm-12">
	<br>
	<br>
	<div class="text-center"><h2><b>Data Sekolah</b></h2></div>
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th style="text-align:center" width="10px">No</th>
				<th style="text-align:center">NPSN</th>
				<th style="text-align:center">Sekolah</th>
				<th style="text-align:center">Kategori</th>
				<th style="text-align:center">Status</th>
				<th style="text-align:center">Koordinat</th>
			</tr> 
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($sekolah as $data)
			<tr>
				<td style="text-align:center">{{ $no++ }}</td>
				<td>{{ $data->npsn_sekolah }}</td>
				<td>{{ $data->nama_sekolah }}</td>
				<td>{{ $data->nama_kategori }}</td>
				<td>{{ $data->status }}</td>
				<td>{{ $data->posisi }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


<script>

	var peta = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});


	var data{{ $kec->id_kecamatan }} = L.layerGroup();

	@foreach ($kategori as $data)
		var kategori{{ $data->id_kategori }} = L.layerGroup();
	@endforeach


    var map = L.map('map', {
		center: [-3.314364214631249, 114.59249471889544],
		zoom: 12.5,
		layers: [peta, data{{ $kec->id_kecamatan }},
		@foreach ($kategori as $data)
			kategori{{ $data->id_kategori }},
		@endforeach
		]
	});

	var baseMaps = {
		"Peta" : peta,
	};

	var overlayer = {
    	"{{ $kec->kecamatan }}" : data{{ $kec->id_kecamatan }},
		@foreach ($kategori as $data)
			"{{ $data->nama_kategori }}" : kategori{{ $data->id_kategori }},
		@endforeach
	};

	L.control.layers(baseMaps, overlayer).addTo(map);


	var kec = L.geoJSON(<?= $kec->geojson ?>, {
			style : {
				color : "white",
				fillColor : "{{ $kec->warna }}",
				fillOpacity : 0.7,
			}
		}).addTo(data{{ $kec->id_kecamatan }});


		map.fitBounds(kec.getBounds());

		@foreach ($sekolah as $data)	
		// var iconsekolah = L.icon({
		// 	iconUrl: '{{ asset('icon') }}/{{ $data->icon }}',
		// 	iconSize: [38, 55],
		// });

		// L.marker([<?= $data->posisi ?>], {icon: iconsekolah}).addTo(map);

		var informasi = '<table style="border-collapse:collapse;border-spacing:0" class="tg"><tr><td colspan="2" style="text-align:center"><img src="{{ asset('icon') }}/{{ $data->icon }}" width="100px"></td></tr><tbody><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Nama </td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->nama_sekolah }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">NPSN</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->npsn_sekolah }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Status</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->status }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Akreditasi</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal"></td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">Alamat</td><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal">{{ $data->alamat }}</td></tr><tr><td style="border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top;word-break:normal" colspan="2" class="text-center"><a href="/detailsekolah/{{ $data->id_sekolah }}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';

		L.marker([<?= $data->posisi ?>])
		.addTo(kategori{{ $data->id_kategori}})
		.bindPopup(informasi);
	@endforeach
</script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>

@endsection