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
                                <dd class="col-sm-8">{{ $color->title }}</dd>
                                <p>Create: {{ date_format(date_create($color->created_at), 'd.m.Y H:i:s') }} {{ $color->creater->name }}</p>
                                <p>Last edit {{ date_format(date_create($color->updated_at), 'd.m.Y H:i:s') }} @if($color->updater)
                                        {{ $color->updater->name }}
                                    @endif</p>
                            </dl>
                        </div>
                        <div class="card-footer">
                            @if(Auth::user()->access_level > 0)
                                <a type="button" class="btn btn-outline-warning"
                                   href="{{ route('colors.edit', $color->id) }}">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
@endsection
