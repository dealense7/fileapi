<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
  
    <div id="app" class="container py-3">
        <nav class="navbar navbar-light bg-white">
            <a class="navbar-brand" href="#">API გადაგზავნა</a>
            <button class="btn btn-modal m-0" data-toggle="modal" data-target="#exampleModal">
                      დამატება
            </button>
        
          </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>  
</body>
</html>
