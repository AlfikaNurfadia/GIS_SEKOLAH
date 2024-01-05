@extends('layouts.frontend')

@section('content')
<div class="col sm-12">
    <table class="table table-bordered">
        <tr>
            <td>Nama Sekolah</td>
            <td>:</td>
            <td>{{ $sekolah->nama_sekolah}}</td>
        </tr>
        <tr>
            <td>NPSN</td>
            <td>:</td>
            <td>{{ $sekolah->npsn_sekolah}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ $sekolah->status}}</td>
        </tr>
        <tr>
            <td>Akreditasi</td>
            <td>:</td>
            <td>{{ $sekolah->akreditasi}}</td>
        </tr>
        <tr>
            <td>Visi</td>
            <td>:</td>
            <td>{{ $sekolah->visi}}</td>
        </tr>
        <tr>
            <td>Misi</td>
            <td>:</td>
            <td>{{ $sekolah->misi}}</td>
        </tr>
        <tr>
            <td>Rombongan Belajar</td>
            <td>:</td>
            <td>{{ $sekolah->rombel}} Rombel</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td>{{ $sekolah->jurusan}}</td>
        </tr>
        <tr>
            <td>Jarak</td>
        </tr>
    </table>
</div>

    <div id="map" style="width: 100%; height: 450px;"></div>

<div class="col sm-12">
    <table>

    </table>
</div>
<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script>
    var map = L.map('map').setView([{{$sekolah->posisi}}], 17);

    var tilelayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

    var marker = L.marker([<?= $sekolah->posisi ?>]).addTo(map);

    map.on('click', function (e) {
        console.log(e)
        var rumah = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

        L.Routing.control({
            waypoints : [
                L.latLng(e.latlng.lat, e.latlng.lng),
                L.latLng({{$sekolah->posisi}})
            ]
        }).addTo(map);
    });


</script>

@endsection