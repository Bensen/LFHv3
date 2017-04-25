<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield ('meta')
    <script src="https://use.fontawesome.com/0f89e2e04a.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/css/mdb.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
    @include('layouts.partials.header')
    <div id="content" class="container">
        @yield('content')
    </div>
    @include('layouts.partials.footer')
    
    @include('layouts.partials.scripts')
    @yield('scripts')

    <div class="container" style="text-shadow: none; margin-top: 20px;">
        {{ dd(session()->all()) }}
    </div>
</body>

</html>
