@extends('tenants.layouts.app')


    @section('style')
        <style>
        .pagination .page-link i{
            width:  2em;
            padding:  6px 3px;
            color: var(--main-color);
            font-size: 16px;
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


        .img_properties {
            height: 25em; 
            width: 100%; 
            object-fit: cover; 
            object-position: center;
        }

        /* color-mix(in srgb, var(--text-color), transparent 20%); */
        </style>
    @endsection



    @section('content')
        <div class="container-fluid p-5">
            <div class="row mt-5">
                <h3 class="page-title">Properties Listing</h3>
           
                <p>There are in total <span>{{ $getAllProperties->count() }}</span> properties listed.</p>
            </div>
            <div class="row">
                
                <div class="row" data-aos="fade-up" data-aos-delay="200">
        
    
                    @foreach ($getPropertiesOverview as $property)
    
                    <div class="col-lg-4 col-md-6 filter-{{ $property->code_name }}">
                        <div class="card">
                            <div class="rounded-3 avatar d-flex align-items-center justify-content-center">
                                <img src="{{ url($property->getPropertyImage()) }}" class="img_properties" alt="{{ $property->name }}"/>
                            </div>
                            
                            <div class="card-body p-2">
                                <h5 class="card-title">{{ $property->name }}</h5>
                                    
                                    <div class="mb-1 prop_info">
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
                                <small><a href="{{ url('overview/prop_detail',  $property->id )}}" class="btn btn-sm">View Property</a></small>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
        
                    @endforeach
                    
                </div>
        
            </div>

                    
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
                <div class="col-12 d-flex justify-content-center Page navigation">
                    <nav>{{ $getPropertiesOverview->links() }}</nav>
                </div>
            </div>

        </div>





        
    @endsection