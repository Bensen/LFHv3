@extends('layouts.main')

@section('meta')
<title>Passwort vergessen | {{ config('app.name') }}</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <h1 class="card-header">Passwort vergessen</h1>
            <div class="card-block">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="email">Email</label>
                        <input id="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Link zum zurücksetzen anfordern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
