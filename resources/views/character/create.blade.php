@extends('layouts.main')

@section('meta')
<title>Charakter erstellen | {{ config('app.name') }}</title>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // set initial state
        var $checked = $('input[type="radio"]:checked');
        $checked.closest('.card').addClass('card-inverse');

        // update on change
        $('input[type="radio"]').change(function() {
          $checked.prop('checked', false).closest('.card').removeClass('card-inverse');
          $checked = $(this);
          $checked.closest('.card').addClass('card-inverse');
        });
    });
</script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Wähle einen Kämpfer</h1>
            <div id="characters" class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('character.store') }}">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        @foreach ($fighters as $fighter)
                            <div class="col-lg-6 form-check">
                                <div class="card {{ $fighter->name }}">
                                    <h3 class="card-header">{{ $fighter->name }} <small>(0 Dantrinsteine)</small></h3>
                                    <label class="form-check-label">
                                        <div class="card-block clearfix">
                                            <img class="card-img-left" src="{{ asset($fighter->image) }}">
                                            <p class="card-text">{{ $fighter->description }}</p>
                                        </div>
                                        <input style="display: none;" type="radio" name="fighter" value="{{ $fighter->name }}">
                                    </label>
                                </div>
                            </div>
                        @endforeach                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name">Name</label>
                                <input id="name" class="form-control form-control-lg{{ $errors->has('name') ? ' form-control-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" required>
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
