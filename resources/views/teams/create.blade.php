@extends('layouts.main')

@section('meta')
<title>Gründung | {{ config('app.name') }}</title>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // set initial state
        var $checked = $('input[type="radio"]:checked');
        $checked.closest('.card').addClass('stylish-color');

        // update on change
        $('input[type="radio"]').change(function() {
          $checked.prop('checked', false).closest('.card').removeClass('stylish-color');
          $checked = $(this);
          $checked.closest('.card').addClass('stylish-color');
        });
    });
</script>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Gründe dein Team</h1>
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('team.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                @foreach ($emblems as $emblem)
                                    <div class="col-xs-3 col-lg-2 form-check">
                                        <div class="card">
                                            <div class="card-block text-center">
                                                <label class="form-check-label">
                                                    <i class="fa fa-{{ $emblem->name }} fa-4x" aria-hidden="true"></i>
                                                    <input style="display: none;" type="radio" name="emblem" value="{{ $emblem->name }}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>    
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">  
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name">Name</label>
                                <input id="name" class="form-control form-control-lg{{ $errors->has('name') ? ' form-control-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Gründen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
