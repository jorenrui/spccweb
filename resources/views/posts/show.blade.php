@extends('layouts.pages', ['title' => 'News', 'article' => 'Article Title Here'])

@section('content')
<!-- Article -->
<section class="section article">
  <article>
    <div class="news-meta">
      <h1 class="title">
        <a href="article.html">
          Blessing and Opening of the New Gymnasium
        </a>
      </h1>
      <div class="meta">
        Admin
        <span class="publish-date">Sep 07, 2019</span>
      </div>
    </div>
    <img src="{{ asset('spccweb/img/news/news3.jpg') }}">
    <div class="article-content">
      <p>
        How stylists make you a better lover. How fashion designers can make you sick. How to be unpopular in the
        fashion show world. If you read one article about cheap cloths read this one. How to be unpopular in the
        online boutique world. Why our world would end if cloth accessories disappeared. 12 things about wholesale
        dresses your kids don't want you to know. 17 movies with unbelievable scenes about stylists. How makeup
        artists made me a better person. Why your salon service never works out the way you plan.
      </p>
      <h1>Heading</h1>
      <p>
        How twitter can teach you about fashion weeks. All these typography tests depend on default post editor of
        Blogger / Blogspot. Why do people think fashion weeks are a good idea?. How cheap cloths are the new cheap
        cloths.
      </p>
      <h2>sub-Heading</h2>
      <p>
        How to be unpopular in the clothing store world. Why you shouldn't eat fashion week in bed. How hollywood got
        spring dresses all wrong.
      </p>
      <h3>Minor Heading</h3>
      <p>
        The 8 worst songs about clothing stores. <strong>This is bold text.</strong> Why models will make you question
        everything. <em>This is italic text.</em> The 12 best clothing store twitter feeds to follow. <u>This is
          underline text.</u> Ways your mother lied to you about fashion weeks. <del>This is linethrough text.</del>
        17 ways wholesale dresses can make you rich. What wikipedia can't tell you about summer outfits. An expert
        interview about trends.
      </p>
      <h2>List Texts</h2>
      <ol>
        This is list of ol
        <li>Why you shouldn't eat fashion week in bed</li>
        <li>Why sexy cloths should be 1 of the 7 deadly sins</li>
        <li>How fashion designers made me a better person</li>
        <li>What experts are saying about hairstyles</li>
      </ol>
      <ul>
        This is list of ul
        <li>What the world would be like if fashion angels didn't exist</li>
        <li>How twitter can teach you about fashion shows</li>
        <li>The oddest place you will find cloth accessories</li>
        <li>Unbelievable trendy cloth success stories</li>
      </ul>
    </div>
  </article>
  <div class="button">
    <a href="/news" class="link">Return</a>
  </div>
</section>
<!-- end Article -->
@endsection