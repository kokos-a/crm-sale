@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">
            <div class="col-12">
                <h3>@if ($edit == 1)
                        Edit
                    @else
                        Create
                    @endif order to: "{{ $order->client->organisation }}"</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="mt-2" method="POST"
                      action="@if($edit == 1){{ route('orders.update', $order) }}@else{{ route('clients.orders.store', $order->client) }}@endif">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="organisation" name="organisation" maxlength="128"
                               value="{{ $order->organisation }}">
                        <label for="organisation" class="form-label">Organisation</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="title" name="title" maxlength="128"
                               value="{{ $order->title }}">
                        <label for="title" class="form-label">Title order</label>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="about" name="about" rows="3">{{ $order->about }}</textarea>
                        <label for="about" class="form-label">Comment</label>
                    </div>
                    <div class="mb-3">
                        <select id="type" name="type" class="form-select" required>
                            <option value="0" @if ($order->type == 0) selected @endif>Status A</option>
                            <option value="1" @if ($order->type == 1) selected @endif>Status B</option>
                            <option value="2" @if ($order->type == 2) selected @endif>Status C</option>
                            <option value="3" @if ($order->type == 3) selected @endif>Status D</option>

                        </select>
                        <label for="type" class="form-label">Order status</label>
                    </div>

                    @if($edit == 1)
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
                @if($edit == 1)
                    <form class="mt-2" action="{{ route('bids.destroy', $order) }}" method="POST">@csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
