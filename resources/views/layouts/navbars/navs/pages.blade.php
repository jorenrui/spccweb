<!-- Site Header -->
<header class="site-header">
  <div class="logo">
    <a href="index.html">
      <img src="{{ asset('spccweb/img/logo.png') }}" alt="SPCC Logo" />
    </a>
  </div>

  <div class="mobile-nav">
    <a href="javascript:void(0);" class="icon" onclick="toggleNavResponsive()">
      <i id="navIcon" class="fa fa-2x fa-bars"></i>
    </a>
  </div>

  <div id="siteNav" class="site-nav">
    <nav class="nav-portal">
      <ul>
        @auth()
          <li>
            <a href="/profile">
              Welcome, {{ auth()->user()->getName() }}!
            </a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}">
              Return to Portal
            </a>
          </li>
        @endauth
        @guest()
          <li><a href="{{ route('login') }}">Login to Portal</a></li>
        @endguest
      </ul>
    </nav>
    <nav class="nav-main">
      <ul>
        <li class="{{ $title == 'Home' ? 'active' : '' }}">
          <a href="/">home</a>
        </li>
        <li class="{{ $title == 'About' ? 'active' : '' }}">
          <a href="/about">about</a>
        </li>
        <li class="{{ $title == 'News' ? 'active' : '' }}">
          <a href="/news">news</a>
        </li>
        <li class="{{ $title == 'Contact' ? 'active' : '' }}">
          <a href="/contact">contact</a>
        </li>
        <li class="cat {{ $title == 'Admission' ? 'active' : '' }}">
          <a href="/admission">Admission</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
<!-- end Site Header -->