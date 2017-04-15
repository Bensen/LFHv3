@extends('layouts.main')

@section('meta')
<title>{{ $team->name }} | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">{{ $team->name }}</h1>
            <div class="card-block">
                <div class="card">
                    <h2 class="card-header">Rangliste</h2>
                    @foreach($team->user->characters as $character)
                        <div class="card-block">
                            <div class="row">
                                <div class="col-2">{{ $loop->iteration }}</div>
                                <div class="col-6">{{ $character->name }}</div>
                                <div class="col-4">{{ $character->fame }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
