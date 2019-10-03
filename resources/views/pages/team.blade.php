<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SPCC Caloocan') }} | Team</title>
  <meta name="description" content="Systems Plus Computer College - Caloocan Website." />

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="{{ asset('spccweb/css/styles.css') }}">
</head>

<body>

<!-- Team Section -->
<section class="section team">
  <div class="card">
    <div class="title">
      <h1>JOBRYGE TEAM</h1>
      <h2>Capstone Team</h2>
    </div>
    <div class="content">
      <div class="team-member">
        <img src="{{ asset('spccweb/img/team/avatar-geraldine.png') }}" alt="avatar" class="avatar">
        <h3 class="name">Geraldine Mae Gonzales</h3>
        <p>Project Manager</p>
        <p>
          <a href="{{ asset('spccweb/resume/geraldine.pdf') }}" class="link">
            resume
          </a>
        </p>
      </div>
      <div class="team-member">
        <img src="{{ asset('spccweb/img/team/avatar-bryan.png') }}" alt="avatar" class="avatar">
        <h3 class="name">Bryan Garcia</h3>
        <p>System Analyst/QA</p>
        <p>
          <a href="{{ asset('spccweb/resume/bryan.pdf') }}" class="link">
            resume
          </a>
        </p>
      </div>
      <div class="team-member">
        <img src="{{ asset('spccweb/img/team/avatar-joeylene.png') }}" alt="avatar" class="avatar">
        <h3 class="name">Joeylene Rivera</h3>
        <p>Web Developer/Designer</p>
        <p>
          <a href="{{ asset('spccweb/resume/joeylene.pdf') }}" class="link">
            resume
          </a>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- end Team Section-->

</body>

</html>