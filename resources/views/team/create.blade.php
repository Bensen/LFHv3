@extends('layouts.main')

@section('meta')
<title>Gründung | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <h1 class="card-header">Gründung</h1>
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('team.store') }}">
                            {{ csrf_field() }}
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
