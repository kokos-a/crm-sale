@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">
            <div class="col-12">
                <h3>Product</h3>
                <div class="card my-4">
                    <div class="card-header">

                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Title</dt>
                                <dd class="col-sm-8">{{ $product->title }}</dd>
                                <dt class="col-sm-4">Quantity</dt>
                                <dd class="col-sm-8">{{ $product->T }}</dd>
                                <dt class="col-sm-4">Type</dt>
                                <dd class="col-sm-8">{{ $product->type }}</dd>
                                <dt class="col-sm-4">Price </dt>
                                <dd class="col-sm-8">{{ $product->price }}</dd>
                                <dt class="col-sm-4">color_id</dt>
                                <dd class="col-sm-8">{{ $product->color_id }}</dd>
                                <p>Create: {{ date_format(date_create($product->created_at), 'd.m.Y H:i:s') }} {{ $product->creater->name }}</p>
                              <p>Last edit {{ date_format(date_create($product->updated_at), 'd.m.Y H:i:s') }} @if($product->updater)
                                {{ $product->updater->name }}
                            @endif</p>
                        </dl>
                    </div>
                    <div class="card-footer">
                        @if(Auth::user()->access_level > 0)
                            <a type="button" class="btn btn-outline-warning"
                               href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endsection
