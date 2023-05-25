@extends('layouts.admin')
@section('title', 'Orders')
@section('content')

    <div class="container">

        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a style="cursor:pointer;background-color:green;color:white;"
                                onclick="completeOrder({{ $order->id }})" id="signup">Accept</a>
                            <a id="signup" onclick="rejectOrder({{ $order->id }})"
                                style="background-color:red;color:white;cursor:pointer;">Reject</a>

                            <a id="signup" href="{{ route('admin.order.client', $order->client->id) }}"
                                disabled>Location</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row" colspan="5" class="text-danger">No Order Found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{ $orders->links() }}
    </div>


    <script>
        function completeOrder(id) {
            console.log(id);
            // id.preventDefault();
            $.ajax({
                url: "{{ route('admin.complete.order') }}",
                type: 'GET',
                data: {
                    order_id: id
                },
                success: function() {
                    Swal.fire({
                        position: 'top-end',
                        title: 'Complete Order',
                        text: 'Complete New Order',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                },
            })
        }

        function rejectOrder(id) {
            console.log(id);
            // id.preventDefault();
            $.ajax({
                url: "{{ route('admin.reject.order') }}",
                type: 'GET',
                data: {
                    order_id: id
                },
                success: function() {
                    Swal.fire({
                        position: 'top-end',
                        title: 'Reject Order',
                        text: 'Reject Order',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                },
            })
        }
    </script>
@stop
