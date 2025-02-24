@php
    use Carbon\Carbon;

        // $getPropType
    $propType = array();
    $catPropVal = '';

    foreach ($getPropType as $prop_type) {
        if ($getAPropertyDetail->prop_category_id == $prop_type->id) {
            $catPropVal = $prop_type->name;
        }
        $propType [] = $prop_type;
    }
@endphp


@extends('admin.layouts.app')

    @section('style')
        
        <style>
     
            .pagination {
                --bs-pagination-padding-x: 0.75rem;
                --bs-pagination-padding-y: 0.375rem;
                --bs-pagination-font-size: 0.875rem;
                --bs-pagination-color: var(--bs-tertiary-color);
                --bs-pagination-bg: var(--bs-secondary-bg);
                --bs-pagination-border-width: var(--bs-border-width);
                --bs-pagination-border-color: var(--bs-border-color);
                --bs-pagination-border-radius: var(--bs-border-radius);
                --bs-pagination-hover-color: var(--bs-link-hover-color);
                --bs-pagination-hover-bg: var(--bs-tertiary-bg);
                --bs-pagination-hover-border-color: var(--bs-border-color);
                --bs-pagination-focus-color: var(--bs-link-hover-color);
                --bs-pagination-focus-bg: var(--bs-secondary-bg);
                --bs-pagination-focus-box-shadow: none;
                --bs-pagination-active-color: #ffffff;
                --bs-pagination-active-bg: #ff6c2f;
                --bs-pagination-active-border-color: #ff6c2f;
                --bs-pagination-disabled-color: var(--bs-secondary-color);
                --bs-pagination-disabled-bg: var(--bs-secondary-bg);
                --bs-pagination-disabled-border-color: var(--bs-border-color);
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                padding-left: 0;
                list-style: none;
            }

            .page-link {
                position: relative;
                display: block;
                padding: var(--bs-pagination-padding-y) var(--bs-pagination-padding-x);
                font-size: var(--bs-pagination-font-size);
                color: var(--bs-pagination-color);
                background-color: var(--bs-pagination-bg);
                border: var(--bs-pagination-border-width) solid var(--bs-pagination-border-color);
                -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            }
            @media (prefers-reduced-motion: reduce) {
                .page-link {
                    -webkit-transition: none;
                    transition: none;
                }
            }
            .page-link:hover {
                z-index: 2;
                color: var(--bs-pagination-hover-color);
                background-color: var(--bs-pagination-hover-bg);
                border-color: var(--bs-pagination-hover-border-color);
            }
            .page-link:focus {
                z-index: 3;
                color: var(--bs-pagination-focus-color);
                background-color: var(--bs-pagination-focus-bg);
                outline: 0;
                -webkit-box-shadow: var(--bs-pagination-focus-box-shadow);
                    box-shadow: var(--bs-pagination-focus-box-shadow);
            }
            .page-link.active, .active > .page-link {
                z-index: 3;
                color: var(--bs-pagination-active-color);
                background-color: var(--bs-pagination-active-bg);
                border-color: var(--bs-pagination-active-border-color);
            }
            .page-link.disabled, .disabled > .page-link {
                color: var(--bs-pagination-disabled-color);
                pointer-events: none;
                background-color: var(--bs-pagination-disabled-bg);
                border-color: var(--bs-pagination-disabled-border-color);
            }

            .page-item:not(:first-child) .page-link {
                margin-left: calc(var(--bs-border-width) * -1);
            }
            .page-item:first-child .page-link {
                border-top-left-radius: var(--bs-pagination-border-radius);
                border-bottom-left-radius: var(--bs-pagination-border-radius);
            }
            .page-item:last-child .page-link {
                border-top-right-radius: var(--bs-pagination-border-radius);
                border-bottom-right-radius: var(--bs-pagination-border-radius);
            }

            .pagination-lg {
                --bs-pagination-padding-x: 1.5rem;
                --bs-pagination-padding-y: 0.75rem;
                --bs-pagination-font-size: 1rem;
                --bs-pagination-border-radius: var(--bs-border-radius-lg);
            }

            .pagination-sm {
                --bs-pagination-padding-x: 0.5rem;
                --bs-pagination-padding-y: 0.25rem;
                --bs-pagination-font-size: 0.7875rem;
                --bs-pagination-border-radius: var(--bs-border-radius-sm);
            }

                        
            .page-link i {
                vertical-align: middle;
            }

            .pagination-rounded .page-link {
                border-radius: 30px !important;
                margin: 0 3px;
                border: none;
            }


            /* Carousel Start */
            .scroll-container {
                width: 450px; /* or 80% of parent element */
                overflow-x: scroll;
                scroll-behavior: smooth;
                scroll-snap-align: start;
                white-space: nowrap;
                padding: 10px;
            }

            .child-element {
                display: inline-block;
                width: 200px; /* adjust to your content's width */
            }

            .scroll-container::-webkit-scrollbar {
                background-color: #0a19a3; /* scrollbar background */
                width: 12px; /* scrollbar width */
            }

            .scroll-container::-webkit-scrollbar-thumb {
                background-color: #c71919; /* thumb background */
                border-radius: 10px; /* thumb border radius */
                width: 12px; /* thumb width */
                height: 30px; /* thumb height */
            }

            .scroll-container::-webkit-scrollbar-track {
                background-color: #f0f0f0; /* track background */
                border-radius: 10px; /* track border radius */
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* track shadow */
            }

            /* color-mix(in srgb, var(--text-color), transparent 20%); */


            .items {
                position: relative;
                width: 100%;
                overflow-x: scroll;
                overflow-y: hidden;
                scroll-behavior: smooth;
                scroll-snap-align: start;
                white-space: nowrap;
                transition: all 0.2s;
                transform: scale(0.98);
                will-change: transform;
                user-select: none;
                cursor: pointer;
            }

            .items.active {
                background: rgba(255,255,255,0.3);
                cursor: grabbing;
                cursor: -webkit-grabbing;
                transform: scale(1);
            }

            .item {
                display: inline-block;
                /* background: skyblue; */
                min-height: 100px;
                min-width: 100px;
                margin: 5px;
                @media screen and (max-width: 10px) {
                min-height: 100px;
                min-width: 100px;
                }
            }

            /* Caroul End */
            .addReadMore.showlesscontent .SecSec,
            .addReadMore.showlesscontent .readLess {
                display: none;
            }

            .addReadMore.showmorecontent .readMore {
                display: none;
            }

            .addReadMore .readMore,
            .addReadMore .readLess {
                font-weight: bold;
                margin-left: 2px;
                color: blue;
                cursor: pointer;
            }

            .addReadMoreWrapTxt.showmorecontent .SecSec,
            .addReadMoreWrapTxt.showmorecontent .readLess {
                display: block;
            }

        </style>

    @endsection

    @section('content')
    
    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row">
             <div class="col-lg-4">
                  <div class="card">
                       <div class="card-body">
                            <!-- Crossfade -->
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                 <div class="carousel-inner" role="listbox">
                                      {{-- <div class="carousel-item active">
                                           <img src="{{ url('public/admins/assets/images/product/p-1.png') }}" alt="" class="img-fluid bg-light rounded">
                                      </div> --}}
                                      @php
                                          $index = 0;
                                          $ind = 0;
                                      @endphp

                                      @foreach ($getAPropertyImgs as $property)
                                   
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ $property->getPropImages() }}" alt="" class="img-fluid bg-light rounded" style="height: 30em; width: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        @php
                                        $index++;
                                    @endphp
                                      @endforeach
                                  
                                 </div>
                                 <div class="carousel-indicators m-0 mt-2 d-lg-flex d-none position-static h-100 items">

                                        @foreach ($getAPropertyImgs as $propertyImg)
                                    
                                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="{{ $ind }}" aria-current="{{ $ind == 0 ? 'true' : '' }}" aria-label="Slide {{ $ind }}" class="w-auto h-auto rounded bg-light {{ $ind == 0 ? 'active' : '' }} item">
                                                <img src="{{ $propertyImg->getPropImages() }}" class="d-block avatar-xl" alt="swiper-indicator-img">
                                            </button>
                                            @php
                                                $ind++;
                                            @endphp
                                        @endforeach
                             
                                 </div>
                            </div>
                       </div>
                       <div class="card-footer border-top">
                            <div class="row g-2">
                                 <div class="col-lg-5">
                                    <select class="form-control d_status_btn" style="width: 6.65em;" data-data_id="{{ $getAPropertyDetail->id }}" data-status_val="{{ $getAPropertyDetail->published }}">
                                        <option value="1" {{ $getAPropertyDetail->status == 1 ? 'selected' : '' }}>Pending</option>
                                        <option value="2" {{ $getAPropertyDetail->status == 2 ? 'selected' : '' }}>Approved</option>
                                        <option value="0" {{ $getAPropertyDetail->status == 0 ? 'selected' : '' }}>Declined</option>
                                    </select>
                                      {{-- <a href="#!" class="btn btn-primary d-flex align-items-center justify-content-center gap-2 w-100"><i class="bx bx-cart fs-18"></i> Add To Cart</a> --}}
                                 </div>
                                 <div class="col-lg-5">
                                      
                                    @if ($getAPropertyDetail->status == 2)
                                        <div class="form-check form-switch" id="publish_prop_div">
                                            <input class="form-check-input d_publish_prop_btn" data-data_id="{{ $getAPropertyDetail->id }}" type="checkbox" role="switch" id="flexSwitchCheckChecked1" {{ $getAPropertyDetail->published == 1 ? 'checked' : '' }} >
                                        </div>
                                    @else
                                        <div class="form-check form-switch" id="publish_prop_div">
                                            <input class="form-check-input" type="checkbox" disabled >
                                        </div>
                                    @endif
                                   
                                      {{-- <a href="#!" class="btn btn-light d-flex align-items-center justify-content-center gap-2 w-100"><i class="bx bx-shopping-bag fs-18"></i> Buy Now</a> --}}
                                 </div>
                                 
                            </div>
                       </div>
                  </div>
             </div>
             <div class="col-lg-8">
                  <div class="card">
                       <div class="card-body" style="height: 50em;">
                            <h4 class="badge bg-success text-light fs-20 py-1 px-2">FOR RENT</h4>
                            <p class="mb-1">
                                 <a href="#!" class="fs-24 text-dark fw-medium">{{ $getAPropertyDetail->name }}</a>
                            </p>
                            <div class="d-flex gap-2 align-items-center">
                                 <ul class="d-flex text-warning m-0 fs-20  list-unstyled">
                                      <li>
                                           <i class="bx bxs-star"></i>
                                      </li>
                                      <li>
                                           <i class="bx bxs-star"></i>
                                      </li>
                                      <li>
                                           <i class="bx bxs-star"></i>
                                      </li>
                                      <li>
                                           <i class="bx bxs-star"></i>
                                      </li>
                                      <li>
                                           <i class="bx bxs-star-half"></i>
                                      </li>
                                 </ul>
                                 <p class="mb-0 fw-medium fs-18 text-dark">3.5 <span class="text-muted fs-13">(55 Review)</span></p>
                            </div>
                            <h2 class="fw-medium my-3 currency-ghs">{{ $getAPropertyDetail->rent_amount }}</h2>

                            <h4 class="text-dark fw-medium mt-5">Description :</h4>
                            <p class="text-muted addReadMore showlesscontent">{{ $getAPropertyDetail->descriptions }} </p>
                            <h4 class="text-dark fw-medium mt-3">Available offers :</h4>
                            <div class="d-flex align-items-center mt-2">
                                 <i class="bx bxs-bookmarks text-success me-3 fs-20 mt-1"></i>
                                 <p class="mb-0"><span class="fw-medium text-dark">Bank Offer</span> 10% instant discount on Bank Debit Cards, up to $30 on orders of $50 and above</p>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                 <i class="bx bxs-bookmarks text-success me-3 fs-20 mt-1"></i>
                                 <p class="mb-0"><span class="fw-medium text-dark">Bank Offer</span> Grab our exclusive offer now and save 20% on your next purchase! Don't miss out, shop today!</p>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
        <div class="row">
             <div class="col-lg-12">
                  <div class="card bg-light-subtle">
                       <div class="card-body">
                            <div class="row">
                                 <div class="col-lg-2">
                                      <div class="d-flex align-items-center gap-3">
                                           <div class="avatar bg-light d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="emojione-monotone:bed" class="fs-35 text-primary"></iconify-icon>
                                           </div>
                                           
                                           <div>
                                                <p class="text-dark fw-medium fs-16 mb-1 fw-bold">{{ $getAPropertyDetail->bedroom }}</p>
                                                <p class="mb-0">Bedrooms</p>
                                           </div>
                                      </div>
                                 </div>
                                 <div class="col-lg-2">
                                      <div class="d-flex align-items-center gap-3">
                                           <div class="avatar bg-light d-flex align-items-center justify-content-center rounded">
                                                <iconify-icon icon="solar:bath-bold-duotone" class="fs-35 text-primary"></iconify-icon>
                                           </div>
                                           
                                           <div>
                                                <p class="text-dark fw-medium fs-16 mb-1 fw-bold">{{ $getAPropertyDetail->bathroom }}</p>
                                                <p class="mb-0">Bathrooms</p>
                                           </div>
                                      </div>
                                 </div>
                                 <div class="col-lg-2">
                                      <div class="d-flex align-items-center gap-3">
                                           <div class="avatar bg-light d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="mdi:living-room" class="fs-35 text-primary"></iconify-icon>
                                           </div>
                                           
                                           <div>
                                                <p class="text-dark fw-medium fs-16 mb-1 fw-bold">{{ $getAPropertyDetail->livingroom }}</p>
                                                <p class="mb-0">Livingrooms</p>
                                           </div>
                                      </div>
                                 </div>
                                 <div class="col-lg-2">
                                    <div class="d-flex align-items-center gap-3">
                                         <div class="avatar bg-light d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="cbi:living-room" class="fs-35 text-primary"></iconify-icon>
                                         </div>
                                         
                                         <div>
                                              <p class="text-dark fw-medium fs-16 mb-1 fw-bold">{{ $getAPropertyDetail->furnished == 1 ? 'Yes' : 'No' }}</p>
                                              <p class="mb-0">Furnished?</p>
                                         </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2">
                                      <div class="d-flex align-items-center gap-3">
                                           <div class="avatar bg-light d-flex align-items-center justify-content-center rounded">
                                                <iconify-icon icon="gis:tacheometer" class="fs-35 text-primary"></iconify-icon>
                                           </div>
                                           
                                           <div>
                                                <p class="text-dark fw-medium fs-16 mb-1 fw-bold">{{ $getAPropertyDetail->separate_meter == 1 ? 'Yes' : 'No' }}</p>
                                                <p class="mb-0">Separate Meter?</p>
                                           </div>
                                      </div>
                                 </div>
                                 <div class="col-lg-2">
                                    <div class="d-flex align-items-center gap-3">
                                         <div class="avatar bg-light d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="fa6-solid:people-arrows" class="fs-35 text-primary"></iconify-icon>
                                         </div>
                                         
                                         <div>
                                              <p class="text-dark fw-medium fs-16 mb-1 fw-bold">{{ $getAPropertyDetail->shared_amen == 1 ? 'Yes' : 'No' }}</p>
                                              <p class="mb-0">Shared Amenities?</p>
                                         </div>
                                    </div>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
        <div class="row">
             <div class="col-lg-6">
                  <div class="card">
                       <div class="card-header">
                            <h4 class="card-title">Property Details</h4>
                       </div>
                       <div class="card-body">
                            <div class="">
                                 <ul class="d-flex flex-column gap-2 list-unstyled fs-14 text-muted mb-0">
                                      <li><span class="fw-medium text-dark">Price</span><span class="mx-2">:</span><span class="currency-ghs">{{ $getAPropertyDetail->rent_amount }}</span></li>
                                      <li><span class="fw-medium text-dark">Property Type</span><span class="mx-2">:</span>{{ $catPropVal }}</li>
                                      <li><span class="fw-medium text-dark">Property Status</span><span class="mx-2">:</span>For Rent</li>
                                      <li><span class="fw-medium text-dark">Contact Name </span><span class="mx-2">:</span>{{ $getAPropertyDetail->f_name . ' ' . $getAPropertyDetail->l_name }}</li>
                                      <li><span class="fw-medium text-dark">Contact Phone </span><span class="mx-2">:</span>{{ $getAPropertyDetail->phone }}</li>
                                      <li class="d-flex justify-content-start"><span class="fw-medium text-dark">Ratings Review </span><span class="mx-2">:</span><div class="profile_rate"  data-rateyo-read-only="true" data-rating_val="2"></div></li>
                                      <li><span class="fw-medium text-dark">Created On </span><span class="mx-2">:</span>{{ Carbon::parse($getAPropertyDetail->created_at)->toDayDateTimeString() }}</li>
                                      <li><span class="fw-medium text-dark">Last Updated </span><span class="mx-2">:</span>{{ Carbon::parse($getAPropertyDetail->updated_at)->diffForHumans() }}</li>
                                 </ul>
                            </div>
                            <div class="mt-3">
                                 {{-- <a href="#!" class="link-primary text-decoration-underline link-offset-2">View More Details <i class="bx bx-arrow-to-right align-middle fs-16"></i></a> --}}
                            </div>
                       </div>
                  </div>
             </div>
             <div class="col-lg-6">
                  <div class="card">
                       <div class="card-header">
                            <h4 class="card-title">Top Review From World</h4>
                       </div>
                       <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                 <img src="{{ url('public/admins/assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-md rounded-circle">
                                 <div>
                                      <h5 class="mb-0">Henny K. Mark</h5>
                                 </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-3 mb-1">
                                
                                <input id="1" class="comm_ratings" type="hidden" name="" value="5">

                                 <div class="comment_ratings_1"  data-rateyo-read-only="true" data-rateyo-half-star="true"></div>
                                 <p class="fw-medium mb-0 text-dark fs-15">Excellent Quality</p>
                            </div>

                            <p class="mb-0 text-dark fw-medium fs-15">Reviewed in Canada on 16 November 2023</p>
                            <p class="text-muted">Medium thickness. Did not shrink after wash. Good elasticity . XL size Perfectly fit for 5.10 height and heavy body. Did not fade after wash. Only for maroon colour t-shirt colour lightly gone in first wash but not faded. I bought 5 tshirt of different colours. Highly recommended in so low price.</p>
                            <div class="mt-2">
                                 <a href="#!" class="fs-14 me-3 text-muted"><i class='bx bx-like'></i> Helpful</a>
                                 <a href="#!" class="fs-14 text-muted">Report</a>
                            </div>

                            <hr class="my-3">

                            <div class="d-flex align-items-center gap-2">
                                 <img src="{{ url('public/admins/assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-md rounded-circle">
                                 <div>
                                      <h5 class="mb-0">Jorge Herry</h5>
                                 </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-3 mb-1">
                                
                                <input id="2" class="comm_ratings" type="hidden" name="" value="3.5">

                                <div class="comment_ratings_2"  data-rateyo-read-only="true" data-rateyo-half-star="true"></div>
                                 <p class="fw-medium mb-0 text-dark fs-15">Good Quality</p>
                            </div>

                            <p class="mb-0 text-dark fw-medium fs-15">Reviewed in U.S.A on 21 December 2023

                            </p>
                            <p class="text-muted mb-0">I liked the tshirt, it's pure cotton &amp; skin friendly, but the size is smaller to compare standard size.</p>
                            <p class="text-muted mb-0">best rated</p>

                            <div class="mt-2">
                                 <a href="#!" class="fs-14 me-3 text-muted"><i class='bx bx-like'></i> Helpful</a>
                                 <a href="#!" class="fs-14 text-muted">Report</a>
                            </div>
                       </div>
                  </div>
             </div>
        </div>

   </div>
    <!-- End Container Fluid -->

    @endsection


    @section('script')
        
    
        <script src="{{ url('public/admins/assets/js/admin_properties.js') }}"></script>

        <script type="text/javascript">
            const slider = document.querySelector(".items");
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener("mousedown", (e) => {
                isDown = true;
                slider.classList.add("active");
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener("mouseleave", () => {
                isDown = false;
                slider.classList.remove("active");
            });
            slider.addEventListener("mouseup", () => {
                isDown = false;
                slider.classList.remove("active");
            });
                slider.addEventListener("mousemove", (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                slider.scrollLeft = scrollLeft - walk;
                console.log(walk);
            });




            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////// ******************************       Read More / Rread Less          ***************************** /////////////
            function AddReadMore() {
                //This limit you can set after how much characters you want to show Read More.
                var carLmt = 380;
                // Text to show when text is collapsed
                var readMoreTxt = " ... Read More";
                // Text to show when text is expanded
                var readLessTxt = " Read Less";


                //Traverse all selectors with this class and manupulate HTML part to show Read More
                $(".addReadMore").each(function() {
                    if ($(this).find(".firstSec").length)
                        return;

                    var allstr = $(this).text();
                    if (allstr.length > carLmt) {
                        var firstSet = allstr.substring(0, carLmt);
                        var secdHalf = allstr.substring(carLmt, allstr.length);
                        var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore link-primary'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess link-primary' title='Click to Show Less'>" + readLessTxt + "</span>";
                        $(this).html(strtoadd);
                    }

                });
                //Read More and Read Less Click Event binding
                $(document).on("click", ".readMore,.readLess", function() {
                    $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
                });
            }
            $(function() {
                //Calling function after Page Load
                AddReadMore();
            });

        </script>

    @endsection