<nav>
    <div class="cont">

        <h2 class="logoh2"><a href="{{ route('admin.home') }}" style="text-decoration: none">Handy<span>Man</span></a>
        </h2>

        <div>

            <a href="{{ route('admin.home') }}">Home</a>
            <a href="{{ route('admin.orders') }}">Orders</a>

            @if (Auth::check())
                <a href="{{ route('admin_logout') }}">Logout</a>
            @endif

        </div>

    </div>

</nav>
