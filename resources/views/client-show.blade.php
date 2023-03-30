@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">
            <div class="col-12">

                <div class="card my-4">
                    <div class="card-header">
                        <h3>Client</h3>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Organisation</dt>
                            <dd class="col-sm-8">{{ $client->organisation }}</dd>
                            <dt class="col-sm-4">First Name</dt>
                            <dd class="col-sm-8">{{ $client->firstname }}</dd>
                            <dt class="col-sm-4">Last Name</dt>
                            <dd class="col-sm-8">{{ $client->lastname }}</dd>
                            <dt class="col-sm-4">Adress</dt>
                            <dd class="col-sm-8">{{ $client->address }}</dd>
                            <dt class="col-sm-4">E-mail</dt>
                            <dd class="col-sm-8"><a target="_blank"
                                                    href="mailto:{{ $client->email }}">{{ $client->email }}</a></dd>
                            <dt class="col-sm-4">Phone</dt>
                            <dd class="col-sm-8"><a target="_blank"
                                                    href="tel:+{{ $client->email }}">+{{ $client->tel }}</a></dd>
                            <dt class="col-sm-4">Comment</dt>
                            <dd class="col-sm-8">{{ $client->comment }}</dd>
                            Create: {{ date_format(date_create($client->created_at), 'd.m.Y H:i:s') }} {{ $client->creater->name }}
                        </dl>
                    </div>
                    <div class="card-footer">
                        <a type="button" class="btn btn-outline-primary"
                           href="{{ route('clients.orders.index', $client->id) }}">Orders</a>
                        @if(Auth::user()->access_level > 0)
                            <a type="button" class="btn btn-outline-warning"
                               href="{{ route('clients.edit', $client->id) }}">Edit</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
