@php

    // Use Links
    use Carbon\Carbon;
    use Illuminate\Support\Arr;


    // To SHow Whether A PDF File Or An Image
    $isPdf = false;

    $img_or_file = $getSingleEdit->getProofDocImage()['pdf_file'] ?? null;

    if (!empty($img_or_file)) {
        $isPdf = true;
    }

    // echo ($isPdf);
    $processes = [
        '<div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>',
        '<div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>',
        '<div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>',
        '<div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>',
        '<div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>',

    ];

    // Processing Funds Level Stages
    // $current_level = $getSingleEdit->rent_status
    $level_color = ['', 'info', 'danger', 'warning', 'success', 'primary', 'dark'];
    $level_name = ['', 'Submit', 'Pending', 'Reviewed', 'Appproved', 'Declined', 'Delivered'];
    $current_level = $getSingleEdit->rent_status;
    $level_stage = array();
    $index = 1;
    
    for ($i=0; $i < $current_level ; $i++) { 
        

        $level_stage[] = $index++;

    
    }

    if ($current_level == 5) {
        unset($level_stage[3]); 
    }

    if ($current_level ==6) {
        unset($level_stage[4]); 
    }

    if ($current_level == 7) {
        unset($level_stage[4]); 
    }

    // $level_stage = array_values($level_stage);

@endphp
          

