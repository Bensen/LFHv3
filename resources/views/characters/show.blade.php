@extends('layouts.main')

@section('meta')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <h1 class="card-header">{{ $character->name }}</h1>
                <div id="character" class="card-block">
                    hi
                </div>
            </div>
        </div>
    </div>
@endsection
