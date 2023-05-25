@extends('layouts.client')
@section('title', 'Home')
@section('content')
    <!--------------sec-1-------------->

    <section id="sec-1-home" style="background-image:url('{{ asset('images/h3.jpeg') }}');background-size:cover">
        <div id="rgba">
            <div class="cont fading">
                <h1> Welcome To </h1>
                <h1> HandyMan Service </h1>
            </div>
        </div>
    </section>

    <!----------------------sec-2-------------------->
    <section id="sec-2-home">
        <article>
            <h2>
                Why To Choose Us ?
            </h2>
            <p>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium, obcaecati fugit!
                <br>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res.
            </p>
            <ul>
                <li> Lorem ipsum dolor sit res iure laudantium,<br>
                    <p>loLorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium,
                        <br>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium,
                    </p>
                </li>

                <li> Lorem ipsum dolor sit res iure laudantium,<br>
                    <p>loLorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium,
                        <br>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium,
                    </p>
                </li>


                <li> Lorem ipsum dolor sit res iure laudantium,<br>
                    <p>loLorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium,
                        <br>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium,
                    </p>
                </li>
            </ul>


        </article>
        <img src="{{ asset('images/man.jpg') }}">




    </section>
    <!----------------------sec-3-------------------->

    <section id="sec-3-home">
        <article>
            <h2>Our Services</h2>
            <p>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res iure laudantium, obcaecati fugit!
                <br>Lorem ipsum dolor sit res iure laudantium,Lorem ipsum dolor sit res.
            </p>

        </article>

        <div class="container">

            <div class="row">
                <div class="col-md-4 my-2">
                    <div class="card custom-card">
                        <div class="card-cover"style="background-image:url('{{ asset('/images/kk.jpg') }}')">
                            <div class="circle-image" style="background-image:url('{{ asset('/images/hh.jpg') }}')">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobs[0]->name }}</h5>
                            <p class="card-text">
                                {{ $jobs[0]->description }}

                            </p>
                            @if (!Auth::guard('client')->check())
                                <a href="{{ route('login') }}">Search now </a>
                            @else
                                <a href="{{ route('client.admin.list', $jobs[0]->id) }}">Search now </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card custom-card">
                        <div class="card-cover"style="background-image:url('{{ asset('/images/iiio.jpg') }}')">
                            <div class="circle-image" style="background-image:url('{{ asset('/images/images.jpg') }}')">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobs[1]->name }}</h5>
                            <p class="card-text">
                                {{ $jobs[1]->description }}

                            </p>
                            @if (!Auth::guard('client')->check())
                                <a href="{{ route('login') }}">Search now </a>
                            @else
                                <a href="{{ route('client.admin.list', $jobs[1]->id) }}">Search now </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card custom-card">
                        <div class="card-cover"style="background-image:url('{{ asset('/images/yyy.jpg') }}')">
                            <div class="circle-image" style="background-image:url('{{ asset('/images/images.jpg') }}')">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobs[2]->name }}</h5>
                            <p class="card-text">
                                {{ $jobs[2]->description }}

                            </p>
                            @if (!Auth::guard('client')->check())
                                <a href="{{ route('login') }}">Search now </a>
                            @else
                                <a href="{{ route('client.admin.list', $jobs[2]->id) }}">Search now </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card custom-card">
                        <div class="card-cover"style="background-image:url('{{ asset('/images/dd.jpg') }}')">
                            <div class="circle-image" style="background-image:url('{{ asset('/images/Qqq.jpg') }}')">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobs[3]->name }}</h5>
                            <p class="card-text">
                                {{ $jobs[3]->description }}

                            </p>
                            @if (!Auth::guard('client')->check())
                                <a href="{{ route('login') }}">Search now </a>
                            @else
                                <a href="{{ route('client.admin.list', $jobs[3]->id) }}">Search now </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card custom-card">
                        <div class="card-cover"style="background-image:url('{{ asset('/images/kjbkj.jpg') }}')">
                            <div class="circle-image" style="background-image:url('{{ asset('/images/dohsdh.jpg') }}')">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobs[4]->name }}</h5>
                            <p class="card-text">
                                {{ $jobs[4]->description }}

                            </p>
                            @if (!Auth::guard('client')->check())
                                <a href="{{ route('login') }}">Search now </a>
                            @else
                                <a href="{{ route('client.admin.list', $jobs[4]->id) }}">Search now </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card custom-card">
                        <div class="card-cover"style="background-image:url('{{ asset('/images/build.jpg') }}')">
                            <div class="circle-image" style="background-image:url('{{ asset('/images/klkl.jpg') }}')">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobs[5]->name }}</h5>
                            <p class="card-text">
                                {{ $jobs[5]->description }}

                            </p>
                            @if (!Auth::guard('client')->check())
                                <a href="{{ route('login') }}">Search now </a>
                            @else
                                <a href="{{ route('client.admin.list', $jobs[5]->id) }}">Search now </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </section>
@endsection
