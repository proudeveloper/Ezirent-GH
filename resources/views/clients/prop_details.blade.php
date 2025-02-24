@extends('clients.layouts.app')

@php
    $segments = Request::segment(2);


    $myArray = array();

    for ($i=0; $i < 5; $i++) { 
        $myArray[] = $i+1;
    }

@endphp


@section('style')

    
   <!-- font -->
   <link rel="stylesheet" href="{{ url('public/new/css/jquery.fancybox.min.css') }}">
   <link rel="stylesheet" href="{{ url('public/new/css/animate.css') }}">
   <link rel="stylesheet"type="text/css" href="{{ url('public/new/css/styles.css') }}"/>

   <link href="{{ url('public/assets/css/prop_detail.css') }}" rel="stylesheet">

@endsection


@section('content')
    


    <!-- Page Title -->
    <div class="page-title dark-background overview">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Title -->

  
            

    <section class="flat-section-v6 flat-property-detail-v4">
        <div class="container">
            <div class="header-property-detail">
                <div class="content-top d-flex justify-content-between align-items-center">
                    <div class="box-name">
                        <a href="#" class="flag-tag primary">For {{ $getSingleProperty->rent_type }}</a>
                        <h4 class="title link">{{ $getSingleProperty->name }}</h4>
                    </div>
                    <div class="box-price d-flex align-items-center">
                        <h4 class="currency-ghs">{{ $getSingleProperty->rent_amount }}</h4>
                        <span class="body-1 text-variant-1">{{ $getSingleProperty->rent_type == 'Rent' ? '/month' : '' }}</span>
                    </div>
                </div>
                <div class="content-bottom">
                    <div class="info-box">
                        <div class="label">FEATURES:</div>
                        <ul class="meta">
                            <li class="meta-item"><span class="icon icon-bed"></span> {{ $getSingleProperty->bedroom }} Bedroom</li>
                            <li class="meta-item"><span class="icon icon-bathtub"></span> {{ $getSingleProperty->bathroom }} Bathroom</li>
                            <li class="meta-item"><span class="mdi mdi-sofa"></span> {{ $getSingleProperty->livingroom }} Living room</li>
                        </ul>
                    </div>
                    <ul class="icon-box">
                        <li><a href="#" class="item"><i class="icon fa fa-arrows-h" aria-hidden="true"></i> </a></li>
                        <li><a href="#" class="item"><i class="icon fa fa-share-alt" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="item"><i class="icon fa fa-heart" aria-hidden="true"></i></a></li>
                    </ul>

                </div>
            </div>
            <div class="single-property-gallery">
                <div class="position-relative">
                    <div class="swiper sw-single">
                        <div class="swiper-wrapper">

                            @foreach ($getPropertyImgs as $prop_img)
                            
                                <div class="swiper-slide" style="height: 80vh;">
                                    <div class="image-sw-single col-lg-12 col-md-6 portfolio-item d-inline-block" >
                                        <div class="card">
                                            <img class="img-fluid bg-light rounded" src="{{ url($prop_img->getPropImages()) }}" style="height: 50em; width: 100%; object-fit: cover; object-position: center;" alt="images" alt="images">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        
                    </div>
                    <div class="box-navigation">
                        <div class="navigation swiper-nav-next nav-next-single"><span class="icon fa fa-chevron-left" aria-hidden="true"></span></div>
                        <div class="navigation swiper-nav-prev nav-prev-single"><span class="icon fa fa-chevron-right" aria-hidden="true"></span></div> 
                    </div>
                </div>
                
                <div thumbsSlider="" class="swiper thumbs-sw-pagi">
                    <div class="swiper-wrapper">

                        @foreach ($getPropertyImgs as $prop_img)
                            
                            <div class="swiper-slide">
                                <div class="img-thumb-pagi">
                                    <img class="img-fluid bg-light rounded" src="{{ url($prop_img->getPropImages()) }}" style="height: 10em; width: 100%; object-fit: cover; object-position: center;" alt="images">
                                </div>
                            </div>
                        @endforeach

                   
                    </div>
                </div>
            </div>
            <div class="single-property-element single-property-desc">
                <div class="h7 title fw-7">Description</div>
                <p class="body-2 text-variant-1">{{ $getSingleProperty->descriptions }}</p>
                <a href="#" class="btn-view"><span class="text">View More</span> </a>
            </div>
            <div class="single-property-element single-property-overview">
                <div class="h7 title fw-7">Overview</div>
                <ul class="info-box">
                    
                    <li class="item">
                        <a href="#" class="box-icon w-52"><i class="icon fa fa-arrows-h"></i></a>
                        <div class="content">
                            <span class="label">Type:</span>
                            @php
                                // $getPropType
                                $propType = array();
                                $catPropVal = '';

                                foreach ($getPropType as $prop_type) {
                                    if ($getSingleProperty->prop_category_id == $prop_type->id) {
                                        $catPropVal = $prop_type->name;
                                    }
                                    $propType [] = $prop_type;
                                }
                            @endphp
                            <span>{{ $catPropVal }}</span>
                        </div>
                    </li>
                    <li class="item">
                        <a href="#" class="box-icon w-52"><i class="icon fa fa-bed"></i></a>
                        <div class="content">
                            <span class="label">Bedrooms:</span>
                            <span>{{ $getSingleProperty->bedroom }} Rooms</span>
                        </div>
                    </li>
                    <li class="item">
                        <a href="#" class="box-icon w-52"><i class="icon fa fa-bath"></i></a>
                        <div class="content">
                            <span class="label">Bathrooms:</span>
                            <span>{{ $getSingleProperty->bathroom }} Rooms</span>
                        </div>
                    </li>
                    
                </ul>
            </div>
            
            <div class="single-property-element single-property-info">
                <div class="h7 title fw-7">Property Details</div>
                <div class="row">
                    <div class="col-md-4">
                      
                        <div class="inner-box">
                            <span class="label">Price:</span>

                            <div class="box-price d-flex align-items-center">
                                <div class="content fw-7 currency-ghs">{{ $getSingleProperty->rent_amount }}</div>
                                <span class="caption-1 fw-4 text-variant-1">{{ $getSingleProperty->rent_type == 'Rent' ? '/month' : '' }}</span>
                            </div>
                           
                        </div>
                       
                        <div class="inner-box">
                            <span class="label">Property Type:</span>
                            <div class="content fw-7">{{ $catPropVal }}</div>
                        </div>
                        <div class="inner-box">
                            <span class="label">Property Status:</span>
                            <div class="content fw-7">For {{ $getSingleProperty->rent_type }}</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="single-property-element single-property-feature">
                <div class="h7 title fw-7">Amenities and features</div>
                <div class="wrap-feature">
                    <div class="box-feature">
                        <div class="fw-7">Home safety:</div>
                        <ul>
                            
                            @php

                                function checkVal($myVal, $valName, $icons) {
                                    if ($myVal == 1) {
                                        $show_ament = '<li class="feature-item">
                                                    <span class="icon icon-'.$icons.'"></span>
                                                    '.$valName.'
                                                </li>';

                                    return $show_ament;
                                    }

                                
                                }

                                
                                
                                $furnished = checkVal($getSingleProperty->furnished, 'Furnished Home', 'lockbox');
                                $pets = checkVal($getSingleProperty->pets_allowed, 'Pets Allowed', 'carbon');
                                $smoke = checkVal($getSingleProperty->smoking, 'Can Smoke', 'smoke-alarm');
                                $separate_meter = checkVal($getSingleProperty->separate_meter, 'You Have A Separate Meter', 'pillows');
                                $shared_amen = checkVal($getSingleProperty->shared_amen, 'Shared Amenties', 'pillows');
                                $swim_pool = checkVal($getSingleProperty->swim_pool, 'Swimming Pool', 'pillows');
                                $gym = checkVal($getSingleProperty->gym, 'Gym', 'smoke-alarm');

                                $homeAmen = array($furnished, $pets, $smoke, $separate_meter, $shared_amen, $swim_pool, $gym);




                                ///////////////////////////////////////////         Bedroom      /////////////////////////////////////////////////
                                $laundry_room = checkVal($getSingleProperty->laundry_room, 'Laundry Room', 'iron');
                                $wifi = checkVal($getSingleProperty->wifi, 'WiFi Installed', 'tv');
                                $garage = checkVal($getSingleProperty->garage, 'Store room Or Garage', 'carbon');
                                $tv_cable = checkVal($getSingleProperty->tv_cable, 'Cable TV', 'tv');
                                $air_con = checkVal($getSingleProperty->air_con, 'Air Conditioned', 'lockbox');

                                $bedrooms = array($laundry_room, $wifi, $garage, $tv_cable, $air_con);



                                //////////////////////////////////////////////     KITCHEN  //////////////////////////////////////////////////////
                                $fridge = checkVal($getSingleProperty->fridge, 'Refrigerator', 'microwave');
                                $microwave = checkVal($getSingleProperty->microwave, 'Store room Or Garage', 'microwave');
                                $fitted_kitchen = checkVal($getSingleProperty->fitted_kitchen, 'Fitted Kitchen', 'coffee');
                                $alarm = checkVal($getSingleProperty->alarm, 'Smoke Detector', 'smoke-alarm');

                                $kitchen = array($fridge, $microwave, $fitted_kitchen, $alarm);




                                // echo $alarm;
                            @endphp
                            
                            @foreach ($homeAmen as $item)
                                    @php
                                        echo $item;
                                    @endphp
                            @endforeach
                            {{-- 
                                <li class="feature-item">
                                    <span class="icon icon-carbon"></span>
                                    Carbon monoxide alarm
                                </li>
                                <li class="feature-item">
                                    <span class="icon icon-kit"></span>
                                    First aid kit
                                </li>
                                <li class="feature-item">
                                    <span class="icon icon-lockbox"></span>
                                    Self check-in with lockbox
                                </li>
                                <li class="feature-item">
                                    <span class="icon icon-security"></span>
                                    Security cameras
                                </li> 
                            --}}
                        </ul>
                    </div>
                    <div class="box-feature">
                        <div class="fw-7">Bedroom:</div>
                        <ul>

                            @foreach ($bedrooms as $bedroom)
                                    @php
                                        echo $bedroom;
                                    @endphp
                            @endforeach
                            
               
                        </ul>
                    </div>
                    <div class="box-feature">
                        <div class="fw-7">Kitchen:</div>
                        <ul>
                            @foreach ($kitchen as $kit)
                                    @php
                                        echo $kit;
                                    @endphp
                            @endforeach
                            

                        </ul>
                    </div>
                </div>
            </div>

            <div class="single-property-element single-property-contact">
                <div class="h7 title fw-7">Contact Sellers</div>
                <div class="widget-box bg-surface">
                    <div class="box-avatar">
                    <div class="avatar avt-100 round">
                        <img src="{{ url($getSingleProperty->getUserImage()) }}" alt="{{ $getSingleProperty->f_name.' '.$getSingleProperty->l_name }}">
                    </div>
                    <div class="info">
                        <div class="text-1 name">{{ $getSingleProperty->f_name.' '.$getSingleProperty->l_name }}</div>
                        <div class="text-warning mb-1 me-2 d-flex justify-content-center">
                            <div class="profile_rate"  data-rateyo-read-only="true" data-rating_val="3.5"></div>
                            <span class="ms-1">
                                {{ $getSingleProperty->phone }}
                            </span>
                        </div>
                        <span>{{ $getSingleProperty->email }}</span>
                    </div>
                    </div>
                    <form action="{{ url('tenant/tenant_reply_message_form') }}" class="contact-form" method="POST" id="/tenant_reply_message_form/">
                        @csrf
                        {{-- <div class="grid-3 gap-12">
                            <div class="ip-group">
                                <label for="fullname">Full Name:</label>
                                <input type="text" placeholder="Jony Dane" class="form-control">
                            </div>
                            <div class="ip-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" placeholder="ex 0123456789" class="form-control">
                            </div>
                            <div class="ip-group">
                                <label for="email">Email Address:</label>
                                <input type="text" placeholder="themesflat@gmail.com" class="form-control">
                            </div>
                        </div> --}}
                        <input type="hidden" name="reply_from" value="{{ Auth::user() != null ? Auth::user()->id : ''  }}">
                        <input type="hidden" name="reply_to" value="{{ $getSingleProperty->user_id }}">
                        <input type="hidden" name="reply_msg_id" value="{{ $getSingleProperty->id }}">
                        <div class="ip-group textarea-group">
                            <label for="message">Your Message:</label>
                            <textarea id="comment-message" name="message" rows="4" tabindex="4"
                            placeholder="Message" aria-required="true" required></textarea>
                        </div>

                        @if ( Auth::user() != null)
                            @if (Auth::user()->user_type == 2 || Auth::user()->user_type == 3 || Auth::user()->user_type == 4)
                                
                                <button id="not_agent_btn" type="button" class="tf-btn primary">Send Message</button>

                            @else
                            <button type="submit" class="tf-btn primary">Send Message</button>
                            @endif

                        @else
                            <button id="send_message_btn" type="button" class="tf-btn primary">Send Message</button>
                        @endif
                        
                    </form>
                </div>
                
            </div>

            <!--
            <div class="single-property-element single-wrapper-review">
                <div class="box-title-review d-flex justify-content-between align-items-center flex-wrap gap-20">
                    <div class="h7 fw-7">Guest Reviews</div>
                    <a href="#" class="tf-btn">View All Reviews</a>
                </div>
                <div class="wrap-review">
                    <ul class="box-review">
                        <li class="list-review-item">
                            <div class="avatar avt-60 round">
                                <img src="{{ url('public/new/images/avatar/avt-2.jpg') }}" alt="avatar">
                            </div>
                            <div class="content">
                                <div class="name h7 fw-7 text-black">Viola Lucas
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 8C0 12.4112 3.5888 16 8 16C12.4112 16 16 12.4112 16 8C16 3.5888 12.4112 0 8 0C3.5888 0 0 3.5888 0 8ZM12.1657 6.56569C12.4781 6.25327 12.4781 5.74673 12.1657 5.43431C11.8533 5.1219 11.3467 5.1219 11.0343 5.43431L7.2 9.26863L5.36569 7.43431C5.05327 7.12189 4.54673 7.12189 4.23431 7.43431C3.9219 7.74673 3.9219 8.25327 4.23431 8.56569L6.63432 10.9657C6.94673 11.2781 7.45327 11.2781 7.76569 10.9657L12.1657 6.56569Z"
                                            fill="#198754" />
                                    </svg>
                                </div>
                                <span class="mt-4 d-inline-block  date body-3 text-variant-2">August 13, 2023</span>
                                <div class="profile_rate"  data-rateyo-read-only="true" data-rating_val="3.5"></div>
                                
                                <p class="mt-12 body-2 text-black">It's really easy to use and it is
                                    exactly what I am looking for. A lot of good looking templates &
                                    it's highly customizable. Live support is helpful, solved my issue
                                    in no time.</p>
                                <ul class="box-img-review">
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review1.jpg') }}" alt="img-review">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review2.jpg') }}" alt="img-review">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review3.jpg') }}" alt="img-review">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review4.jpg') }}" alt="img-review">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <span class="fw-7">+12</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="list-review-item">
                            <div class="avatar avt-60 round">
                                <img src="{{ url('public/new/images/avatar/avt-3.jpg') }}" alt="avatar">
                            </div>
                            <div class="content">
                                <div class="name h7 fw-7 text-black">Viola Lucas
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 8C0 12.4112 3.5888 16 8 16C12.4112 16 16 12.4112 16 8C16 3.5888 12.4112 0 8 0C3.5888 0 0 3.5888 0 8ZM12.1657 6.56569C12.4781 6.25327 12.4781 5.74673 12.1657 5.43431C11.8533 5.1219 11.3467 5.1219 11.0343 5.43431L7.2 9.26863L5.36569 7.43431C5.05327 7.12189 4.54673 7.12189 4.23431 7.43431C3.9219 7.74673 3.9219 8.25327 4.23431 8.56569L6.63432 10.9657C6.94673 11.2781 7.45327 11.2781 7.76569 10.9657L12.1657 6.56569Z"
                                            fill="#198754" />
                                    </svg>
                                </div>
                                <span class="mt-4 d-inline-block  date body-3 text-variant-2">August 13,
                                    2023</span>
                                <ul class="mt-8 list-star">
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                </ul>
                                <p class="mt-12 body-2 text-black">It's really easy to use and it is
                                    exactly what I am looking for. A lot of good looking templates &
                                    it's highly customizable. Live support is helpful, solved my issue
                                    in no time.</p>
                                
                            </div>
                        </li>
                        <li class="list-review-item">
                            <div class="avatar avt-60 round">
                                <img src="{{ url('public/new/images/avatar/avt-4.jpg') }}" alt="avatar">
                            </div>
                            <div class="content">
                                <div class="name h7 fw-7 text-black">Darlene Robertson
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 8C0 12.4112 3.5888 16 8 16C12.4112 16 16 12.4112 16 8C16 3.5888 12.4112 0 8 0C3.5888 0 0 3.5888 0 8ZM12.1657 6.56569C12.4781 6.25327 12.4781 5.74673 12.1657 5.43431C11.8533 5.1219 11.3467 5.1219 11.0343 5.43431L7.2 9.26863L5.36569 7.43431C5.05327 7.12189 4.54673 7.12189 4.23431 7.43431C3.9219 7.74673 3.9219 8.25327 4.23431 8.56569L6.63432 10.9657C6.94673 11.2781 7.45327 11.2781 7.76569 10.9657L12.1657 6.56569Z"
                                            fill="#198754" />
                                    </svg>
                                </div>
                                <span class="mt-4 d-inline-block  date body-3 text-variant-2">August 13, 2023</span>
                                <ul class="mt-8 list-star">
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                </ul>
                                <p class="mt-12 body-2 text-black">It's really easy to use and it is
                                    exactly what I am looking for. A lot of good looking templates &
                                    it's highly customizable. Live support is helpful, solved my issue
                                    in no time.</p>
                              
                            </div>
                        </li>
                        <li class="list-review-item">
                            <div class="avatar avt-60 round">
                                <img src="{{ url('public/new/images/avatar/avt-2.jpg') }}" alt="avatar">
                            </div>
                            <div class="content">
                                <div class="name h7 fw-7 text-black">Viola Lucas
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 8C0 12.4112 3.5888 16 8 16C12.4112 16 16 12.4112 16 8C16 3.5888 12.4112 0 8 0C3.5888 0 0 3.5888 0 8ZM12.1657 6.56569C12.4781 6.25327 12.4781 5.74673 12.1657 5.43431C11.8533 5.1219 11.3467 5.1219 11.0343 5.43431L7.2 9.26863L5.36569 7.43431C5.05327 7.12189 4.54673 7.12189 4.23431 7.43431C3.9219 7.74673 3.9219 8.25327 4.23431 8.56569L6.63432 10.9657C6.94673 11.2781 7.45327 11.2781 7.76569 10.9657L12.1657 6.56569Z"
                                            fill="#198754" />
                                    </svg>
                                </div>
                                <span class="mt-4 d-inline-block  date body-3 text-variant-2">August 13,
                                    2023</span>
                                <ul class="mt-8 list-star">
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                    <li class="icon-star"></li>
                                </ul>
                                <p class="mt-12 body-2 text-black">It's really easy to use and it is
                                    exactly what I am looking for. A lot of good looking templates &
                                    it's highly customizable. Live support is helpful, solved my issue
                                    in no time.</p>
                                <ul class="box-img-review">
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review1.jpg') }}" alt="img-review">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review2.jpg') }}" alt="img-review">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review3.jpg') }}" alt="img-review">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <img src="{{ url('public/new/images/blog/review4.jpg') }}" alt="img-review">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="img-review">
                                            <span class="fw-7">+12</span>
                                        </a>
                                    </li>
                                </ul>
                                <a href="#" class="view-question">See more answered questions (719)</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="wrap-form-comment">
                    <h6>Leave A comment</h6>
                    <div id="comments" class="comments">
                        <div class="respond-comment">
                            <form method="post" id="contactform" class="comment-form form-submit"
                                action="https://themesflat.co/html/homzen/contact/contact-process.php" accept-charset="utf-8"
                                novalidate="novalidate">
                                
                                <div class="form-wg group-ip">
                                    <fieldset>
                                        <label class="sub-ip">Name</label>
                                        <input type="text" class="form-control" name="text" placeholder="Your name" required="">
                                    </fieldset>
                                    <fieldset>
                                        <label class="sub-ip">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Your email" required="">
                                    </fieldset>
                                </div>
                                <fieldset class="form-wg d-flex align-items-center gap-8">
                                    <input type="checkbox" class="tf-checkbox" id="cb-ip"> 
                                    <label for="cb-ip" class="text-black text-checkbox">Save your name, email for the next time review </label>
                                </fieldset>
                                <fieldset class="form-wg">
                                    <label class="sub-ip">Review</label>
                                    <textarea id="comment-message" name="message" rows="4" tabindex="4"
                                        placeholder="Write comment " aria-required="true"></textarea>
                                </fieldset> 
                                <button class="form-wg tf-btn primary" name="submit" type="submit">
                                    <span>Post Comment</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            -->

        </div>

    </section>
    

    <!--
    <section class="flat-section pt-0 flat-latest-property">
        <div class="container">
            <div class="box-title">
                <div class="text-subtitle text-primary">Featured properties</div>
                <h4 class="mt-4">Similar Properties</h4>
            </div>
            <div class="swiper tf-latest-property" data-preview-lg="3" data-preview-md="2" data-preview-sm="2" data-space="30" data-loop="true">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="homeya-box style-2">
                            <div class="archive-top">
                                <a href="#" class="images-group">
                                    <div class="images-style">
                                        <img src="{{ url('public/new/images/home/house-4.jpg') }}" alt="img">
                                    </div>
                                    <div class="top">
                                        <ul class="d-flex gap-8">
                                            <li class="flag-tag success">Featured</li>
                                            <li class="flag-tag style-1">For Sale</li>
                                        </ul>
                                        <ul class="d-flex gap-4">
                                            <li class="box-icon w-32">
                                                <span class="icon icon-arrLeftRight"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-heart"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-eye"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <span class="flag-tag style-2">House</span>
                                    </div>
                                </a>
                                <div class="content">
                                    <div class="h7 text-capitalize fw-7"><a href="#" class="link"> Sunset Heights Estate, Beverly Hills</a></div>
                                    <div class="desc"><i class="fs-16 icon icon-mapPin"></i><p>1040 Ocean, Santa Monica, California</p> </div>
                                    <ul class="meta-list">
                                        <li class="item">
                                            <i class="icon icon-bed"></i>
                                            <span>3</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-bathtub"></i>
                                            <span>2</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-ruler"></i>
                                            <span>600 SqFT</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="archive-bottom d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-8 align-items-center">
                                    <div class="avatar avt-40 round">
                                        <img src="{{ url('public/new/images/avatar/avt-8.jpg') }}" alt="avt">
                                    </div>
                                    <span>Jacob Jones</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h6>$250,00</h6>
                                    <span class="text-variant-1">/month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="homeya-box style-2">
                            <div class="archive-top">
                                <a href="#" class="images-group">
                                    <div class="images-style">
                                        <img src="{{ url('public/new/images/home/house-5.jpg') }}" alt="img">
                                    </div>
                                    <div class="top">
                                        <ul class="d-flex gap-8">
                                            <li class="flag-tag success">Featured</li>
                                            <li class="flag-tag style-1">For Sale</li>
                                        </ul>
                                        <ul class="d-flex gap-4">
                                            <li class="box-icon w-32">
                                                <span class="icon icon-arrLeftRight"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-heart"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-eye"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <span class="flag-tag style-2">Office</span>
                                    </div>
                                </a>
                                <div class="content">
                                    <div class="h7 text-capitalize fw-7"><a href="#" class="link">Coastal Serenity Cottage</a></div>
                                    <div class="desc"><i class="fs-16 icon icon-mapPin"></i><p>21 Hillside Drive, Beverly Hills, California</p> </div>
                                    <ul class="meta-list">
                                        <li class="item">
                                            <i class="icon icon-bed"></i>
                                            <span>4</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-bathtub"></i>
                                            <span>2</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-ruler"></i>
                                            <span>600 SqFT</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="archive-bottom d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-8 align-items-center">
                                    <div class="avatar avt-40 round">
                                        <img src="{{ url('public/new/images/avatar/avt-6.jpg') }}" alt="avt">
                                    </div>
                                    <span>Kathryn Murphy</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h6>$2050,00</h6>
                                    <span class="text-variant-1">/SqFT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="homeya-box style-2">
                            <div class="archive-top">
                                <a href="#" class="images-group">
                                    <div class="images-style">
                                        <img src="{{ url('public/new/images/home/house-6.jpg') }}" alt="img">
                                    </div>
                                    <div class="top">
                                        <ul class="d-flex gap-8">
                                            <li class="flag-tag success">Featured</li>
                                            <li class="flag-tag style-1">For Sale</li>
                                        </ul>
                                        <ul class="d-flex gap-4">
                                            <li class="box-icon w-32">
                                                <span class="icon icon-arrLeftRight"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-heart"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-eye"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <span class="flag-tag style-2">Studio</span>
                                    </div>
                                </a>
                                <div class="content">
                                    <div class="h7 text-capitalize fw-7"><a href="#" class="link">Lakeview Haven, Lake Tahoe</a></div>
                                    <div class="desc"><i class="fs-16 icon icon-mapPin"></i><p>8 Broadway, Brooklyn, New York</p> </div>
                                    <ul class="meta-list">
                                        <li class="item">
                                            <i class="icon icon-bed"></i>
                                            <span>2</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-bathtub"></i>
                                            <span>2</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-ruler"></i>
                                            <span>600 SqFT</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="archive-bottom d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-8 align-items-center">
                                    <div class="avatar avt-40 round">
                                        <img src="{{ url('public/new/images/avatar/avt-10.jpg') }}" alt="avt">
                                    </div>
                                    <span>Floyd Miles</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h6>$250,00</h6>
                                    <span class="text-variant-1">/month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="homeya-box style-2">
                            <div class="archive-top">
                                <a href="#" class="images-group">
                                    <div class="images-style">
                                        <img src="{{ url('public/new/images/home/house-1.jpg') }}" alt="img">
                                    </div>
                                    <div class="top">
                                        <ul class="d-flex gap-8">
                                            <li class="flag-tag success">Featured</li>
                                            <li class="flag-tag style-1">For Sale</li>
                                        </ul>
                                        <ul class="d-flex gap-4">
                                            <li class="box-icon w-32">
                                                <span class="icon icon-arrLeftRight"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-heart"></span>
                                            </li>
                                            <li class="box-icon w-32">
                                                <span class="icon icon-eye"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        <span class="flag-tag style-2">Studio</span>
                                    </div>
                                </a>
                                <div class="content">
                                    <div class="h7 text-capitalize fw-7"><a href="#" class="link"> Casa Lomas de Machalí Machas</a></div>
                                    <div class="desc"><i class="fs-16 icon icon-mapPin"></i><p>33 Maple Street, San Francisco, California</p> </div>
                                    <ul class="meta-list">
                                        <li class="item">
                                            <i class="icon icon-bed"></i>
                                            <span>3</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-bathtub"></i>
                                            <span>2</span>
                                        </li>
                                        <li class="item">
                                            <i class="icon icon-ruler"></i>
                                            <span>600 SqFT</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="archive-bottom d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-8 align-items-center">
                                    <div class="avatar avt-40 round">
                                        <img src="{{ url('public/new/images/avatar/avt-6.jpg') }}" alt="avt">
                                    </div>
                                    <span>Arlene McCoy</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h6>$7250,00</h6>
                                    <span class="text-variant-1">/SqFT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
  



  


    @endsection




    @section('script')
      

        <script type="text/javascript" src="{{ url('public/new/js/carousel.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/new/js/plugin.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/new/js/jquery.nice-select.min.js') }}"></script>
        
        <script type="text/javascript" src="{{ url('public/new/js/jquery.fancybox.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/new/js/shortcodes.js') }}"></script>
        
        {{-- <script src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyAuSiPhoDaOJ7aqtJVtQhYhLzwwJ7rQlmA ') }}"></script>
        <script src="{{ url('public/new/js/map-single.js') }}"></script>
        <script src="{{ url('public/new/js/marker.js') }}"></script> --}}
        {{-- <script src="{{ url('public/new/js/infobox.min.js') }}"></script> --}}
        

        <script src="{{ url('public/assets/js/prop_details.js') }}"></script>



    @endsection