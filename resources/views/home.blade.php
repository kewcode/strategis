@extends('layouts.app')

@section('content')


<h1 class="mt-4 text-center">
Kota Banjar
</h1>
<div style="width:100%;height:400px" id="map"></div>


<br>
<h2 class="mt-1 text-center">Tempat Paling Potensial</h2>
<br>
@include('admin.dataSampleSekolah')
@include('admin.dataSampleKantor')
@include('admin.dataSampleLainnya')


@endsection

@section('css-after')
    <link rel="stylesheet" href="/leaflet/leaflet.css">
@endsection
@section('js-after')
<script src="/leaflet/leaflet.js"></script>
<script src="/leaflet/cluster.js"></script>
<script>

$('select').select2({
    theme: 'bootstrap4',
});

var addressPoints = [];

$.get("/data_maps")
    .done((data) => {

        for(var i = 0; i < data.length ; i++){
            // console.log(data[i].lintang);
            addressPoints.push([data[i].lintang, data[i].bujur, data[i].nama]);
        }

        
        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Points &copy 2012 LINZ'
            }),
            latlng = L.latLng(-7.376072,108.5113967);

        var map = L.map('map', {center: latlng, zoom: 13, layers: [tiles]});

        var markers = L.markerClusterGroup();
        
        for (var i = 0; i < addressPoints.length; i++) {
            var a = addressPoints[i];
            var title = a[2];
            var marker = L.marker(
                new L.LatLng(a[0], a[1]), 
                { title: title }
                );
            marker.bindPopup(title);
            markers.addLayer(marker);
        }

        map.addLayer(markers);
    })
    </script>
@endsection