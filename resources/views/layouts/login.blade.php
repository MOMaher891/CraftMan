<!DOCTYPE html>
<html>

<head>
    <title> @yield('title')</title>
    <link href="{{ asset('login/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('login/css/css1.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
</head>

<body style="background-image:url('{{ asset('login/images/log.jpeg') }}')">
    @yield('content')
    {{-- @include('layouts.footer') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>

    {{-- Get Long and lat from map --}}
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 33.89362857288377,
                    lng: 35.47826286142629
                },
                zoom: 8,
                scrollwheel: true,
            });

            const uluru = {
                lat: 33.89362857288377,
                lng: 35.47826286142629
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
</body>

</html>
