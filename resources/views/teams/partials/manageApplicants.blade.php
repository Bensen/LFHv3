<div id="ranking">
    @foreach ($applicants as $applicant)
        @if ($loop->iteration % 2 == 0) <div class="card grey lighten-4">
        @else <div class="card grey lighten-3">
        @endif
            <a href="{{ route('character.show', $applicant->id) }}">
                <div class="card-block">
                    <div class="row">
                        <div class="col-2">
                            <span class="badge badge-default">{{ $applicant->fame }} <i class="fa fa-trophy amber-text" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-6">
                            <img src="{{ asset($applicant->image) }}">
                            <span class="badge {{ $applicant->fighter }}">
                                {{ $applicant->name }} {{ $applicant->level }}
                            </span>
                        </div>
                        <div class="col-4 text-right">
                            <form method="POST" action="{{ route('team.accept', [$team->id, $applicant->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-sm btn-success float-right" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                            </form>
                            <form method="POST" action="{{ route('team.reject', [$team->id, $applicant->id]) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-sm btn-danger float-right" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

