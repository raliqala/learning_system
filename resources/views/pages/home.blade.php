@extends('layouts.app')

@section('content')
    {{-- <div class="container"> --}}
        {{-- <div class="row justify-content-center"> --}}
            <div class="dashboard-header">
                {{-- <h1>About Us</h1>
                <p class="text">
                    Tholwana is a seed for new and current employees to learn and enrich themselves This system aims to be a
                    foundation of valuable information for employees and encourages them to align themselves with company
                    values. With Tholwano you plant the seed, grow the seed and bloom where you are planted.
                </p> --}}

            </div>
             <!-- ======= About Section ======= -->
      <section id="about">
        <div class="container wow fadeInUp">
          <div class="row">
            <div class="col-md-12">
              <h3 class="section-title">About Us</h3>
              <div class="section-title-divider"></div>
              <p class="section-description">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium, totam rem aperiam
              </p>
            </div>
          </div>
        </div>
        <div class="container about-container wow fadeInUp">
          <div class="row">
            <div class="col-lg-6 about-img">
              <img src="https://cdn.shopify.com/s/files/1/1884/2979/files/grow_form_seed_BLOG_BANNER.jpg?v=1511431269" />
            {{-- //   ../img/about-us.jpg" alt="" /> --}}
            </div>

            <div class="col-md-6 about-content">
              <h2 class="about-title">We All Start Somewhere, we Grow  Together then we Win.</h2>
              <p class="about-text">
                Tholwana is a seed for new and current employees to learn and
                enrich themselves This system aims to be a foundation of
                valuable information for employees and encourages them to align
                themselves with company values.
              </p>
              <p class="about-text">
                With Tholwano you plant the seed, grow the seed, water the seed,
                blossom, be there best fruit you can be and in turn, enrich
                other fruits.
              </p>
             
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section -->
            <div class="departments">
                <section id="services">
                    <div class="container wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="section-title">Our Departments</h3>
                                <div class="section-title-divider"></div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 service-item">
                                <div class="service-icon"><i class="fa fa-desktop"></i></div>
                                <h4 class="service-title"><a href="/it_department">IT Department</a></h4>
                                <p class="service-description">
                                    Voluptatum deleniti atque corrupti quos dolores et quas
                                    molestias excepturi sint occaecati cupiditate non provident
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6 service-item">
                                <div class="service-icon"><i class="fa fa-bar-chart"></i></div>
                                <h4 class="service-title"><a href="/customer_department">Customer Service</a></h4>
                                <p class="service-description">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6 service-item">
                                <div class="service-icon"><i class="fa fa-paper-plane"></i></div>
                                <h4 class="service-title"><a href="/creative_department">Creative</a></h4>
                                <p class="service-description">
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est laborum
                                </p>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        {{-- </div> --}}
    @endsection
