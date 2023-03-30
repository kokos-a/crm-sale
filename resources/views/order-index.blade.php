@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">
            <div class="col-12">
                <h3>Orders @if($client)
                        {{ $client->title }}
                    @endif</h3>
                @if($client)
                    <a type="button" class="btn btn-outline-primary my-8"
                       href="{{ route('clients.orders.create', $client) }}">Add Order</a>
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Organisation</th>
                        <th>Name product</th>
                        <th>Status order</th>
                        <th>Detals</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $ord)
                        <tr>
                            <td>{{ $ord->id }}</td>
                            <td>{{ $ord->client_id }}</a></td>
                            <td>{{ $ord->title }}</td>
                            <td>{{ $ord->T }}</td>
                            <th><a href="{{ route('orders.show', $ord) }}"><button type="button" class="btn btn-secondary">Detals</button> </a> </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if (count($orders) > 1)
                    {{ $orders->links() }}
                @endif
                @if (count($orders) < 1)
                    No Orders.
                @endif
            </div>
        </div>
    </div>
@endsection
