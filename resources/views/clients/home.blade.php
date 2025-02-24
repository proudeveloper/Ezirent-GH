@extends('clients.layouts.app')

@php
    $segments = Request::segment(0);


    // echo '<h1>'.$segments.'</h1>';
@endphp

@section('style')
    <style>
      .team_imgs {
        height: 28em; 
        width: 100%; 
        object-fit: cover; 
        object-position: center;
      }
    </style>
@endsection


@section('content')
    

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center pay_rent_p" data-aos="fade-in">
              <h1 class="mainfront">Pay Your</h1>
              <h1 class="mainfront">Rent <span class="typewriter_auto"></span></h1>
              <p>Ezirent offers you convenient renting solutions allowing you decent accommodations with little to no landlord wahala. Simply choose your preferred payment plan.</p>
              
              <div class="d-flex">
                <a href="{{ url('tenant/apply')}}" class="btn-get-started"><i class="fa fa-arrow-circle-right icons" aria-hidden="true"></i> Apply Now</a>
              </div>

            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img hanging_img" data-aos="zoom-out" data-aos-delay="100">
              <img src="{{ url('public/assets/img/bg/inner_home.png') }}" class="img-fluid animated" alt="">
            </div>
          </div>
  
  
          <!-- Gallery Section -->
          <section id="gallerys" class="gallerys section top_swiper_imgs">
  
          
            <div class="container" data-aos="fade-up" data-aos-delay="100">
    
                <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "centeredSlides": true,
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 0
                        },
                        "768": {
                        "slidesPerView": 3,
                        "spaceBetween": 20
                        },
                        "1200": {
                        "slidesPerView": 5,
                        "spaceBetween": 20
                        }
                    }
                    }
                </script>
                <div class="swiper-wrapper align-items-center ">
                    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                            <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                                <div class="card">
                                <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                                <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                    <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                    
                                    <div class="owner_loc">
                                      <div class="row">
                                          <div class="col-4">
                                          <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                          
                                          </div>
                                          
                                          <div class="col-4">
                                          <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                          
                                          </div>
          
                                          <div class="col-4">
                                          <i class="loc_icons">¢ </i> 500 / Month
                                          
                                          </div>
          
                                      </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                          </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
    
                    <div class="swiper-slide">
                      <div class="row justify-content-center swipe_container">
                          <div class="col-12">
                          <a class="glightbox" data-gallery="images-gallery" href="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}">
                              <div class="card">
                              <img class="card-img rounded" src="{{ url('public/assets/img/swiper_top/property1-ch1nL-WL.jpg') }}" alt="">
                              <div class="card-img-overlayd-flex flex-column swipe_text_bottom_container">
                                  <h4 class="card-title">Furnished 2 bedroom house with self meter</h4>
                                  
                                  <div class="owner_loc">
                                  <div class="row">
                                      <div class="col-4">
                                      <i class="fa fa-map-marker loc_icons" aria-hidden="true"></i> East Legon
                                      
                                      </div>
                                      
                                      <div class="col-4">
                                      <i class="fa fa-user loc_icons" aria-hidden="true"></i> Peter Griffen
                                      
                                      </div>
      
                                      <div class="col-4">
                                      <i class="loc_icons">¢ </i> 500 / Month
                                      
                                      </div>
      
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </a>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                </div>
    
            </div>
    
          </section>
          <!-- /Gallery Section -->
  
  
          <div class="row">
            <div class="col-12 order-2 order-lg-1 d-flex justify-content-center btn_listing_apply ">
              <a href="{{ url('tenant/apply')}}" class="btn_apply">Apply Now</a>
              <a href="{{ url('/overview') }}" class="btn_browse">Browse Listings</a>
            </div>
          </div>
        </div>
  
    </section>
    <!-- /Hero Section -->
  
  
      
    <!-- About Us Section -->
    <section id="about_us" class="pricing features services section">

      <!-- Section About Us -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p>We make renting a decent home easy, affordable, and accessible for everyone.</p>

      </div><!-- End Section About Us -->

      <div class="container">

        
        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Who We Are</h3>
            <p>
              We are united by a common goal which is to empower tenants and landlords across Africa with innovative, personalized housing solutions. 
              We are a team of dedicated individuals who tackle challenges head-on, stay committed to our mission, and are not afraid to get involved.
              We are here for the long haul, committed to creating a future where everyone has access to quality housing and the opportunity to build lasting legacies.
            </p>
            {{-- <ul>
              <li>
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                  <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                </div>
              </li>
              <li>
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
              <li>
                <i class="bi bi-broadcast"></i>
                <div>
                  <h5>Voluptatem et qui exercitationem</h5>
                  <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
                </div>
              </li>
            </ul> --}}
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>What We Do</h3>
            <p>
              Ezirent simplifies renting in Africa. We empower tenants with flexible payment options, allowing them to pay rent daily, weekly, or monthly.
              Say goodbye to hefty rent rent advance payments! 
              We also connect tenants with decent rental accommodation, and landlords with reliable tenants.
              With Ezirent, you can trust that every aspect of the rental process is taken care of. 

            {{-- </p>
            <ul>
              <li>
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                  <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                </div>
              </li>
              <li>
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
              <li>
                <i class="bi bi-broadcast"></i>
                <div>
                  <h5>Voluptatem et qui exercitationem</h5>
                  <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
                </div>
              </li>
            </ul> --}}
          </div>


          <div class="row gy-4">
            <!-- Our Vision -->
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
              <div class="pricing-item featured">
                <h3>Our Vision</h3>
                <p>To become a leading rent service provider, dependable and trusted for excellence.</p>
              </div>
            </div>
            <!-- End Our Vision -->
  
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
              <div class="pricing-item featured">
                <h3>Our Mission </h3>
                <p>Innovate customer-friendly services and products tailored to the needs of tenants.
                  Provide comfort and lasting experience for tenants in the country. Bridge the gap between formal and informal sector workers to access decent accommodation.</p>
              </div>
            </div>
            <!-- End Pricing Item -->
  
          </div>

          <!-- Core Values -->
          <div class="row gy-4 align-items-center features-item core_values">
            <div class="col-md-5 mb-3 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
              <div class="" data-aos="zoom-in" data-aos-delay="300">
                
                <img src="{{ url('public/assets/img/bg/core_values.jpg') }}" alt="Desmond Arhin-Tutu">
            
              </div>
            </div>
            <div class="col-md-7 mb-3" data-aos="fade-up" data-aos-delay="100">
              <h3>Core values</h3>
              <p class="fst-italic">
                Our committment to integrity, Excellence and Transparency ensure a top-notch home rental experience with honesty, exceptional service delivery, and clear communication.
              </p>
              <ul>
                <li><i class="ri-check-line"></i>Intergrity: We uphold the highest standards of honesty and fairness in every interaction.</li>
                <li><i class="ri-check-line"></i>Excellence: We strive to deliver the best home rental experience through innovation and quality service.</li>
                <li><i class="ri-check-line"></i>Transparency: We ensure clear, open communication, providing you with the information you need at every step.</li>
              </ul>
            </div>
          </div>
          <!-- End Core Values -->

          
          <!-- How It Works -->
          <h3>How It Works</h3>
          <p>Getting affordable renting solution couldn't have gotten any simpler. Ezirent offer you a 3 steps approach to solving your home rental issues.</p>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                1
              </div>
              <a href="javascript:void(0);" class="stretched-link">
                <p>STEP ONE</p>
                <h3>Application</h3>
              </a>
              <p>Signup to submit your application and particulars on the property you want to rent.</p>
            </div>
          </div>
          <!-- End How It Works -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                2
              </div>
              <a href="javascript:void(0);" class="stretched-link">
                <P>STEP TWO</P>
                <h3>Verification</h3>
              </a>
              <p>Your submitted documents will be reviewed and verified by our team.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                3
              </div>
              <a href="javascript:void(0);" class="stretched-link">
                <P>STEP THREE</P>
                <h3>Payment</h3>
              </a>
              <p>Upon successfull verification, Ezirent will fulfilled your rent's needs in less than 72 hours.</p>
            </div>
          </div><!-- End Service Item -->


          <div class="col-12 order-2 order-lg-1 d-flex btn_listing_apply" data-aos="fade-up" data-aos-delay="500">
            <a href="#rentCalculatorModal" data-bs-toggle="modal" class="btn_apply">Check if you qualify for rent support</a>

          </div>
          
        </div>

        {{--                 
        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Who We Are</h3>
            <p>
              We are united by a common goal which is to empower tenants and landlords across Africa with innovative, personalized housing solutions. 
              We are a team of dedicated individuals who tackle challenges head-on, stay committed to our mission, and are not afraid to get involved.
              We are here for the long haul, committed to creating a future where everyone has access to quality housing and the opportunity to build lasting legacies.
            </p>
      
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>What We Do</h3>
            <p>
              Ezirent simplifies renting in Africa. We empower tenants with flexible payment options, allowing them to pay rent daily, weekly, or monthly.
              Say goodbye to hefty rent rent advance payments! 
              We also connect tenants with decent rental accommodation, and landlords with reliable tenants.
              With Ezirent, you can trust that every aspect of the rental process is taken care of. 

          </div>

          <h3>How It Works</h3>
          <p>Getting affordable renting solution couldn't have gotten any simpler. Ezirent offer you a 3 steps approach to solving your home rental issues.</p>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                1
              </div>
              <a href="https://bootstrapmade.com/content/demo/Bocor/service-details.html" class="stretched-link">
                <p>STEP ONE</p>
                <h3>Application</h3>
              </a>
              <p>Signup to submit your application and particulars on the property you want to rent.</p>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                2
              </div>
              <a href="https://bootstrapmade.com/content/demo/Bocor/service-details.html" class="stretched-link">
                <P>STEP TWO</P>
                <h3>Verification</h3>
              </a>
              <p>Your submitted documents will be reviewed and verified by our team.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                3
              </div>
              <a href="https://bootstrapmade.com/content/demo/Bocor/service-details.html" class="stretched-link">
                <P>STEP THREE</P>
                <h3>Payment</h3>
              </a>
              <p>Upon successfull verification, Ezirent will fulfilled your rent's needs in less than 72 hours.</p>
            </div>
          </div><!-- End Service Item -->


            <div class="col-12 order-2 order-lg-1 d-flex btn_listing_apply" data-aos="fade-up" data-aos-delay="500">
              <a href="#rentCalculatorModal" data-bs-toggle="modal" class="btn_apply">Check if you qualify for rent support</a>

            </div>

        </div> --}}

      </div>

    </section><!-- /Features Section -->

      


    <!-- Stats Section -->
    <section id="our_numbers" class="stats section dark-background the_numbers">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 ">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <div class="stats-item">
              <div class="col-12" data-aos="zoom-out" data-aos-delay="200">
                <h2>Let Numbers Tell</h2>
                <h3><span>Our Success Stories</span></h3>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="mdi mdi-clipboard-text-clock-outline" aria-hidden="true"></i>
            <div class="stats-item d-flex flex-column align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter">625423</span>
              <p>Application Processed</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="mdi mdi-emoticon-outline" aria-hidden="true"></i>
            <div class="stats-item d-flex flex-column align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter">89726</span>
              <p>Happy Customers</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="mdi mdi-home-city" aria-hidden="true"></i>
            <div class="stats-item d-flex flex-column align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter">48665</span>
              <p>Properties Moved</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section>
    <!-- /Stats Section -->

  
  
  
  
    <!-- Why Choose EziRent Section -->
    <section id="features" class="features section dark-background">
  
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>Features</h2>
      <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
      </div><!-- End Section Title -->

      <div class="container">

          <div class="row gy-4 align-items-center features-item">
              <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
              <img src="{{ url('public/assets/img/misc/C4VCBbc7.png') }}" class="img-fluid" alt="">
              </div>
              <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
              <h1 class="fw-bold">Why you should choose Ezirent</h1>
              <h4 class="mt-3">At Ezirent, we make renting houses simple and stress-free. Our wide range of affordable renting solutions ensures you get comfortable, quality accommodation without any hassle.</h4>
              <ul class="mt-4 pt-4">
                  
                  <li class="d-flex align-items-center h5 mt-2 "><i class="fa fa-check why_icons" aria-hidden="true"></i> Affordability</li>
                  <li class="d-flex align-items-center h5 mt-2 "><i class="fa fa-check why_icons" aria-hidden="true"></i> Fast Processing</li>
                  <li class="d-flex align-items-center h5 mt-2 "><i class="fa fa-check why_icons" aria-hidden="true"></i> Tenant Protection</li>
                  <li class="d-flex align-items-center h5 mt-2 "><i class="fa fa-check why_icons" aria-hidden="true"></i> Tenant Advisory Service</li>
                  <li class="d-flex align-items-center h5 mt-2 "><i class="fa fa-check why_icons" aria-hidden="true"></i> Convenient Rent Payment</li>
                  
              </ul>

              <div class="d-flex">
                  <div class="row learn_more_btn">
                    <a href="#" class="primary-color h4 fw-bold">
                        <i class="fa fa-arrow-right icons" aria-hidden="true"></i> Learn more about our Rental Solutions
                    </a>
                  </div>
              </div>
            </div>
          </div><!-- Features Item -->

      </div>

    </section>
    <!-- /Why Choose EziRent Section -->



    <!-- Partners Section -->
    <section id="our_partners" class="clients section light-background" data-aos="fade-up" data-aos-delay="100">

      {{-- <div class="container section-title" data-aos="fade-up">
        <h2>Our Partners</h2>
      </div> --}}

      <div class="container">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center d-flex justify-content-center">
            <div class="swiper-slide"><img src="{{ url('public/assets/img/partners/hubtel.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('public/assets/img/partners/TJWricketts.jpg') }}" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section>
    <!-- /Partners Section -->


 
  
  
    <!-- Team Section -->
    <section id="our_team" class="team section" data-aos="fade-up" data-aos-delay="100">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>Meet Our Team</h2>
          <p>At Ezirent, our dedicated team is the driving force behind our committment to making renting convenient and easily accessible. Get to know the talented individuals who work tirelessly to deliver top notch services and innovative solutions.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="team-member">
              <div class="member-img">
                  <img src="{{ url('public/assets/img/teams/denis.png') }}" class="img-fluid team_imgs" alt="">
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Dennis Boakye Yiadom</h4>
                  <span>Founder / Chief Executive Officer</span>
              </div>
              </div>
          </div><!-- End Team Member -->

          
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="team-member">
              <div class="member-img">
                  <img src="{{ url('public/assets/img/teams/sam.png') }}" class="img-fluid team_imgs" alt="">
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Rev. Samuel Newman Gilberts</h4>
                  <span>Co-founder / Technical Officer</span>
              </div>
              </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="team-member">
              <div class="member-img">
                  <img src="{{ url('public/assets/img/teams/team-3.jpg') }}" class="img-fluid team_imgs" alt="">
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Lawrens Essel</h4>
                  <span>CTO</span>
              </div>
              </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="team-member">
              <div class="member-img">
                  <img src="{{ url('public/assets/img/teams/team-4.jpg') }}" class="img-fluid team_imgs" alt="">
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Rashid Amoah</h4>
                  <span>Accountant</span>
              </div>
              </div>
          </div><!-- End Team Member -->

          </div>

      </div>

    </section>
    <!-- /Team Section -->


      
  
    <!-- Board Section -->
    <section id="our_board" class="team section" data-aos="fade-up" data-aos-delay="100">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>Board Of Directors</h2>
               </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="team-member">
              <div class="member-img">
                <div class="card">
                    <img class="img-fluid bg-light rounded team_imgs" src="{{ url('public/assets/img/teams/RevJustice.jpg') }}" alt="images" alt="images">
                </div>
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Rev. Justice Sagoe CE</h4>
                  <span>Board Chairman</span>
              </div>
              </div>
          </div><!-- End Team Member -->

        
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="team-member">
              <div class="member-img">
                  <div class="card">
                      <img class="img-fluid bg-light rounded team_imgs" src="{{ url('public/assets/img/teams/BernardBempong.jpg') }}" alt="images" alt="images">
                  </div>
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Bernard Bempong CA PMI</h4>
                  <span>Board Member
                  </span>
              </div>
              </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="team-member">
              <div class="member-img">
                  <div class="card">
                      <img class="img-fluid bg-light rounded team_imgs" src="{{ url('public/assets/img/teams/fredOpoku.jpg') }}" alt="images" alt="images">
                  </div>
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Frederick Opoku SG</h4>
                  <span>Board Member</span>
              </div>
              </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="team-member">
              <div class="member-img">
                  <div class="card">
                      <img class="img-fluid bg-light rounded team_imgs" src="{{ url('public/assets/img/teams/denis.png') }}" alt="images" alt="images">
                  </div>
                  <div class="social">
                  <a href="#"><i class="ri-twitter-x-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"><i class="ri-linkedin-fill"></i></a>
                  </div>
              </div>
              <div class="member-info">
                  <h4>Dennis Boakye Yiadom</h4>
                  <span>Founder / Chief Executive Officer</span>
              </div>
              </div>
          </div><!-- End Team Member -->

          </div>

      </div>

    </section>
    <!-- /Team Section -->

        

  
    <!-- Testmonials Section -->
    <section id="testmonials" class="testmonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials from <span>our Customers</span></h2>
        <p>Read what tenants and property owners have to say about their experience with Ezirent."</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

       
          @foreach ($getTesimonials as $testimonial)

            @php
                $user_type = '';

                if ($testimonial->user_type == 1) {
                  $user_type = 'Tenant';
                } elseif ($testimonial->user_type == 2) {
                  $user_type = 'Landlord';
                }

            @endphp

            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="card rating-box">
                <div class="card-body">
                  <div class="mb-3">
                    <input id="{{ $testimonial->id }}" class="testimonial_rate" type="hidden" name="" value="{{ $testimonial->rating_value }}">
                    <div id="testimonial_rate_{{ $testimonial->id }}" class="testimonial_rate_not"  data-rateyo-read-only="true" data-rating_val="{{ $testimonial->rating_value }}"></div>
                  </div>

                  <p class="text-muted fw-bold card-text">{{ $testimonial->message }}</p>

                  <div class="row">
                    <div class="d-flex align-items-center mb-3">
                      <img src="{{ url('public/assets/img/misc/150.png') }}" alt=">{{ $testimonial->created_by_fname.' '.$testimonial->created_by_lname }}" class="rounded-circle me-3" width="50" height="50">
                      <div>
                        <h5 class="mb-0 primary-color fw-bold"><span>{{ $testimonial->created_by_fname.' '.$testimonial->created_by_lname }}</span></h5>
                        <p class="mb-0">{{ $user_type }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Testimony Item -->

          @endforeach

{{-- 
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card rating-box">
              <div class="card-body">
                <div class="mb-3">
                  <div class="testimonial_rate"  data-rateyo-read-only="true" data-rating_val="3.5"></div>
                </div>

                <p class="text-muted fw-bold card-text">The customer support at Ezirent is top-notch. They're always responsive and helpful whenever we have questions or issues.</p>

                <div class="row">
                  <div class="d-flex align-items-center mb-3">
                    <img src="{{ url('public/assets/img/misc/150.png') }}" alt="Desmond Arhin-Tutu" class="rounded-circle me-3" width="50" height="50">
                    <div>
                      <h5 class="mb-0 primary-color fw-bold"><span>Desmond Arhin-Tutu</span></h5>
                      <p class="mb-0">Tenant</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Testimony Item -->
 --}}

        </div>

      </div>
  
    </section>
    <!-- /Testimonials Section -->
 

   


    
      
    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3>Frequently Asked <strong><span>Questions</span></strong></h3>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
             
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>How does Ezirent work?</span></h3>
                <div class="faq-content">
                  <p>Ezirent works in two ways:
                  You find your own rental unit and then let us know about it. Ezirent will assist with your rent advance while you choose a flexible payment schedule, allowing you to pay your rent WEEKLY or MONTHLY.</p>
                </div>
                <i class="faq-toggle mdi mdi-chevron-right"></i>
                <!-- <i class="faq-toggle mdi mdi-plus"></i> -->
                <!-- <i class="faq-toggle ri-arrow-drop-right"></i> -->
                <!-- <i class="faq-toggle bi bi-chevron-right"></i> -->
              </div><!-- End Faq item-->


              <div class="faq-item">
                <h3><span class="num">2.</span> <span>What supporting documents do I have to submit?</span></h3>
                <div class="faq-content">
                  <p>Proof of Identity Document (Ghana Card), Proof of Employment or Business Operation, Payslips, Financial Statement (Bank / Momo).</p>
                </div>
                <i class="faq-toggle mdi mdi-chevron-right"></i>
                <!-- <i class="faq-toggle mdi mdi-plus"></i> -->
                <!-- <i class="faq-toggle ri-arrow-drop-right"></i> -->
                <!-- <i class="faq-toggle bi bi-chevron-right"></i> -->
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>How long does the process take?</span></h3>
                <div class="faq-content">
                  <p>Not more than 3 days after your application gets approved,</p>
                </div>
                <!-- <i class="faq-toggle ri-arrow-drop-right"></i> -->
                <i class="faq-toggle mdi mdi-chevron-right"></i>
                <!-- <i class="faq-toggle bi bi-chevron-right"></i> -->
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Is it for only salaried workers?</span></h3>
                <div class="faq-content">
                  <p>  Ezirent is for all. With a PROOF of regular & sustainable flow of income. Anyone who can provide that proof is a potential Ezirent customer. Your monthly net income should be at least 3 times the monthly rent..</p>
                </div>
                <i class="faq-toggle mdi mdi-chevron-right"></i>
                <!-- <i class="faq-toggle ri-arrow-drop-right"></i> -->
                <!-- <i class="faq-toggle bi bi-chevron-right"></i> -->
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">5.</span> <span>Does Ezirent own the rental units?</span></h3>
                <div class="faq-content">
                  <p>NO. Ezirent does not own the houses. We only facilitate flexible rent payments.</p>
                </div>
                <i class="faq-toggle mdi mdi-chevron-right"></i>
                <!-- <i class="faq-toggle bi bi-chevron-right"></i> -->
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">6.</span> <span>How do I make my flexible rent repayments?</span></h3>
                <div class="faq-content">
                  <p>You pay the rent through Ezirent's USSD Code, Your Tenant Dashboard or Mobile App (coming soon) using either your mobile money or bank account. It is a simple process..</p>
                </div>
                <i class="faq-toggle mdi mdi-chevron-right"></i>
                <!-- <i class="faq-toggle bi bi-chevron-right"></i> -->
              </div><!-- End Faq item-->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          
          <div class="col-lg-6">
            <form action="{{ url('https://bootstrapmade.com/content/demo/Bocor/forms/contact.php') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->


          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                <iframe src="{{ url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.2073677715375!2d-0.13610232421656807!3d5.683141432356457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf83217aa33937%3A0x10d1d91fb364d239!2sAshaley%20Botwe%20Old%20Town%20Park!5e0!3m2!1sen!2sgh!4v1728424203444!5m2!1sen!2sgh') }}" width="600" height="450" style="border:0; width: 100%; height: 200px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
              </div><!-- End Google Maps -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="mdi mdi-phone"></i>
                  <h3>Call / Email Us</h3>
                  <p>(+233) 555 775 822 / (+233) 598 557 462</p>
                  
                  <p>info@ezirentgh.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="mdi mdi-mailbox-open-up-outline"></i>
                  <h3>Write To Us</h3>
                  <p>Accra, P.O.Box OS 1535</p>
                  <p>Osu, Ghana</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- /Contact Section -->
    

    

    @endsection

    
    @section('script')

    
      <!-- For Auto Typing -->
      <script src="{{ url('public/assets/dist/typed.umd.js') }}"></script>

      <script src="{{ url('public/assets/js/ezilanding.js') }}"></script>

    @endsection