<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SPCC Caloocan') }} | {{ $title }}</title>
  <meta name="description" content="Systems Plus Computer College - Caloocan Website." />

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="{{ asset('spccweb/css/styles.css') }}">
</head>

<body>

  @include('layouts.navbars.navs.pages')

  @yield('content')

  @include('layouts.footers.pages')

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('spccweb/js/particles.js') }}"></script>
  <script src="{{ asset('spccweb/js/script.js') }}"></script>

</body>

</html>