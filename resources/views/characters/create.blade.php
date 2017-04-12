@extends('layouts.main')

@section('meta')
    <title>Charakter erstellen</title>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // set initial state
            var $checked = $('input[type="radio"]:checked');
            $checked.closest('.card').addClass('card-inverse card-warning');

            // update on change
            $('input[type="radio"]').change(function() {
              $checked.prop('checked', false).closest('.card').removeClass('card-inverse card-warning');
              $checked = $(this);
              $checked.closest('.card').addClass('card-inverse card-warning');
            });
        });
    </script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <h1 class="card-header">Charakter erstellen</h1>
                <div id="characters" class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="/characters">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-lg-6 form-check">
                                <div class="card">
                                    <h3 class="card-header">Schattenjäger <small>(0 Dantrinsteine)</small></h3>
                                    <label class="form-check-label">
                                        <img class="card-img-left" src="{{ asset('img/shadowhunter.gif') }}">
                                        <div class="card-block">
                                            <p class="card-text">Seine machtvolle Aura erlaubt es ihm den Feinden das Blut auszusaugen. Es heißt, dass er nicht zu töten ist und diejenigen, die von seinem Schlag niedergestreckt werden, nie mehr aufwachen.</p>
                                        </div>
                                        <input class="hidden-xs-up" type="radio" name="character" value="1" checked>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 form-check">
                                <div class="card">
                                    <h3 class="card-header">Schattenjäger <small>(0 Dantrinsteine)</small></h3>
                                    <label class="form-check-label">
                                        <img class="card-img-left" src="{{ asset('img/shadowhunter.gif') }}">
                                        <div class="card-block">
                                            <p class="card-text">Seine machtvolle Aura erlaubt es ihm den Feinden das Blut auszusaugen. Es heißt, dass er nicht zu töten ist und diejenigen, die von seinem Schlag niedergestreckt werden, nie mehr aufwachen.</p>
                                        </div>
                                        <input class="hidden-xs-up" type="radio" name="character" value="2">
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 form-check">
                                <div class="card">
                                    <h3 class="card-header">Schattenjäger <small>(0 Dantrinsteine)</small></h3>
                                    <label class="form-check-label">
                                        <img class="card-img-left" src="{{ asset('img/shadowhunter.gif') }}">
                                        <div class="card-block">
                                            <p class="card-text">Seine machtvolle Aura erlaubt es ihm den Feinden das Blut auszusaugen. Es heißt, dass er nicht zu töten ist und diejenigen, die von seinem Schlag niedergestreckt werden, nie mehr aufwachen.</p>
                                        </div>
                                        <input class="hidden-xs-up" type="radio" name="character" value="3">
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 form-check">
                                <div class="card">
                                    <h3 class="card-header">Schattenjäger <small>(0 Dantrinsteine)</small></h3>
                                    <label class="form-check-label">
                                        <img class="card-img-left" src="{{ asset('img/shadowhunter.gif') }}">
                                        <div class="card-block">
                                            <p class="card-text">Seine machtvolle Aura erlaubt es ihm den Feinden das Blut auszusaugen. Es heißt, dass er nicht zu töten ist und diejenigen, die von seinem Schlag niedergestreckt werden, nie mehr aufwachen.</p>
                                        </div>
                                        <input class="hidden-xs-up" type="radio" name="character" value="4">
                                    </label>
                                </div>
                            </div>                        
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input id="name" class="form-control form-control-lg{{ $errors->has('name') ? ' form-control-danger' : '' }}" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Erstellen</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
