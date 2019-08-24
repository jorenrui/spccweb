@extends('layouts.pages', ['title' => 'About'])

@section('content')
<!-- Page Cover Section -->
<section class="section page-cover">
  <div class="page-title">
    <h1>About</h1>
  </div>

  <canvas class="particles-background"></canvas>
</section>
<!-- end Page Cover Section -->

<!-- About Section -->
<section class="section about">
  <div class="image">
    <img src="{{ asset('spccweb/img/hero.jpg') }}" alt="SPCC Caloocan School Building" />
  </div>
  <div class="content">
    <h2>Systems Plus Computer College - Caloocan</h2>
    <div class="description">
      <p>
          Systems Plus Computer College (SPCC) is a private school founded in 1997. It is affiliated with Systems Plus Computer Foundation (SPCF) which was founded in 1985 at Balibago, Angeles City, Pampanga on June 27, 1985. With the growth of the school, campuses have been established in Cubao, Caloocan City, San Fernando, and in Miranda, Angeles City. SPCC - Caloocan has a Basic Education Department and a College Department.
      </p>
      <p>
        Systems Plus Computer College offers meaningful opportunities for students who want to excel in the computer and technical education. The emphasis on academic excellence and well-grounded values are reflected in the degree programs offered by the school which showed evidence of innovation and high technology.
      </p>
    </div>
  </div>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-big" />
  </div>
</section>
<!-- end About Section -->

<!-- Info Tab Section -->
<section class="section info-tab">
  <div class="tab-menu">
    <ul class="tab-nav">
      <li>
        <a href="#" data-target="#tab-mission">Mission</a>
      </li>
      <li>
        <a href="#" data-target="#tab-vision">Vision</a>
      </li>
      <li>
        <a href="#" data-target="#tab-values">Core Values</a>
      </li>
      <li>
        <a href="#" data-target="#tab-president">President's Corner</a>
      </li>
      <li>
        <a href="#" data-target="#tab-hymn">Hymn</a>
      </li>
    </ul>
  </div>
  <div class="tab-content">
    <div id="tab-mission" class="tab-current">
      <h2>Mission</h2>
      <p>
        Systems Plus Computer College is committed to provide liberal, quality, transformative
        and relevant education towards the holistic development of all stakeholders through
        excellence in instruction, research and extension services.
      </p>
    </div>
    <div id="tab-vision">
      <h2>Vision</h2>
      <p>
        A leading and globally competitive institution of learning through service and
        innovation.
      </p>
    </div>
    <div id="tab-values">
      <h2>Core Values</h2>
      <h3>Service</h3>
      <p>
        Engage in school activities, community partnership, outreach endeavors, and social advocacies.
      </p>
      <h3>Professionalism</h3>
      <p>
        Demonstrate and assume responsibility of actions.
      </p>
      <h3>Competence</h3>
      <p>
        Develop and pursue high standards of quality and superior performance.
      </p>
      <h3>Fellowship</h3>
      <p>
        Cooperate, collaborative and communicate effectively, treat each other with respect and fairness, and foster
        camaraderie.
      </p>
    </div>
    <div id="tab-president">
      <h2>President's Corner</h2>
      <img src="{{ asset('spccweb/img/president.jpg') }}" alt="SPCF President" />
      <h3>Lourdes R. Bustamante</h3>
      <p>President</p>
      <p>Systems Plus Computer Foundation</p>
    </div>
    <div id="tab-hymn">
      <h2>SPCC Hymn</h2>
      <div class="content">
        <p>
          Your vision in our hearts<br />
          Will shine forever more<br />
          We'll walk the halls of Systems Plus<br />
          Until we give our all.
        </p>
        <p>
          The value of your guidance<br />
          The wisdom of your light<br />
          And we will be the children<br />
          Who will live in your loyalty.
        </p>
        <p>
          Commitment to excellence<br />
          That has turned the key<br />
          The promises we made<br />
          Are the dreams we'll <u>ever make</u> (2x)
        </p>
        <p>
          The vision in our hearts<br />
          Will shine forever more<br />
          We'll walk in strength and character<br />
          And love will be at sight.
        </p>
        <p>
          The value of your guidance<br />
          The wisdom of your light<br />
          And we will be the children<br />
          We will be the children (2x)<br />
          Who'll live in loyalty.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- end Info Menu Section -->
@endsection