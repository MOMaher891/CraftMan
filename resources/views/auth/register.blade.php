@extends('layouts.login')
@section('title', 'SignUp')
@section('content')
    <section id="sec-1-log" class="my-5">

        <div class="container w-50">
            <h2 class="py-2" style="text-align:center">Sign Up</h2>
            <form action="{{ route('create') }}" method="POST" class="w-100" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="input form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="input form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Choose Your Type</label>
                        <select name="role" id="myInput" onchange="Change()" class="form-control">
                            <option value="2">Client</option>
                            <option value="1">Craftsmen</option>
                        </select>
                        @error('role')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Choose Your Job</label>
                        <select name="job_id" id="job" class="form-control" disabled>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                            @endforeach
                        </select>
                        @error('job_id')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Birth-Date</label>
                        <input type="date" class="input form-control" name="birth_date" value="{{ old('birth_date') }}">
                        @error('birth_date')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="input form-control" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="group-form col-md-6">
                        <label for="" class="form-label">password</label>
                        <input type="password" class="input form-control" name="password" value="{{ old('password') }}">
                        @error('password')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="group-form col-md-6">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" class="input form-control" name="image" value="{{ old('image') }}">
                        @error('image')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="group-form col-md-6">
                        <label for="" class="form-label">password-confirm</label>
                        <input type="password" class="input form-control" name="password-confirm"
                            value="{{ old('password-confirm') }}">
                        @error('password-confirm')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Location Inputs --}}
                    <div class="group-form col-md-8">
                        <label for="" class="form-label">Choose Your Location</label>
                        <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
                        <input type="hidden" class="form-control" placeholder="long" name="long" id="lng">
                        <div id="map" style="height:250px; width: 600px;" class="my-3"></div>
                    </div>
                    {{-- Location Inputs --}}
                </div>

                <input type="submit" id="signup" value="SIGN UP">


                <a href="{{ route('login') }}" class="logi">Already a member? Log In</a> <br>


            </form>
        </div>
    </section>


    <script>
        function Change() {
            var inputValue = $('#myInput').val();

            // Make the AJAX request
            $.ajax({
                url: '/signup/getjobs',
                method: 'GET',
                data: {
                    input: inputValue
                },
                success: function(response) {
                    if ($('#job').prop('disabled')) {
                        $('#job').prop('disabled', false);
                    } else {
                        $('#job').prop('disabled', true)
                    }
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr);
                }
            });
        }
    </script>

@endsection
