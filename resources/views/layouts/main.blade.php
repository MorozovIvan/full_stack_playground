<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="//unpkg.com/vue2-datatable-component/dist/min.css" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/App.js') }}" defer></script>
    </head>
    <body>
        <div id="app" class="full-height">

            @include('navbar')

            @yield('content')

        </div>

        <script src="//unpkg.com/vue2-datatable-component/dist/min.js"></script>
    </body>
</html>
