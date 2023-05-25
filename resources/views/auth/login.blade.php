@extends('layouts.login')
@section('title', 'Login')
@section('content')
    <section id="sec-1-log" style="background-image:url('{{ asset('login/images/log.jpeg') }}')">


        @if (Session::has('success'))
            <p style="color:green;font-weight:bolder;padding:50px" class="alert">{{ Session::get('success') }}</p>
        @endif
        <div class="cont">
            <h2>Welcome Back</h2>
            <form action="{{ route('check') }}" method="POST">
                @csrf
                <p>*E-mail</p>
                <input type="text" class="input" name="email">
                @error('email')
                    <p style="color:red">{{ $message }}</p>
                @enderror
                <p>*Password</p>
                <input type="password" class="input" name="password">
                @error('password')
                    <p style="color:red">{{ $message }}</p>
                @enderror
                @if (Session::has('authentication_failed'))
                    <p style="color:red">{{ Session::get('authentication_failed') }}</p>
                @endif
                <br> <br>
                <input type="checkbox">
                <span>Remember me</span>
                <br> <br>
                <input type="submit" id="signup" value="SIGN IN">
                <a href="{{ route('signup') }}" class="logi">Don't have an account?</a>

            </form>

        </div>
    </section>

    <script>
        setTimeout(() => {
            document.querySelector('.alert').style.display = 'none';
        }, 2000);
    </script>
@endsection
