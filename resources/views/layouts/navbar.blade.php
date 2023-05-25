<nav>
    <div class="cont">

        <h2 class="logoh2"><a href="{{ route('client.home') }}" style="text-decoration: none">Handy<span>Man</span></a>
        </h2>

        <div>

            <a href="{{ route('client.home') }}">Home</a>
            <a href="{{ route('client.orders') }}">Orders</a>
            <a href="{{ route('client.about') }}">About</a>
            <a href="{{ route('client.contactus') }}">Contact Us</a>
            @if (Auth::guard('client')->check())
                <a href="{{ route('client_logout') }}">Logout</a>
            @else
                <a href="{{ route('signup') }}">Register</a>
                <a href="{{ route('login') }}">Login</a>
            @endif

        </div>

    </div>

</nav>
