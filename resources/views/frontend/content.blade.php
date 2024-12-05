@extends('frontend.main')
@section('content')

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
            <!-- <div class="buy-button" style="margin-top: -7px;">
              <a href="#">Login</a>
            </div> -->
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

  @endsection