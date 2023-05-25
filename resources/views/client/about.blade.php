@extends('layouts.client')

@section('title', 'About')

@section('content')

    <section id="sec-1-about" style="background-image:url({{ asset('images/about.jpg') }});background-size:cover">
        <div class="rgba">
            <div class="cont">
                <h1> About </h1>
                <h2> <a href="{{ route('client.home') }}">Home /</a> About </h2>
            </div>
        </div>
    </section>

    <!----------------------sec-2-------------------->
    <section id="sec-2-about">
        <div class="cont">
            <article>


                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui molestias illum non, aperiam modi ex error
                    quia itaque laboriosam harum dolore temporibus aut, neque sunt, architecto corrupti blanditiis ipsum
                    magni!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia autem soluta natus tempora sit
                    eligendi aut neque reprehenderit tenetur dolores. Eveniet totam quasi saepe qui. Vitae culpa repellendus
                    voluptatibus voluptates.
                </p>
                <h3> Our Mission</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui molestias illum non, aperiam modi ex error
                    quia itaque laboriosam harum dolore temporibus aut, neque sunt, architecto corrupti blanditiis ipsum
                    magni!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia autem soluta natus tempora sit
                    eligendi aut neque reprehenderit tenetur dolores. Eveniet totam quasi saepe qui. Vitae culpa repellendus
                    voluptatibus voluptates.
                </p>


                <ul>
                    <li> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</li>
                    <li> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</li>
                    <li> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</li>
                    <li> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</li>
                </ul>

                <br>

                <h3> Our vision</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum ipsum molestiae ratione eos voluptatem,
                    eligendi quo nulla, maxime qui ullam in? Ducimus beatae praesentium commodi soluta autem nam doloribus
                    omnis?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam, dolorum, ipsam ducimus veniam eligendi
                    sunt provident vero deleniti nam saepe iusto facilis? Inventore est ipsa praesentium. Nulla expedita
                    itaque accusamus.</p>

            </article>


            <article>
                <h3>Our team</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid laboriosam tempora ea et reiciendis
                    voluptatem maxime esse, dolore rerum fugiat asperiores eligendi sit dolorem sequi, tempore eos,
                    veritatis accusantium vitae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum iste sapiente a, expedita deleniti
                    placeat ipsam dignissimos incidunt perspiciatis autem adipisci corporis animi minus dolorum debitis ad
                    consequatur molestias. Tenetur?</p>
                <ul>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                    <li> Mehad Abdo Mohamed </li>
                </ul>

            </article>
        </div>


    </section>
@stop()
