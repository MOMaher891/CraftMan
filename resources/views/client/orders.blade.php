@extends('layouts.client')
@section('title', 'Orders')
@section('content')

    <div class="container">

        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Craftsmen</th>
                    <th>Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            @if ($order->complete == 0)
                                <span style="background: rgb(0, 135, 156);padding: 5px 10px;border-radius: 10px;">In
                                    Progress</span>
                            @elseif($order->complete == 1)
                                <span style="background: green;padding: 5px 10px;border-radius: 10px;">Complete</span>
                            @else
                                <span style="background: rgb(255, 0, 0);padding: 5px 10px;border-radius: 10px;">Reject</span>
                            @endif
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



@stop
