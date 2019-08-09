@extends('layouts.pages', ['title' => 'News'])

@section('content')
<!-- Page Cover Section -->
<section class="section page-cover news-cover">
  <div class="page-title">
    <h1>News</h1>
  </div>

  <canvas class="particles-background"></canvas>
</section>
<!-- end Page Cover Section -->

<!-- Featured News -->
<section class="section featured-news">
  <article>
    <div class="cover-image">
      <img src="{{ asset('spccweb/img/news/news1.jpg') }}">
    </div>
    <div class="content">
      <div class="news-meta">
        <h2>
          <a href="/article" class="title">
            S.Y. 2019-2020 School Opening
          </a>
        </h2>
        <div class="meta">
          Admin
          <span class="publish-date">Jun 24, 2019</span>
        </div>
      </div>
      <div class="article-content">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim...
        </p>
        <a href="/article" class="link">Read More</a>
      </div>
    </div>
  </article>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-top" />
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-bottom" />
  </div>
</section>
<!-- end Featured News -->

<!-- News -->
<section class="section news">
  <article>
    <img src="{{ asset('spccweb/img/news/news2.jpg') }}">
    <div class="news-meta">
      <h2>
        <a href="/article" class="title">
          Basketball: ADU vs SPCC
        </a>
      </h2>
      <div class="meta">
        Admin
        <span class="publish-date">Aug 07, 2019</span>
      </div>
    </div>
    <div class="article-content">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud...
      </p>
      <a href="/article" class="link">Read More</a>
    </div>
  </article>

  <article>
    <img src="{{ asset('spccweb/img/news/news3.jpg') }}">
    <div class="news-meta">
      <h2>
        <a href="/article" class="title">
          Blessing and Opening of the New Gymnasium
        </a>
      </h2>
      <div class="meta">
        Admin
        <span class="publish-date">Sep 07, 2019</span>
      </div>
    </div>
    <div class="article-content">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud...
      </p>
      <a href="/article" class="link">Read More</a>
    </div>
  </article>
</section>
<!-- end News -->
@endsection