@extends('admin.layouts.app')

    @section('style')
        
        <!-- Gridjs Plugin css -->
        <link href="{{ url('public/admins/assets/vendor/gridjs/theme/mermaid.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
     
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


            /* color-mix(in srgb, var(--text-color), transparent 20%); */
        </style>

    @endsection

    @section('content')
    
    <!-- Start Container -->
    <div class="container-xxl">

        <div class="row">
             <div class="col-xl-9 col-lg-8">
                  <div class="row">
                       <div class="col-lg-12">
                            <div class="card">
                                 <div class="card-body">
                                      <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                           <div>
                                            {{-- {{ $current_level }} --}}
                                                <h4 class="fw-medium text-dark d-flex align-items-center gap-2">#{{ $getSingleEdit->application_id }} 

                                                       <div id="paid_apply_div" class="d-flex justify-content-center ">
                                                            {{-- <span class="badge bg-success-subtle text-success  px-2 py-1 fs-13 mx-2">{{ $getSingleEdit->payed == 1 ? 'Paid' : 'Not Paid' }}
                                                                 <span>
                                                                      <div class="form-check form-switch">
                                                                           <input class="form-check-input d_paid_apply_btn" data-data_id="{{ $getSingleEdit->id }}" type="checkbox" role="switch" id="flexSwitchCheckChecked1" {{ $getSingleEdit->payed == 1 ? 'checked' : '' }} >
                                                                      </div>
                                                                 </span>
                                                            </span>
                                                            <span class="border border-warning text-warning fs-13 px-2 py-1 rounded"> Progress</span> --}}
                                                       </div>
                                                  </h4>
                                                <p class="mb-0">Application / Application Details / #{{ $getSingleEdit->application_id }} - {{ Carbon::parse($getSingleEdit->created_at)->toDayDateTimeString() }}</p>
                                           </div>
                                           <div class="d-flex justify-content-start">
                                                <div class="new_reviewed_btn_div">
                                                    @if ($getSingleEdit->rent_status <= 2)
                                                        <a href="javascript:void(0);" class="btn btn-outline-secondary reviewed_btn" data-data_id="{{ $getSingleEdit->id }}">Review</a>
                                                    @else
                                                        <a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Reviewed <i class="bx bx-check-shield text-white"></i></a>
                                                        
                                                    @endif
                                                   
                                                </div>

                                                <div class="new_approved_btn_div mx-2">
                                                  @if ($getSingleEdit->rent_status <= 3)
                                                      <a href="javascript:void(0);" class="btn btn-outline-secondary approved_btn" data-data_id="{{ $getSingleEdit->id }}">Approve</a>
                                                  @else

                                                       @if ($getSingleEdit->rent_status == 5)
                                                            <a href="javascript:void(0);" disabled class="btn btn-danger disabled">Approved <i class="bx bx-x-circle text-white"></i></a>
                                                       @else
                                                            <a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Approved <i class="bx bx-check-shield text-white"></i></a>
                                                       @endif
                                                      
                                                  @endif
                                                 
                                              </div>

                                                <div class="new_declined_btn_div">
                                                  @if ($getSingleEdit->rent_status <= 4)
                                                      
                                                      @if ($getSingleEdit->rent_status == 4)
                                                            <a href="javascript:void(0);" disabled class="btn btn-danger disabled">Not Declined <i class="bx bx-x-circle text-white"></i></a>
                                                       @else
                                                            <a href="javascript:void(0);" class="btn btn-outline-secondary declined_btn" data-data_id="{{ $getSingleEdit->id }}">Decline</a>
                                                       @endif
                                                  @else
                                                       @if ($getSingleEdit->rent_status >= 6)
                                                            <a href="javascript:void(0);" disabled class="btn btn-danger disabled">Not Declined <i class="bx bx-x-circle text-white"></i></a>
                                                       @else
                                                            <a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Declined <i class="bx bx-check-shield text-white"></i></a>
                                                       @endif
                                                      
                                                      
                                                  @endif
                                                 
                                              </div>
                                              
                                           </div>

                                      </div>

                                      <div class="mt-4">
                                           <h4 class="fw-medium text-dark">Progress</h4>
                                      </div>
                                      <div class="row row-cols-xxl-5 row-cols-md-2 row-cols-1">
                                            @foreach ($level_stage as $item)
                                                
                                                @if ($item < 7)
                                                 <div class="col">
                                                       <div class="progress mt-3" style="height: 10px;">
                                                       <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-{{ $level_color[$item] }}" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                                       </div>
                                                       </div>
                                                       <p class="mb-0 mt-2">{{ $level_name[$item] }}</p>
                                                  </div>
                                                @endif
                                            @endforeach
                                           
                                      </div>
                                 </div>
                                 <div class="card-footer d-flex flex-wrap align-items-center justify-content-between bg-light-subtle gap-2">
                                      <p class="border rounded mb-0 px-2 py-1 bg-body"><i class='bx bx-arrow-from-left align-middle fs-16'></i> Estimated move in date : <span class="text-dark fw-medium">{{ Carbon::parse($getSingleEdit->move_in_date)->toFormattedDateString() }}</span></p>
                                      <div>
                                        <div class="new_delivered_btn_div">
                                             @if ($getSingleEdit->rent_status != 5)
                                                  @if ($getSingleEdit->rent_status >= 6)
                                                  <a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Money Delivered <i class="bx bx-check-shield text-white"></i></a>
                                                  @else
                                                  <a href="javascript:void(0);" class="btn btn-primary delivered_btn" data-data_id="{{ $getSingleEdit->id }}">Money Delivered</a>
                                                  @endif

                                             @else
                                                  @if ($getSingleEdit->rent_status == 5)
                                                       <a href="javascript:void(0);" disabled class="btn btn-danger disabled">Money Delivered <i class="bx bx-x-circle text-white"></i></a>
                                                  @else
                                                       <a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Money Delivered <i class="bx bx-check-shield text-white"></i></a>
                                                  @endif
                                                 
                                             @endif
                                            
                                         </div>
                                           {{-- <a href="#!" class="btn btn-primary">Money Delivered</a> --}}
                                      </div>
                                 </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                            <div class="card-header">
                                                GHANA CARD
                                            </div>
                                            
                                        <img src="{{ $getSingleEdit->getGHcardImage() }}" alt="" srcset="">
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            PROOF OF DOC.
                                        </div>
                              
                                        @if ($isPdf)
                                            <iframe  src="{{ $getSingleEdit->getProofDocImage()['pdf_file'] ?? null }}" allowfullscreen width="100%" height="350vh"></iframe>
                                        @else
                                            <img src="{{ $getSingleEdit->getProofDocImage() }}" alt="" srcset="" width="100%">
                                        @endif
                                        
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            ID CARD
                                        </div>
                                        
                                        <img src="{{ $getSingleEdit->getIDCardImage() }}" alt="" srcset="">
                                      </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            SELFIE IMAGE
                                        </div>
                                        
                                        <img src="{{ $getSingleEdit->getSelfieImage() }}" alt="" srcset="">
                                      </div>
                                </div>
                           </div>
                           
                            <div class="card">
                                 <div class="card-header">
                                      <h4 class="card-title">Monthly Payback Amount Timeline</h4>
                                 </div>
                                 <div class="card-body">
                                      <div class="position-relative ms-2">
                                           <span class="position-absolute start-0  top-0 border border-dashed h-100"></span>
                                           <div class="position-relative ps-4">
                                                <div class="mb-4">
                                                     <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle">
                                                          <div class="spinner-border spinner-border-sm text-warning" role="status">
                                                               <span class="visually-hidden">Loading...</span>
                                                          </div>
                                                     </span>
                                                     <div class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                          <div>
                                                               <h5 class="mb-1 text-dark fw-medium fs-15">The packing has been started</h5>
                                                               <p class="mb-0">Confirmed by Gaston Lapierre</p>
                                                          </div>
                                                          <p class="mb-0">April 23, 2024, 09:40 am</p>

                                                     </div>
                                                </div>
                                           </div>
                                           {{-- <div class="position-relative ps-4">
                                                <div class="mb-4">
                                                     <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                                          <i class='bx bx-check-circle'></i>
                                                     </span>
                                                     <div class="ms-2 d-flex flex-wrap gap-2  align-items-center justify-content-between">
                                                          <div>
                                                               <h5 class="mb-1 text-dark fw-medium fs-15">The Invoice has been sent to the customer</h5>
                                                               <p class="mb-2">Invoice email was sent to <a href="#!" class="link-primary">hello@dundermuffilin.com</a></p>
                                                               <a href="#!" class="btn btn-light">Resend Invoice</a>
                                                          </div>
                                                          <p class="mb-0">April 23, 2024, 09:40 am</p>

                                                     </div>
                                                </div>
                                           </div> --}}

                                           <div class="position-relative ps-4">
                                                <div class="mb-4">
                                                    <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                                        <i class='bx bx-check-circle'></i>
                                                    </span>
                                                    <div class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                        <div>
                                                            <h5 class="mb-1 text-dark fw-medium fs-15">The Invoice has been created</h5>
                                                            <p class="mb-2">Payback Amount <span class="currency-ghs">2050</span></p>
                                                            <a href="#!" class="btn btn-primary">View Receipt</a>
                                                            <a href="#!" class="btn btn-info">Confrim Payment</a>
                                                        </div>
                                                        <p class="mb-0">April 23, 2024, 09:40 am</p>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                           <div class="position-relative ps-4">
                                                <div class="mb-4">
                                                    <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                                        <i class='bx bx-check-circle'></i>
                                                    </span>
                                                    <div class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                        <div>
                                                            <h5 class="mb-1 text-dark fw-medium fs-15">The Invoice has been created</h5>
                                                            <p class="mb-2">Payback Amount <span class="currency-ghs">2050</span></p>
                                                            <a href="#!" class="btn btn-primary">View Receipt</a>
                                                            <a href="#!" class="btn btn-info">Confrim Payment</a>
                                                        </div>
                                                        <p class="mb-0">April 23, 2024, 09:40 am</p>

                                                    </div>
                                                </div>
                                            </div>
                                            

                                           <div class="position-relative ps-4">
                                                <div class="mb-4">
                                                    <span class="position-absolute start-0 avatar-sm translate-middle-x bg-light d-inline-flex align-items-center justify-content-center rounded-circle text-success fs-20">
                                                        <i class='bx bx-check-circle'></i>
                                                    </span>
                                                    <div class="ms-2 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                        <div>
                                                            <h5 class="mb-1 text-dark fw-medium fs-15">The Invoice has been created</h5>
                                                            <p class="mb-2">Payback Amount <span class="currency-ghs">2050</span></p>
                                                            <a href="#!" class="btn btn-primary">View Receipt</a>
                                                            <a href="#!" class="btn btn-info">Confrim Payment</a>
                                                        </div>
                                                        <p class="mb-0">April 23, 2024, 09:40 am</p>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                      </div>
                                 </div>
                            </div> 

                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                     <div>
                                          <h4 class="card-title">Applicant Details</h4>
                                     </div>
                                     <div>
                                          <span class="badge bg-success-subtle text-success px-2 py-1">Active User</span>
                                     </div>

                                </div>
                                <div class="card-body py-2">
                                     <div class="table-responsive">
                                          <table class="table mb-0">
                                               <tbody>
                                                    <tr>
                                                         <td class="px-0">
                                                              <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark">Educational Level : </p>
                                                         </td>
                                                         <td class="text-dark fw-medium px-0">{{ $getSingleEdit->level_edu }}</td>
                                                    </tr>
                                                    <tr>
                                                         <td class="px-0">
                                                              <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> How Heared Of EzirentGH : </p>
                                                         </td>
                                                         <td class="text-dark fw-medium px-0">{{ $getSingleEdit->how_heard }}</td>
                                                    </tr>
                                                    <tr>
                                                         <td class="px-0">
                                                              <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Current Employment Status : </p>
                                                         </td>
                                                         <td class="text-dark fw-medium px-0">{{ $getSingleEdit->employ_status }}</td>
                                                    </tr>
                                                    <tr>
                                                         <td class="px-0">
                                                              <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Any Outstanding Loan : </p>
                                                         </td>
                                                         <td class="text-dark fw-medium px-0">{{ $getSingleEdit->outstanding_dept }}</td>
                                                    </tr>
                                                    <tr>
                                                         <td class="px-0">
                                                              <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Current Accommodation : </p>
                                                         </td>
                                                         <td class="text-dark fw-medium px-0">{{ $getSingleEdit->current_accomodate }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-0">
                                                             <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Area of Interest : </p>
                                                        </td>
                                                        <td class="text-dark fw-medium px-0">{{ $getSingleEdit->area_interest }}</td>
                                                   </tr>
                                                   <tr>
                                                         <td class="px-0">
                                                              <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Type Of Property : </p>
                                                         </td>
                                                         <td class="text-dark fw-medium px-0">{{ $getSingleEdit->type_of_property }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="px-0">
                                                             <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Employer's Name : </p>
                                                        </td>
                                                        <td class="text-dark fw-medium px-0">{{ $getSingleEdit->employer_name }}</td>
                                                   </tr>
                                                   <tr>
                                                        <td class="px-0">
                                                            <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Employer's Address : </p>
                                                        </td>
                                                        <td class="text-dark fw-medium px-0">{{ $getSingleEdit->employer_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-0">
                                                             <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Rent Units : </p>
                                                        </td>
                                                        <td class="text-dark fw-medium px-0">{{ $getSingleEdit->rent_unit_detail }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-0">
                                                             <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Date Applied : </p>
                                                        </td>
                                                        <td class="text-dark fw-medium px-0">{{ Carbon::parse($getSingleEdit->created_at)->toDayDateTimeString() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-0">
                                                             <p class="d-flex mb-0 align-items-center gap-1 fw-semibold text-dark"> Last Updated : </p>
                                                        </td>
                                                        <td class="text-dark fw-medium px-0">{{ Carbon::parse($getSingleEdit->updated_at)->diffForHumans() }}</td>
                                                    </tr>
                                               </tbody>
                                          </table>
                                     </div>
                                </div>
                           </div>

                       </div>
                  </div>
             </div>

             {{-- 2023577 --}}

             <div class="col-xl-3 col-lg-4">
                 <div class="card">
                    <div class="card-header">
                         <h4 class="card-title">Document Verification</h4>
                    </div>
                    <div class="card-body">
                         <button class="btn btn-primary verify_documents_btn" id="virify_documents" type="button">Verify Documents</button>
                    </div>
                         
                  </div>
                  <div class="card">
                       <div class="card-header">
                            <h4 class="card-title">Application Summary</h4>
                       </div>
                       <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table mb-0">
                                      <tbody>
                                           <tr>
                                                <td class="px-0">
                                                     <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:clipboard-text-broken"></iconify-icon> Net Income : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 currency-ghs">{{ $getSingleEdit->net_income }}</td>
                                           </tr>
                                           <tr>
                                                <td class="px-0">
                                                     <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:ticket-broken" class="align-middle"></iconify-icon> Monthly Budget : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 currency-ghs">{{ $getSingleEdit->monthly_bugbet }}</td>
                                           </tr>
                
                                           <tr>
                                                <td class="px-0">
                                                    <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:kick-scooter-broken" class="align-middle"></iconify-icon> Requested Months : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0">{{ $getSingleEdit->request_month }}</td>
                                            </tr>

                                            <tr>
                                                <td class="px-0">
                                                    <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:kick-scooter-broken" class="align-middle"></iconify-icon> No. of Months Payback : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0">{{ $getSingleEdit->months_payback }}</td>
                                            </tr>

                                           <tr>
                                                <td class="px-0">
                                                     <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon icon="solar:calculator-minimalistic-broken" class="align-middle"></iconify-icon> Interest (2.5% / month) : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 currency-ghs">{{ ($getSingleEdit->monthly_bugbet*2.5)/100 }}</td>
                                           </tr>

                                      </tbody>
                                 </table>
                            </div>
                       </div>
                       <div class="card-footer d-flex align-items-center justify-content-between bg-light-subtle">
                            <div>
                                 <p class="fw-medium text-dark mb-0">Total Amount</p>
                            </div>
                            <div>
                                 <p class="fw-medium text-dark mb-0 currency-ghs">{{ ((($getSingleEdit->monthly_bugbet*2.5)/100)+$getSingleEdit->monthly_bugbet)*$getSingleEdit->request_month }}</p>
                            </div>

                       </div>
                  </div>
                  
                  <div class="card">
                       <div class="card-header">
                            <h4 class="card-title">Applicant Information</h4>
                       </div>
                       <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                 <div class="rounded-3 bg-light avatar d-flex align-items-center justify-content-center">
                                      <img src="{{ $getSingleEdit->getSelfieImage() }}" alt="" class="avatar-sm">
                                 </div>
                                 <div>
                                      <p class="mb-1 text-dark fw-medium">{{ $getSingleEdit->f_name . ' ' . $getSingleEdit->l_name }}</p>
                                      <p class="mb-0 text-dark">0{{ $getSingleEdit->whatsapp_no }}</p>
                                 </div>
                                 <div class="ms-auto">
                                      <iconify-icon icon="solar:check-circle-broken" class="fs-22 text-success"></iconify-icon>
                                 </div>
                            </div>
                            <p class="text-dark mb-1 fw-medium">Gender : <span class="text-muted fw-normal fs-13 text-capitalize"> {{ $getSingleEdit->gender }}</span></p>
                            <p class="text-dark mb-0 fw-medium">Birthdate : <span class="text-muted fw-normal fs-13"> {{ Carbon::parse($getSingleEdit->dob)->toFormattedDateString() }}</span></p>
                            <p class="text-dark mb-1 fw-medium">Marital Status : <span class="text-muted fw-normal fs-13  text-capitalize"> {{ $getSingleEdit->marital_status }}</span></p>
                       </div>
                  </div>
                  <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Landlord Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div>
                                    <p class="mb-1 text-dark fw-medium">{{ $getSingleEdit->landlord_name }}</p>
                                    <p class="mb-0 text-dark">0{{ $getSingleEdit->landlord_contact }}</p>
                                </div>
                                <div class="ms-auto">
                                    <iconify-icon icon="solar:check-circle-broken" class="fs-22 text-success"></iconify-icon>
                                </div>
                            </div>
                        </div>
                </div>
                  <div class="card">
                       <div class="card-header">
                            <h4 class="card-title">Emergency Conact</h4>
                       </div>
                       <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                 <div>
                                    <h5 class="">Full Name</h5>
                                      <p class="mb-1">{{ $getSingleEdit->emer_f_name . ' ' . $getSingleEdit->emer_l_name }}</p>
                                 </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                 <h5 class="">Contact Number</h5>
                            </div>
                            <p class="mb-1">0{{ $getSingleEdit->emer_phone }}</p>


                            <div class="d-flex justify-content-between mt-3">
                                <h5 class="">Relationship</h5>
                           </div>
                           <p class="mb-1">{{ $getSingleEdit->emer_relationship == 'Other' ? $getSingleEdit->emer_relationship_other : $getSingleEdit->emer_relationship }}</p>


                           <div class="d-flex justify-content-between mt-3">
                                <h5 class="">Location</h5>
                            </div>
                            <p class="mb-1">{{ $getSingleEdit->emer_current_location }}</p>

                            <div class="d-flex justify-content-between mt-3">
                                 <h5 class="">Billing Address</h5>
                            </div>

                            <p class="mb-1">Same as shipping address</p>
                       </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Applicant Location</h4>
                    </div>
                       <div class="card-body">
                            <div class="mapouter">
                                 <div class="gmap_canvas"><iframe class="gmap_iframe rounded" width="100%" style="height: 418px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1980&amp;height=400&amp;hl=en&amp;q=University%20of%20Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
   </div>

    <!-- End Container Fluid -->

    @endsection


    @section('script')
       
        <!-- Gridjs Demo js -->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

        <script src="{{ url('public/admins/assets/js/applications.js') }}"></script>

    @endsection