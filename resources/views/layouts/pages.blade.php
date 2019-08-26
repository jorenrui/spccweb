<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SPCC Caloocan') }} | {{ isset($article) ? $article : $title }}</title>
  <meta name="description" content="Systems Plus Computer College - Caloocan Website." />

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

  <link rel="stylesheet" href="{{ asset('vendor/normalize/normalize.min.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="{{ asset('spccweb/css/styles.css') }}">
</head>

<body>

  @include('layouts.navbars.navs.pages')

  @yield('content')

  @include('layouts.footers.pages')

  <script src="{{ asset('vendor/jquery-3.2.1/jquery.min.js') }}"></script>
  <script src="{{ asset('spccweb/js/particles.js') }}"></script>
  <script src="{{ asset('spccweb/js/script.js') }}"></script>

</body>

</html>