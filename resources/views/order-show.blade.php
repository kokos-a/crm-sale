@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header">
                        <h3>Order #{{ $order->id }} from "{{ $order->client->organisation }}"</h3>

                        @if($order->updater)
                            {{ $order->updater->name }}
                        @endif </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $order->client->organisation }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $order->client->firstname }} {{ $order->client->lastname }}
                            +38({{ $order->client->tel }})</h6>
                        <dl class="row">
                            <dt class="col-sm-4">Name Order</dt>
                            <dd class="col-sm-8">{{ $order->title }}</dd>
                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">{{ $order->T }}</dd>

                        </dl>
                        <p class="card-text">{{ $order->about }}</p>
                        <p>
                            Created: {{ date_format(date_create($order->created_at), 'd.m.Y H:i:s') }} {{ $order->creater->name }}</p>
                    </div>
                    <div class="card-footer">
                        <a type="button" class="btn btn-outline-primary"
                           href="{{ route('clients.show', $order->client) }}">Client</a>
                        @if(Auth::user()->access_level > 0)
                            <a type="button" class="btn btn-outline-warning"
                               href="{{ route('orders.edit', $order->id) }}">Edit</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
