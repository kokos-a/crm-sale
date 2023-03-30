@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="main">
            <div class="col-12">
                <a type="button" class="btn btn-outline-primary my-8" href="{{ route('products.create') }}">Add Product</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Color_id</th>
                        <th>Detals</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->quantity}}</td>
                            <td>{{ $product->tipe}}</td>
                            <td>{{ $product->price}}</td>
                            <td>{{ $product->color_id}}</td>
                            <th><a href="{{ route('products.show', $product) }}"><button type="button" class="btn btn-secondary">Detals</button> </a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if (count($products) > 1)
                    {{ $products->links() }}
                @endif
                @if (count($products) < 1)
                    You have not a products!
                @endif
            </div>

        </div>
    </div>

@endsection
