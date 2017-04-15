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

                    @foreach ($user->characters as $character)
                        <div class="col-md-4">
                            <div class="card">
                                <h3 class="card-header {{ $character->fighter }}">
                                    <a href="{{ route('character.show', ['$character' => $character->id]) }}">
                                        {{ $character->name }} <small>({{ $character->level }})</small>
                                    </a>
                                    <button class="btn btn-danger btn-sm m-0 float-right" type="button" data-toggle="modal" data-target="#characterModal{{ $character->id }}"><i class="fa fa-times" aria-hidden="true"></i></button>

                                    <div class="modal fade" id="characterModal{{ $character->id }}" tabindex="-1" role="dialog" aria-labelledby="characterModal{{ $character->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="characterModal{{ $character->id }}Label">Charakter <strong>"{{ $character->name }}"</strong> löschen?</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="float-right" method="POST" action="{{ route('character.destroy', ['characters' => $character->id]) }}">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                                        <button class="btn" type="button" data-dismiss="modal">Abbrechen</button>
                                                        <button class="btn btn-danger" type="submit">Löschen</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </h3>
                                <a href="{{ route('character.show', ['$character' => $character->id]) }}">
                                    <div class="card-block clearfix">
                                        <img class="card-img-left" src="{{ asset($character->image) }}">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{ $character->experience }}/100</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ $character->health }}/{{ $character->health }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    @for ($i = $user->characters->count(); $i < $user->getMaxCharacters(); $i++)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{ route('character.create') }}">
                                    <h3 class="card-header clearfix">
                                        Erstellen
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
