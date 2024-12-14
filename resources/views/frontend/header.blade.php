  @php 
       $participants = App\Models\User::select('users.name', DB::raw('SUM(recycling_participants.count) as total_participation'))
       ->join('recycling_participants', 'users.id', '=', 'recycling_participants.user_id')
       ->where('users.id', Auth::id())
       ->groupBy('users.name', 'users.id')
       ->first();
  @endphp 
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
        <a href="{{ route('how') }}"><img src="{{ asset('frontend/images/_logo.png') }}"></a> 
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
            <!-- <li><a class="price-nav" href="{{ route('recyclingcenter') }}">Nearby Recycling Centers</a></li> -->
            <li><a class="price-nav" href="{{ route('scoreboard') }}">ScoreBoard</a></li>
            <li><a class="price-nav" href="{{ route('about') }}">About</a></li>
          </ul>
        </nav>
     
  <ul class="navbar-nav ml-auto">
              <li>
                  <a href="#" id="" data-toggle="dropdown">
                      @if(Auth::user())
                      <div style="display: flex;gap:20px;">
                      <p style="width: 28px;
    height: 28px;
    background: #6cc090;
    text-align: center;
    line-height: 31px;
    color: white;
    border-radius: 14px;">{{$participants->total_participation}} </p><p>{{ Auth::user()->name }}</p> 
                      </div>
                  
                         <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                      <a class="dropdown-item" href="{{ route('user-profile-view') }}">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Profile
                      </a>
                      <a class="dropdown-item" href="{{ route('user-password-form') }}">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Update Password
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  </div>
                      @else
                        <a href="{{ route('login') }}">Login</a>
                    @endif
                    </span>
                     
                  </a>
               
              </li>
          </ul>

      </div>
    </div>
  </header>
  <!-- header area end here -->
  <!-- header area end here -->
