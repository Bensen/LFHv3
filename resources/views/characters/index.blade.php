@extends('layouts.main')

@section('meta')
<title>Meine Kämpfer | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Meine Kämpfer</h1>
            <div id="characters" class="card-block">
                <div class="row">
                    @if (session('status'))
                        <div class="col-12">
                            <span class="alert alert-warning" role="alert">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ session('status') }}
                            </span>
                        </div>
                    @endif
                    @foreach ($user->characters as $character)
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <h3 class="card-header {{ $character->fighter }}">
                                    <a href="{{ route('character.play', $character->id) }}" onclick="event.preventDefault(); document.getElementById('character-form{{ $character->id }}').submit();">
                                        <form id="character-form{{ $character->id }}" action="{{ route('character.play', $character->id) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        {{ $character->name }} <small>({{ $character->level }})</small>
                                    </a>
                                    <button class="btn btn-danger btn-sm m-0 float-right" type="button" data-toggle="modal" data-target="#deleteCharacterModal{{ $character->id }}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>

                                    @include('characters.destroy')

                                </h3>
                                <a href="{{ route('character.play', $character->id) }}" onclick="event.preventDefault(); document.getElementById('character-form{{ $character->id }}').submit();">
                                    <div class="card-block clearfix">
                                        <img class="card-img-left" src="{{ asset($character->image) }}">
                                        @include('characters.partials.bars')
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    @for ($i = $user->characters->count(); $i < $user->getMaxCharacters(); $i++)
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <a href="{{ route('character.create') }}">
                                    <h3 class="card-header clearfix">
                                        Wählen
                                        <button class="btn btn-primary btn-sm m-0 float-right"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </h3>
                                    <div class="card-block clearfix">
                                        <img class="card-img-left" src="{{ asset('img/characters/template.gif') }}">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
