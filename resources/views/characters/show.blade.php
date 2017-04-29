@extends('layouts.main')

@section('meta')
<title>{{ $character->name }} | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    @include('characters.partials.sidebar')
    <div class="col">
        <div class="card">
            <h1 class="card-header">
                {{ $character->name }} {{ $character->level }}
                <span class="badge badge-default float-right">
                    {{ $character->fame }} <i class="fa fa-trophy amber-text" aria-hidden="true"></i>
                </span>
            </h1>
            <div id="character" class="card-block">
                <form method="POST" action="{{ route('character.exp', $character) }}">
                    {{ csrf_field() }}
                    <button class="btn btn-success" type="submit">+100xp</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
