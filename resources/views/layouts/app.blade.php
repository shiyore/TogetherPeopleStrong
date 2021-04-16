<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('layouts.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
	<br/>
    <div id="app">
    <div align="center">
		@include('layouts.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div style="padding-left: 50px;" align="left">
    <main class="py-4">
    	@yield('non-center-content')
    </main>
    </div>
    </div>
    @include('layouts.footer')
    
    <div class="container">
  <div class="row">
    <div class="col-4">
    </div>
    <div style=""class=" col-4 shadow-lg p-3 mb-5 bg-body rounded-pill" >
		
    </div>
    <div class="col-4">

    </div>
  </div>
</div>
</body>
</html>