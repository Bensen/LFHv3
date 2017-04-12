@extends('layouts.main')

@section('meta')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <h2 class="card-header">Index</h2>
            <div class="card-block">
                <ul>
                    @foreach ($tests as $test)
                        <li><a href="tests/{{ $test->id }}">{{ $test->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection