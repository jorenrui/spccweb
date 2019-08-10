@extends('layouts.pages', ['title' => 'News', 'article' => 'Article Title Here'])

@section('content')
<!-- Article -->
<section class="section article">
  <article>
    <div class="news-meta">
      <h1 class="title">
        {{ $post->title }}
      </h1>
      <div class="meta">
        {{ $post->user->getName() }}
        <span class="publish-date">
          Created on {{ $post->created_at->format('g:iA M d, Y') }}
          | Updated on {{ $post->created_at->format('g:iA M d, Y') }}
        </span>
      </div>
    </div>
    <img src="{{ asset('spccweb/img/news/news3.jpg') }}">
    <div class="article-content">
      {!! $post->body !!}
    </div>
  </article>
  <div class="button">
    <a href="javascript:history.back()" class="link">Return</a>
  </div>
</section>
<!-- end Article -->
@endsection