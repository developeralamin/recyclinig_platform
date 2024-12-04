
<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Recycling.com – Home</title>
  <!-- fav icon -->
  <link rel="icon" href="assets/images/favicon.png" type="image/gif/x-icon"> 
  <!-- meta tag -->
  <meta charset="UTF-8">
  <meta name="author" content="Recycling.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- meta keywords -->
  <meta name="keywords" content="Recycling, child"/>
  <meta name="robots" content="NOODP,index,follow"/>
  <!-- font awesome css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <!-- main stylesheet -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <!-- responsive stylesheet -->
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
  
</head>

<body>

  <div class='thetop'></div>

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
        <h4>Recycling</h4>
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
            <li><a href="#">Home</a></li>
            <li><a class="price-nav" href="#">Price</a></li>
            <li><a href="https://www.medium.com">Blog</a></li>
            <li><a href="#" data-scroll-nav='2'>Contact</a></li>
          </ul>
        </nav>
        <div class="buy-button">
          <a href="#">Buy</a>
        </div>
      </div>
    </div>
  </header>

  <!-- header area end here -->
  <!-- header area end here -->

  <!-- banner area start here -->
  <!-- banner area start here -->
  <section class="banner-area-start">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-all-text">
            <div class="banner-text">
              <h1>Your Home totally bed bug free, Bed bug control.</h1>
            </div>
            <div class="buy-button" style="margin-top: -7px;">
              <a href="#">Buy</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- banner area end here -->
  <!-- banner area end here -->

  <!-- gif one area start here -->
  <!-- gif one area start here -->
  <section class="gif-one-area-start">
    <div class="gif-one-left">
      <img src="{{ asset('frontend/images/gif1.gif') }}" alt="gif">
    </div>
    <div class="gif-one-right">
      <div class="gif-one-right-text">
        <h1>The <span style="text-transform: uppercase; font-family: AauxNext-UltIt;">Recycling</span> detects the slightest <span>odor</span> presence <span>bedbug</span> by sending youa <span>notification.</span></h1>
      </div>
      
    </div>
  </section>
  <!-- gif one area end here -->
  <!-- gif one area end here -->



  <!-- contact area start here -->
  <!-- contact area start here -->
  <section class="contact-area-start" data-scroll-index='2'>
    <div class="contact-left">
      <img src="{{ asset('frontend/images/contact.webp') }}" alt="img">
    </div>
    <div class="contact-right">
      <h1>Contact Us</h1>
      <div class="contact-form">
        <form action="">
          <div class="contact-email">
            <input type="email" name="" id="" placeholder="Email">
          </div>
          <div class="contact-name">
            <div class="contact-first-name">
              <input type="text" name="" id="" placeholder="First name">
            </div>
            <div class="contact-last-name">
              <input type="text" name="" id="" placeholder="Last name">
            </div>
          </div>
          <div class="contact-message">
            <textarea name="" id="" rows="4" placeholder="Message"></textarea>
          </div>
          <div class="contact-submit">
            <input type="submit" value="Send">
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- contact area end here -->
  <!-- contact area end here -->







  <script src=" {{ asset('frontend/js/jquery.min.js') }}"></script>
  <!-- popper min js -->
  <script src=" {{ asset('frontend/js/popper.min.js') }}"></script>
  <!-- bootstrap min js -->
  <script src=" {{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <!-- scroll js -->
  <script src=" {{ asset('frontend/js/scrollIt.min.js') }}"></script>
  <!-- custom js -->
  <script src=" {{ asset('frontend/js/custom.js') }}"></script>

</body>
</html>

