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
                            <img src="https://www.eu-startups.com/wp-content/uploads/2020/03/online-learning.png" />
                            {{-- // ../img/about-us.jpg" alt="" />
                            --}}
                        </div>

                        <div class="col-md-6 about-content">
                            <h2 class="about-title">We All Start Somewhere, we Grow Together then we Win.</h2>
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
                                <h4 class="service-title"><a href="/it-page">IT Department</a></h4>
                                <p class="service-description">
                                    The IT department is responsible for the architecture, hardware, software, and
                                    networking of computers at YIYA. Our IT departments includes front and back end
                                    developers who are responsible for the development and building of computer systems
                                    software and applications software at YIYA
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6 service-item">
                                <div class="service-icon"><i class="fa fa-shopping-bag"></i></div>
                                <h4 class="service-title"><a href="">Human Reasource</a></h4>
                                <p class="service-description">
                                    The Human resources is responsible for the management and development of employees at
                                    YIYA. Some HR responsibilities include but are not limited to the recruitment,
                                    interviewing, training, and payroll of employees.
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6 service-item">
                                <div class="service-icon"><i class="fa fa-bar-chart"></i></div>
                                <h4 class="service-title"><a href="">Customer Service</a></h4>
                                <p class="service-description">
                                    The customer service department is largely responsible for establishing and cementing
                                    the relationship of the company with customers and future customers.
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6 service-item">
                                <div class="service-icon"><i class="fa fa-paper-plane"></i></div>
                                <h4 class="service-title"><a href="">Creative</a></h4>
                                <p class="service-description">
                                    The creative department is responsible for creating a consistent brand image for the
                                    YIYA through its look, voice, brand messaging. The creating department includes content
                                    writers, social media specialist graphic designers and digital marketing specialists
                                    respectively.
                                </p>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            {{--
        </div> --}}
    @endsection
