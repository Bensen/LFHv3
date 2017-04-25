@extends('layouts.main')

@section('meta')
<title>Rangliste | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Rangliste</h1>
            <div class="card-block">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#fighters" data-toggle="tab" role="tab">Kämpfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#teams" data-toggle="tab" role="tab">Teams</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="fighters" class="tab-pane active" role="tabpanel">
                        @include('characters.partials.ranking')
                    </div>
                    <div id="teams" class="tab-pane" role="tabpanel">
                        @include('teams.partials.ranking')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection