@extends('layouts.client')
@section('title', 'Client')
@section('content')
    <style>
        th {
            background-color: black;
            color: white;
            padding-left: 15px
        }
    </style>
    <div class="container mt-5">
        <center>
            <table width="700px" border="1">
                <tr>
                    <td rowspan="2">
                        <img src="{{ asset('uploads/users/' . $client->image) }}" alt="My Photo" width="100%">
                    </td>
                    <th width="500px" height="50px" style="">Informations
                    </th>
                </tr>
                <tr>
                    <td style="padding-left:15px;">
                        <ul style="list-style: none;">
                            <li>ID : {{ $client->id }}</li>
                            <li>Name : {{ $client->name }}</li>
                            <li>Phone Number : {{ $client->phone }}</li>
                            <li>Mail : {{ $client->email }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2" height="50px" style="">Location</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
                        <input type="hidden" class="form-control" placeholder="long" name="long" id="lng">
                        <div id="map" style="height:300px; width: 100%;" class="my-3"></div>
                    </td>
                </tr>
            </table>
        </center>
    </div>


    {{-- Get Long and lat from map --}}
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: {{ $client->lat }},
                    lng: {{ $client->long }}
                },
                zoom: 20,
                scrollwheel: true,
            });

            const uluru = {
                lat: {{ $client->lat }},
                lng: {{ $client->long }}
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#lat').val(lat)
                    $('#lng').val(lng)
                })

            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
@stop
