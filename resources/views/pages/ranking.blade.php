@extends('layouts.main')

@section('meta')
<title>Rangliste | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Rangliste</h1>
            <div id="rankings" class="card-block">
                <table class="table table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Kämpfer</th>
                            <th>Ruhm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($characters as $character)
                            <a href="{{ route('character.show', $character->id) }}">
                                <tr>
                                    <th scope="row">
                                        @if ($loop->iteration == 1) <span class="badge amber">{{ $loop->iteration }}</span>
                                        @elseif ($loop->iteration == 2) <span class="badge grey lighten-1">{{ $loop->iteration }}</span>
                                        @elseif ($loop->iteration == 3) <span class="badge deep-orange darken-3">{{ $loop->iteration }}</span>
                                        @else <span class="badge grey lighten-5">{{ $loop->iteration }}</span>
                                        @endif
                                    </th>
                                    <td>
                                        <img src="{{ asset($character->image) }}">
                                        @if ($character->user->hasTeam()) [{{ $character->user->team->name }}] @endif
                                        {{ $character->name }}
                                        <span class="badge badge-danger">{{ $character->level }}</span>
                                    </td>
                                    <td><span class="badge badge-default">{{ $character->fame }} <i class="fa fa-trophy amber-text" aria-hidden="true"></i></span></td>
                                </tr>
                            </a>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection