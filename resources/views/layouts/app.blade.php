<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/TogetherPeopleStrong/bootstrap/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="/TogetherPeopleStrong/bootstrap/assets/fonts/font-awesome.min.css">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body style="background-image: url('/TogetherPeopleStrong/bootstrap/assets/img/monkeyBG.png');background-repeat: repeat;background-color: white ;background-size: 10%;">
    @include('layouts.navbar')
    <br/>
    <div  style="background-color: white;margin:10px 50px;" class="border border-dark rounded shadow-lg">
    <div id="app">
    <div align="center">
        @include('layouts.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
    <div style="padding-left: 50px;" align="left">
    <main class="py-4">
        @yield('non-center-content')
    </main>
    </div>
    @include('layouts.footer')
    </div>
    <script src="/TogetherPeopleStrong/bootstrap/assets/js/jquery.min.js"></script>
    <script src="/TogetherPeopleStrong/bootstrap/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="/TogetherPeopleStrong/bootstrap/assets/js/stylish-portfolio.js"></script>
</body>
</html>