@extends('layouts.frontend')
@section('content')

<div id="map" style="width: 100%; height: 450px;"></div>


<script>

    var map = L.map('map').setView([-3.314364214631249, 114.59249471889544], 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);


    

</script>
@endsection