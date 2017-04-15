@extends('layouts.main')

@section('meta')
<title>Rangliste | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Rangliste</h1>
            <div id="rankings" class="card-block">
                @foreach ($characters as $character)
                    @if ($loop->iteration % 2 == 0) <div class="card grey lighten-4">
                    @else <div class="card grey lighten-3">
                    @endif
                    <a href="{{ route('character.show', $character->id) }}">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-2">
                                @if ($loop->iteration == 1) <span class="badge amber">{{ $loop->iteration }}</span>
                                @elseif ($loop->iteration == 2) <span class="badge grey lighten-1">{{ $loop->iteration }}</span>
                                @elseif ($loop->iteration == 3) <span class="badge deep-orange darken-3">{{ $loop->iteration }}</span>
                                @else <span class="badge grey lighten-5">{{ $loop->iteration }}</span>
                                @endif
                            </div>
                            <div class="col-6">
                                <img src="{{ asset($character->image) }}">
                                @if ($character->user->hasTeam()) [{{ $character->user->team->name }}] @endif
                                {{ $character->name }}
                                <span class="badge badge-danger">{{ $character->level }}</span>
                            </div>
                            <div class="col-4">
                                <span class="badge badge-default">{{ $character->fame }} <i class="fa fa-trophy amber-text" aria-hidden="true"></i></span>
                            </div class="col-4">
                        </div>
                    </div>
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection