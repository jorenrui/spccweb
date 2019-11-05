@extends('layouts.pages', ['title' => 'Contact'])

@section('content')
<!-- Page Cover Section -->
<section class="section page-cover">
  <div class="page-title">
    <h1>Contact</h1>
  </div>

  <canvas class="particles-background"></canvas>
</section>
<!-- end Page Cover Section -->

<!-- Contact Section -->
<section class="section contact">
  <p class="description">
    Got something to ask? Inquire and send us a message.
  </p>
  <form method="POST" action="{{ action('MessagesController@store') }}" class="contact-form" autocomplete="off">
    @csrf

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="e.g. Juan Dela Cruz" required />
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Optional"
      />
    </div>
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" />
    </div>
    <div class="form-group">
      <label for="body">Message</label>
      <textarea class="form-control" name="body" id="body" rows="1" placeholder="Enter Message"
        required></textarea>
    </div>
    <div class="form-group">
      <button type="submit" value="submit" class="btn btn-submit">
        Send Message
      </button>
    </div>
  </form>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-big-top" />
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-small-top" />
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-small" />
  </div>
</section>
<!-- end Contact Section -->

<div class="section contact-map"></div>
@endsection