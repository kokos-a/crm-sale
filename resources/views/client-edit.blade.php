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
                    @endif Client </h3>
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
                      action="@if($edit == 1){{ route('clients.update', $client) }}@else{{ route('clients.store') }}@endif">@csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="organisation" name="organisation" maxlength="128"
                               value="{{ $client->organisation }}">
                        <label for="organisation" class="form-label">Organisation</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="firstname" name="firstname" maxlength="512"
                               value="{{ $client->firstname }}">
                        <label for="firstname" class="form-label">First Name</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" maxlength="128"
                               value="{{ $client->lastname }}">
                        <label for="lastname" class="form-label">Last Name</label>
                    </div>

                    <div class="mb-3">
                        <select id="type" name="type" class="form-select" required>
                            <option value="0" @if ($client->type == 0) selected @endif>Category A</option>
                            <option value="1" @if ($client->type == 1) selected @endif>Category B</option>
                            <option value="2" @if ($client->type == 2) selected @endif>Category C</option>
                        </select>
                        <label for="type" class="form-label">Client Category</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="address" name="address" maxlength="9"
                               value="{{ $client->address }}">
                        <label for="address" class="form-label">Address</label>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" maxlength="255"
                               value="{{ $client->email }}">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" id="tel" name="tel" maxlength="10"
                               value="{{ $client->tel }}">
                        <label for="tel" class="form-label">Phone</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="comment" name="comment" maxlength="255"
                               value="{{ $client->comment }}">
                        <label for="comment" class="form-label">Comment</label>
                    </div>
                    @if($edit == 1)
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                @if($edit == 1)
                    <form class="mt-2" action="{{ route('clients.destroy', $client) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
