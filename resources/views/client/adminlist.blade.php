@extends('layouts.client')
@section('title', 'Admin List')

@section('content')
    <section>
        <div class="container">
            <table class="table table-dark mt-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Job</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>

                    @forelse ($admins as $admin)
                        @php
                            $birthdate = $admin->birth_date;
                            $birthdate = new Carbon\Carbon($birthdate);
                            $age = $birthdate->age;
                            
                            /**
                             * Get Country & City & Region from lat and long numbers
                             */
                            $apiKey = 'UZ9U7TZG0ADA9VGZTJMSZIYPBWZNVQ4Y';
                            $params['format'] = 'json';
                            $params['lat'] = $admin->lat;
                            $params['lng'] = $admin->long;
                            $query = '';
                            foreach ($params as $key => $value) {
                                $query .= '&' . $key . '=' . rawurlencode($value);
                            }
                            $result = file_get_contents('https://api.geodatasource.com/city?key=' . $apiKey . $query);
                            $location = json_decode($result);
                            
                        @endphp
                        <tr>
                            <td><img src="{{ asset('uploads/users/' . $admin->image) }}" style="width:50px" alt="">
                            </td>
                            <td scope="row">{{ $admin->name }}</td>
                            <td>{{ $age }}</td>
                            <td>{{ $location->country }} - {{ $location->city }} - {{ $location->region }}</td>
                            <td>{{ $admin->job->name }}</td>
                            <td><a style="cursor: pointer;"
                                    onclick="order({{ Auth::guard()->user()->id }},{{ $admin->id }})"
                                    id="signup">Order</a></td>
                            <td><a href="{{ route('special_admin', $admin->id) }}" id="signup">Location</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="font-weight:bolder;text-align:center;color:red">No Craftsmen Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $admins->links() }}

            {{-- <div class="row mt-5">
                @foreach ($admins as $admin)
                    @php
                        /**
                         * Get Country & City & Region from lat and long numbers
                         */
                        $apiKey = 'UZ9U7TZG0ADA9VGZTJMSZIYPBWZNVQ4Y';
                        $params['format'] = 'json';
                        $params['lat'] = $admin->lat;
                        $params['lng'] = $admin->long;
                        $query = '';
                        foreach ($params as $key => $value) {
                            $query .= '&' . $key . '=' . rawurlencode($value);
                        }
                        $result = file_get_contents('https://api.geodatasource.com/city?key=' . $apiKey . $query);
                        $location = json_decode($result);
                    @endphp


                    <div class="card col-md-4">
                        <img src="{{ asset('uploads/users/' . $admin->image) }}" alt="User image" class="card__image" />
                        <div class="card__text">
                            <h2>{{ $admin->name }}</h2>
                            <p>{{ $admin->job->name }}</p>
                        </div>
                        <ul class="card__info">
                            <li>
                                @php
                                    $birthdate = $admin->birth_date;
                                    $birthdate = new Carbon\Carbon($birthdate);
                                    $age = $birthdate->age;
                                @endphp
                                <span>Age</span>
                                <span class="card__info__stats">{{ $age }}</span>
                            </li>
                            <li>
                                <span>Address</span>
                                <span class="card__info__stats">{{ $location->country }} - {{ $location->city }} -
                                    {{ $location->region }}</span>
                            </li>
                            <li>
                                <span>Phone</span>
                                <span class="card__info__stats">{{ $admin->phone }}</span>
                            </li>

                        </ul>
                        <div class="card__action">
                            <a href="{{ route('special_admin', $admin->id) }}"
                                class="card__action__button card__action--follow" style="color:white">Read More</a>
                            <a class="card__action__button card__action--message" style="color:white">Order</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <center>
                {{ $admins->links() }}
            </center> --}}
        </div>

    </section>

    <script>
        function order(id, admin_id) {

            console.log(id);
            // id.preventDefault();
            $.ajax({
                url: "{{ route('admin.order.notify') }}",
                type: 'GET',
                data: {
                    clientID: id,
                    admin: admin_id
                },
                success: function() {
                    Swal.fire({
                        position: 'top-end',
                        title: 'Order Send Success',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                },
            })
        }
    </script>
@stop()
