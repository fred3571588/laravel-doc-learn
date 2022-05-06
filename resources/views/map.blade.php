@extends('layouts.app')

@section('content')
<div class="container">
    {{-- // Leaflet
    // A basic map is as easy as using the x blade component. --}}

    {{-- <x-maps-leaflet></x-maps-leaflet>

    // set the centerpoint of the map:
    <x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-leaflet>

    // set a zoomlevel:
    <x-maps-leaflet :zoomLevel="6"></x-maps-leaflet> --}}

    {{-- // Set markers on the map: --}}
    <x-maps-leaflet :markers="[['lat' =>
        23.973875, 'long' => 120.982024]]"></x-maps-leaflet>
</div>
@endsection
