@extends('layouts.main')

@section('meta')
<title>{{ $team->name }} | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">{{ $team->name }}</h1>
            <div id="characters" class="card-block">
                <div class="row">
                    hi
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
