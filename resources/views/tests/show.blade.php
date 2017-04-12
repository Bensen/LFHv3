@extends('layouts.main')

@section('meta')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <h2 class="card-header">Show</h2>
            <div class="card-block">
                <a href="{{ action('TestController@index') }}">< Back</a>
                <h1>{{ $test->name }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection