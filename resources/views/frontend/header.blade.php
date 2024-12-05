  <!-- header area start here -->
  <!-- header area start here -->
  <header class="header-area-start">
    <div class="header-top">
      <div class="header-top-left">
        <button id="menu" class="nav-toggle">
          <span class="ico">
            <span class="mask"></span>
          </span>
        </button>
        <!-- <h4>Recycling</h4> -->
        <a href="{{ url('') }}"><img src="{{ asset('frontend/images/_logo.png') }}"></a> 
      </div>
      <div class="header-top-center">
        <p>Welcome on&nbsp;<a href="#">Recycling.co</a></p>
      </div>
      <div class="">
        <!-- <img src="assets/images/man.png" alt="icon"> -->
        <!-- <a href="#">My account</a> -->
      </div>
    </div>
    <div class="header-menu-area">
      <div class="header-menu-single">
        <nav class="header-nav">
          <ul>
            <li><a href="{{ route('how') }}">How to Recycle</a></li>
            <li><a class="price-nav" href="{{ route('category') }}">Category</a></li>
            <li><a class="price-nav" href="{{ route('recyclingcenter') }}">Nearby Recycling Centers</a></li>
            <li><a class="price-nav" href="{{ route('scoreboard') }}">ScoreBoard</a></li>
            <li><a class="price-nav" href="{{ route('about') }}">About</a></li>
          </ul>
        </nav>
        <div class="buy-button">
          @if(Auth::user())
          <a href="{{ route('logout') }}">{{ Auth::user()->name }}</a>
          @else 
          <a href="{{ route('login') }}">Login</a>
          @endif
        </div>
      </div>
    </div>
  </header>
  <!-- header area end here -->
  <!-- header area end here -->
