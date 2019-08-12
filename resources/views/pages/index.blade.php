@extends('layouts.pages', ['title' => 'Home'])

@section('content')
<!-- Hero Section -->
<section class="section hero">
  <div class="content">
    <h1 class="headline">Excellence.</h1>
    <p class="description">Committed to delivering quality education</p>
    <a href="/enroll" class="btn">be a spcnian</a>
  </div>
  <div class="image">
    <img src="{{ asset('spccweb/img/hero.jpg') }}" alt="SPCC Caloocan School Building" />
  </div>
  <canvas class="particles-background"></canvas>
</section>
<!-- end Hero Section -->

<!-- Upcoming Events Section -->
<section class="section upcoming-events">
  <div class="content">
    <div class="title">
      <h2 class="headline">Upcoming Events</h2>
      <div class="pagination">
        <a href="#">
          <i class="fa fa-3x fa-angle-left"></i>
        </a>
        <a href="#">
          <i class="fa fa-3x fa-angle-right"></i>
        </a>
      </div>
    </div>
    <div class="card">
      <h3 class="date">20 May</h3>
      <p class="event">Start of Enrollment</p>
    </div>
    <div class="card">
      <h3 class="date">22 Jun</h3>
      <p class="event">End of Enrollment</p>
    </div>
    <div class="card">
      <h3 class="date">24 Jun</h3>
      <p class="event">Start of Classes</p>
    </div>
    <div class="card">
      <h3 class="date">08 Sep</h3>
      <p class="event">Prelims Examination</p>
    </div>
  </div>
</section>
<!-- end Upcoming Events Section -->

<!-- About Section -->
<section class="section about-brief">
  <div class="content">
    <h2 class="headline">Systems Plus Computer College</h2>
    <h3 class="sub-headline">Caloocan Campus</h3>
    <p class="description">
      Systems Plus Computer College (SPCC) is a private school founded in 1997. It is affiliated with Systems Plus Computer Foundation (SPCF) which was founded in 1985 at Balibago, Angeles City, Pampanga on June 27, 1985. With the growth of the school, campuses have been established in Cubao, Caloocan City, San Fernando, and in Miranda, Angeles City.
    </p>
    <a href="/about" class="link">Learn More</a>
  </div>
  <div class="image">
    <img src="{{ asset('spccweb/img/spcnian.jpg') }}" alt="SPCC flag ceremony" />
  </div>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern.svg') }}" class="circle-pattern-big" />
  </div>
</section>
<!-- end About Section -->

<!-- Programs Section -->
<section class="section programs">
  <div class="content">
    <h2 class="headline">Program of Study</h2>
    <ul>
      <li class="level-1">
        <span>Basic Education Department</span>
        <ul>
          <li>Pre-elementary</li>
          <li>Elementary</li>
          <li>Junior High School</li>
          <li>
            Senior High School
            <ul class="strands">
              <li>
                STEM, ABM, GAS, HUMSS, ICT, HE
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="level-1">
        <span>College Department</span>
        <ul>
          <li>B.S. in Information Technology</li>
          <li>Associate in Computer Technology</li>
          <li>Associate in Hotel and Restaurant Management</li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-small" />
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-big" />
  </div>
</section>
<!-- end Programs Section -->

<!-- Latest News Section -->
@if(count($posts) > 2)
<section class="section latest-news">
  <h2 class="headline">Latest News</h2>

  @foreach ($posts as $post)
    <article>
      <img src="/storage/cover_images/{{$post->cover_image}}" />
      <h3>
        <a href="/articles/{{ $post->post_id }}" class="title">
          {{ $post->title }}
        </a>
      </h3>
      <div class="meta">
        {{ $post->user->getName() }}
        <span class="publish-date">{{ $post->created_at->format('M d, Y') }}</span>
      </div>
      <p class="article-content">
        {!! str_limit(strip_tags($post->body), 135) !!}
      </p>
      <a href="/articles/{{ $post->post_id }}" class="link">Read More</a>
    </article>
  @endforeach

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern.svg') }}" class="circle-pattern-small-top" />
    <img src="{{ asset('spccweb/img/circle-pattern.svg') }}" class="circle-pattern-big-top" />
    <img src="{{ asset('spccweb/img/circle-pattern.svg') }}" class="circle-pattern-small" />
    <img src="{{ asset('spccweb/img/circle-pattern.svg') }}" class="circle-pattern-big" />
  </div>
</section>
@endif
<!-- end Latest News Section-->
@endsection