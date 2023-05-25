<!DOCTYPE html>
<html>

<head>
    <title> @yield('title')</title>
    <link href="{{ asset('login/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('login/css/css1.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />



    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4c1cfd5d0e3b824bd345', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('client-admin');
        channel.bind('notification', function(data) {
            toastr.success(JSON.stringify(data).name + 'Has Order');
        });
    </script>

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

    @include('layouts.admin_navbar')

    <section class="container">
        @yield('content')
    </section>

    <div>
        @include('layouts.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4c1cfd5d0e3b824bd345', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('client-admin');
        channel.bind('notification', function(data) {
            Swal.fire({
                position: 'top-end',
                title: 'New Order',
                text: JSON.stringify(data['message']) + 'Order You',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        });
    </script>
</body>

</html>
