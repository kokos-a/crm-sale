@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="main">
            <div class="col-12">
                <a type="button" class="btn btn-outline-primary my-8" href="{{ route('colors.create') }}">Add Color</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->title }}</td>
                            <td><div style="width: 30px; height: 20px; background: {{ $color->title }}"></div></td>
                            <th><a href="{{ route('colors.show', $color) }}"><button type="button" class="btn btn-secondary">Detals</button> </a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if (count($colors) > 1)
                    {{ $colors->links() }}
                @endif
                @if (count($colors) < 1)
                    You have not any colors!
                @endif
            </div>

        </div>
    </div>

@endsection
