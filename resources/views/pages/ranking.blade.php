@extends('layouts.main')

@section('meta')
<title>Rangliste | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Rangliste</h1>
            <div class="card-block">
                <table class="table table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Klasse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($characters as $character)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $character->name }}</td>
                                <td>{{ $character->level }}</td>
                                <td>{{ $character->fighter }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection