@extends('clients.layouts.app')

@php
    $segments = Request::segment(1);


    // echo '<h1>'.$segments.'</h1>';
@endphp

@section('style')
    <style>
      .pagination .page-link i{
          width:  2em;
          padding:  6px 3px;
          color: var(--main-color);
          font-size: 20px;
          border: 1px solid var(--main-color);
          border-radius: 0.0001em;
          display:  flex;
          flex-direction:  column;
          justify-content:  center;
          align-items: center;
      }
      .pagination .page-link:hover .fas{
          border: none;
      }
      .pagination .page-link{
          font-family: Montserrat, sans-serif;
          font-size: 1.8em;
          color:  var(--text-color);
          background-color: color-mix(in srgb, var(--text-color), transparent 90%);
          margin-right: 0.5em;
          border: none;
          border-radius: 0.1em;
          width: 2em;
          height: 2em;
          display:  flex;
          flex-direction:  column;
          justify-content:  center;
          align-items: center;
          outline: none!important;
          box-shadow: none;
      }
      .pagination .page-link:hover, .pagination .page-link:focus, .pagination .page-item.active .page-link{
          background-color: var(--main-color);
          border: 1px solid var(--main-color);
          color:  var(--white-color);
          border-radius: 0.1em;
      }


      /* color-mix(in srgb, var(--text-color), transparent 20%); */
    </style>
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

  



      <!-- List Your Property Section -->
  
      <!-- Features Section -->
      <section  class="features section list_property_main">
  
        <div class="container">
  
          <div class="row gy-4 align-items-center features-item">

            <div class="col-md-12 order-2 order-md-1" data-aos="fade-up" data-aos-delay="100">
              <p>
                <span>Listing your property is fast, easy, and free!</span>
              </p>
  

              <div class="col-12 order-2 order-lg-1 d-flex btn_listing_apply" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ url('agent/add_property') }}" class="btn_apply">List Your Property</a>
  
              </div>
            
            </div>
          </div>
          <!-- Features Item -->
  
        </div>
  
      </section>
      
    
    <!-- Recent Listed Properties Section -->
    <section id="recent_properties" class="portfolio section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Recently Listed <span style="color: #ff781f;">Properties</span></h2>
          <p>Browse through available houses for rent today.</p>
        </div>
        <!-- End Section Title -->
  
        <div class="container">
  
          <div class="isotope-layout mb-5" data-default-filter="*" data-layout="masonry" data-sort="original-order">
  
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
              <li data-filter="*" class="filter-active">All</li>
              @foreach ($getPropertyType as $property_type)
                <li data-filter="{{ $property_type->filters }}">{{ $property_type->name }}</li>
              @endforeach
             
            </ul><!-- End Portfolio Filters -->
  
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
  

              @foreach ($getPropertiesOverview as $property)

                <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-{{ $property->code_name }}">
                  <div class="card">
                    <img src="{{ url($property->getPropertyImage()) }}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                    <div class="card-body p-6">
                      <h5 class="card-title text_title">{{ $property->name }}</h5>
                            
                            <div class="mb-5 prop_info">
                              <div class="row my-3">
                                <div class="col-6 text_name">
                                  <i class="fa fa-map-marker rec_prop_icons" aria-hidden="true"></i> East Legon
                                  
                                </div>
                                
                                <div class="col-6 text_name">
                                  <i class="fa fa-user rec_prop_icons" aria-hidden="true"></i> {{ $property->created_by_fname.' '.$property->created_by_lname }}
                                  
                                </div>
    
                              </div>
    
                              <div class="row">
                                <div class="col-6">
                                  <a href="{{ url('favorite_', $property->id) }}" class="btn btn-sm"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                  <a href="#" class="btn btn-sm"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-6">
                                  <div class="col-12">Rent Per Month</div>
                                  
                                <div class="col-12 rec_prop_icons">
                                  <span class="currency-ghs"> {{ $property->rent_amount }}</span> 
                                  
                                </div>
    
                                </div>
                              </div>
                            </div>
                    </div>
                    <div class="card-footer portfolio-info property_view">
                      <small><i class="fa fa-bed" aria-hidden="true"></i> {{ $property->bedroom }} Beds</small>
                      <small><i class="fa fa-bath" aria-hidden="true"></i> {{ $property->bathroom }} Baths</small>
                      <small><a href="{{ url('properties/prop_detail',  $property->id )}}" class="btn btn-sm">View Property</a></small>
                    </div>
                  </div>
                </div>
                <!-- End Portfolio Item -->
    
              @endforeach
             
            </div>
  
          
          </div>

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 d-flex justify-content-center Page navigation">
              <nav>{{ $getPropertiesOverview->links() }}</nav>
            </div>
          </div>
        </div>
  
    </section>
    <!-- Recent Listed Properties Section -->
  
  

  


      @endsection