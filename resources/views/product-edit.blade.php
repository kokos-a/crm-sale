@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="main">
        <div class="col-12">
            <h3>@if ($edit == 1) Edit @else Create @endif Product </h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('products.update', $product) }}@else{{ route('products.store') }}@endif">@csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="title" name="title" maxlength="128" value="{{ $product->title }}">
                    <label for="title" class="form-label">Title</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="type" name="type" maxlength="128" value="{{ $product->type }}">
                    <label for="type" class="form-label">Type</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="price" name="price" maxlength="128"  value="{{ $product->price }}">
                    <label for="price" class="form-label">Price</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="color_id" name="color_id" maxlength="128"  value="{{ $product->color_id }}">
                    <label for="color_id" class="form-label">color_id</label>
                </div>
                <div class="mb-3">
                    <select id="quantity" name="quantity" class="form-select" required>
                        <option value="0" @if ($product->quantity == 0) selected @endif>Pieces</option>
                        <option value="1" @if ($product->quantity == 1) selected @endif>Kilogram</option>
                        <option value="2" @if ($product->quantity == 2) selected @endif>m3</option>
                    </select>
                    <label for="type" class="form-label">Quantity</label>
                </div>
                @if($edit == 1)<input type="hidden" name="_method" value="PATCH">@endif
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('products.destroy', $product) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
