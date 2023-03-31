@extends('layouts.appcrm')
@extends('layouts.app')

@section('content')

        <main class="py-4">
            <div class="main">
                   <a type="button" class="btn btn-outline-primary my-8" href="{{ route('clients.create') }}">Add Client</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firsr Name</th>
                            <th>Last Name</th>
                            <th>Organisation</th>
                            <th>Adress</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Comment</th>
                            <th>Detals</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->firstname }}</td>
                                <td>{{ $client->lastname }}</td>
                                <td>{{ $client->organisation }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->email}}</td>
                                <td>{{ $client->tel }}</td>
                                <td>{{ $client->comment }}</td>
                                <th><a href="{{ route('clients.show', $client) }}"><button type="button" class="btn btn-secondary">Detals</button> </a> </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if (count($clients) > 1)
                        {{ $clients->links() }}
                    @endif
                    @if (count($clients) < 1)
                        You have not any clients!
                    @endif
                </div>
        </main>

@endsection
