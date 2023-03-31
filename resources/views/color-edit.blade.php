@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="main">
        <div class="col-12">
            <h3>@if ($edit == 1) Edit @else Create @endif Color </h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('colors.update', $color) }}@else{{ route('colors.store') }}@endif">@csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="title" name="title" maxlength="128" placeholder="Example: #FBCEB1 / #256" value="{{ $color->title }}">
                    <label for="title" class="form-label">Title</label>
                </div>
                @if($edit == 1)
                    <input type="hidden" name="_method" value="PATCH">
                @endif
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('colors.destroy', $color) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
