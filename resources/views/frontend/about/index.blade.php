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
                  <!-- Card with image -->
              <div class="cardAbout">
                <div class="card-bodyabout">
                  <h5 class="about-title">About the Project</h5>
                  <p class="about-text">
                  This platform was created for the GDSC Solution Challenge 2024 to raise awareness of the 
                  importance of the recycling through gamification, visuals and information available on
                   the website. We want to show people that their everyday items might be a lot dangerous
                    to the environment then they think. We wanted to keep things as
                   simple as possible so everybody can understand it. The information is gathered
                    from various sources and the platform is designed to be easily accessible and usable on mobile devices. We are trying to help people realize the problem and solve the following 
                  </p>
                  <div class="about-img">
                    <img src="{{ asset('frontend/images/clmate.png') }}">
                  </div>
                  <a href="https://sdgs.un.org/goals" class="btnabout btn btn-primary">Learn More</a>
                </div>
              </div>
              <!-- End of Card -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection