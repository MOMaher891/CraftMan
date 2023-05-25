<!DOCTYPE html>
<html>

<head>
    <title> @yield('title')</title>
    <link href="{{ asset('login/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('login/css/css1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('login/css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />

    <style>
        *:before,
        *:after {
            box-sizing: inherit;
        }

        :root {
            --small-green-circle: #78eea6;
            --main-accent-color: #9b45e4;
            --secondary-accent-color: #e13a9d;
        }

        a {
            background-color: transparent;
        }

        img {
            border-style: none;
        }

        nav {
            /* background-color: transparent */
        }

        button {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
            overflow: visible;
            -webkit-appearance: button;
        }

        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }

        body {
            margin: 0;
            /* background: #e6b2c6; */
            /* background: -webkit-linear-gradient(to right, #e6b2c6, #d6e5fa); */
            /* background: linear-gradient(to right, #9a9597, #d6e5fa); */
            font-family: "Lato", sans-serif;
            font-weight: normal;
            background-repeat: no-repeat;
        }

        .container {
            /* display: grid; */
            /* grid-template-columns: repeat(auto-fit, minmax(200px, auto)); */
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')


    <section>
        @yield('content')
    </section>


    <div>
        @include('layouts.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4c1cfd5d0e3b824bd345', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('admin-client');
        channel.bind('notification2', function(data) {
            Swal.fire({
                position: 'top-end',
                title: 'Check Orders',
                icon: 'warning',
                confirmButtonText: 'OK'
            })
        });
    </script>
</body>

</html>
