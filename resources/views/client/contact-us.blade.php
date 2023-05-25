@extends('layouts.client')

@section('title', 'Contact Us')

@section('content')
    <!--------------sec-1-------------->

    <section id="sec-1" style="background-image:url({{ asset('images/sec-1background.jpeg') }});background-size:cover">
        <div class="rgba">
            <div class="cont">
                <h1> Contact Us </h1>
                <h2> <a href="{{ route('client.home') }}">Home /</a> Contact Us </h2>
            </div>
        </div>
    </section>

    <!----------------------sec-2-------------------->


    <section id="sec-2-contact">
        <div class="cont">

            <artical>
                <h2>Ask How We Can Help You: </h2>
                <h3>
                    Customers are usually answered within 14 days .
                </h3>
                <br>

                <p>
                    Your participation in your suggestions and complaints helps to improve our company.<br>
                    <br>
                    Thank you for being a part of us.

                </p>
            </artical>

            <article>
                <h2 id="pleasenote"> Please note : all fields are required </h2>
                <form method="post">
                    <input type="text" name="Name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="number" name="number" placeholder="Your Number" required>
                    <textarea name="Message" placeholder="Complaints Or Suggestions" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </article>

        </div>
    </section>
@stop()
