@extends('layouts.main')

@section('meta')
<title>{{ $team->name }} | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">
                Heading
            </h1>
            <div class="card-block">
                Content
            </div>
        </div>
    </div>
</div>
@endsection
