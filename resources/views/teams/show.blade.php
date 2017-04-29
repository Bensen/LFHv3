@extends('layouts.main')

@section('meta')
<title>{{ $team->name }} | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">
                <i class="fa fa-{{ $team->emblem }}"></i> {{ $team->name }}
                <span class="badge badge-default float-right">
                    {{ round($team->fame) }} <i class="fa fa-trophy amber-text" aria-hidden="true"></i>
                </span>
            </h1>
            <div class="card-block">

                @include('errors.flash.danger')

                @if ($character->hasRole('Leader') && count($applicants))
                    <h3 class="card-header bg-primary">Bewerber</h3>
                    @include('teams.partials.manageApplicants')
                @endif

                <h3 class="card-header bg-primary">Mitglieder ({{ $team->characters->count() }}/{{ $team->getMaxMembers() }})</h3>
                @include('characters.partials.ranking')

                @if ($character->hasRole('Leader'))
                    <button class="btn btn-danger float-right" type="button" data-toggle="modal" data-target="#deleteTeamModal">
                        Auflösen
                    </button>
                    @include('teams.partials.deleteTeamModal')
                @elseif ($character->hasRole('Member'))
                    <button class="btn btn-danger float-right" type="button" data-toggle="modal" data-target="#leaveTeamModal">
                        Verlassen
                    </button>
                    @include('teams.partials.leaveTeamModal')
                @elseif ($character->hasRole('Applicant'))
                    <button class="btn btn-danger float-right" type="button" data-toggle="modal" data-target="#cancelApplicationModal">
                        Abbrechen
                    </button>
                    @include('teams.partials.cancelApplicationModal')
                @elseif ($character->hasRole('None'))
                    @if ($team->characters->count() < $team->getMaxMembers())
                        <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#applyTeamModal">
                            Bewerben
                        </button>
                        @include('teams.partials.applyTeamModal')
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
