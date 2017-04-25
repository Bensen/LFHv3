<div id="ranking">
    @foreach ($teams as $team)
        @if ($loop->iteration % 2 == 0) <div class="card grey lighten-4">
        @else <div class="card grey lighten-3">
        @endif
            <a href="{{ route('team.show', $team->id) }}">
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
                            <span class="badge {{ $team->color }}">
                                <i class="fa fa-{{ $team->emblem }}" aria-hidden="true"></i>
                                {{ $team->name }}
                            </span>
                        </div>
                        <div class="col-4 text-right">
                            <span class="badge badge-default">{{ $team->fame }} <i class="fa fa-trophy amber-text" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>