@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 ">
        <div class="card">
            <h1 class="card-header">Login</h1>
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="email">Email</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="password">Passwort</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Angemeldet bleiben
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">Passwort vergessen?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
