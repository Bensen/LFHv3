@extends('layouts.main')

@section('meta')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <h1 class="card-header">Meine Charaktere</h1>
                <div id="characters" class="card-block">
                    <div class="row">
                        @foreach ($user->characters as $character)
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="{{ route('characters.show', ['$character' => $character->id]) }}">
                                        <h3 class="card-header">
                                            {{ $character->name }} <small>({{ $character->level }})</small>
                                            <form class="float-right" method="POST" action="{{ route('characters.destroy', ['characters' => $character->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger m-0 p-2" type="submit">x</button>
                                            </form>
                                        </h3>
                                        <div class="card-block">
                                            <img class="card-img-left" src="{{ asset('img/shadowhunter.gif') }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
