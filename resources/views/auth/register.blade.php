@extends('layouts.main')

@section('meta')
<title>Registrierung | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <h1 class="card-header">Registrierung</h1>
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label for="name" class="form-control-label">Name</label>
                        <input id="name" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label for="email" class="form-control-label">Email</label>
                        <input id="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label for="password" class="form-control-label">Passwort</label>
                        <input id="password" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" type="password" name="password" required>
                        @if ($errors->has('password'))
                            <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="form-control-label">Passwort wiederholen</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Registrieren</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
