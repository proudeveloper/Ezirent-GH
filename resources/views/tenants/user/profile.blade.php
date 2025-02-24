@php
    use Carbon\Carbon;
@endphp


@extends('tenants.layouts.app')


    @section('style')
        <!-- Profile CSS -->
        <link href="{{ url('public/tenants/assets/css/user-profile.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('public/tenants/assets/css/components/list-group.css') }}" rel="stylesheet" type="text/css" />


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

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl mt-5">

                    <div class="row">
    
                        <!-- Content -->
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                            <div class="user-profile">
                                <div class="widget-content widget-content-area px-4 py-2">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="">Profile</h3>
                                        <a href="user-account-settings.html" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                    </div>
                                    <div class="text-center user-info">
                                        <img src="{{ Auth::user()->getUserImage() }}" alt="avatar">
                                        <p class="">{{ Auth::user()->f_name .' '.  Auth::user()->l_name }}</p>
                                    </div>
                                    <div class="user-info-list">
    
                                        <div class="">
                                            <ul class="contacts-block list-unstyled">
                                                <li class="contacts-block__item">
                                                    <i class="fa fa-coffee fs-3 mx-2" aria-hidden="true"></i> Tenant 
                                                </li>
                                                <li class="contacts-block__item">
                                                    <i class="fa fa-calendar-o fs-3 mx-2" aria-hidden="true"></i> {{ Carbon::parse(Auth::user()->created_at)->toDayDateTimeString() }}
                                                </li>
                                                {{-- <li class="contacts-block__item">
                                                    <i class="fa fa-map-marker fs-3 mx-2" aria-hidden="true"></i> New York, USA
                                                </li> --}}
                                                <li class="contacts-block__item">
                                                    <a href="mailto:{{ Auth::user()->email }}">
                                                        <i class="fa fa-envelope-o fs-3 mx-2" aria-hidden="true"></i> {{ Auth::user()->email }}</a>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <i class="fa fa-phone fs-3 mx-2" aria-hidden="true"></i> {{ Auth::user()->phone }}
                                                </li>
                                            </ul>

                                            <ul class="list-inline mt-4">
                                                <li class="list-inline-item mb-0">
                                                    <a class="btn btn-info btn-icon btn-rounded" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <a class="btn btn-danger btn-icon btn-rounded" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dribbble"><circle cx="12" cy="12" r="10"></circle><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <a class="btn btn-dark btn-icon btn-rounded" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

                            <div class="usr-tasks ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Task</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Projects</th>
                                                    <th>Progress</th>
                                                    <th>Task Done</th>
                                                    <th class="text-center">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Figma Design</td>
                                                    <td>                                                    
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 29.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-danger">29.56%</p></td>
                                                    <td class="text-center">
                                                        <p>2 mins ago</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Vue Migration</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-success">50%</p></td>
                                                    <td class="text-center">
                                                        <p>4 hrs ago</p>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Flutter App</td>
                                                    <td>                                                    
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 39%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-danger">39%</p></td>
                                                    <td class="text-center">
                                                        <p>a min ago</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>API Integration</td>
                                                    <td>                                                    
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-success" role="progressbar" style="width: 78.03%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-success">78.03%</p></td>
                                                    <td class="text-center">
                                                        <p>2 weeks ago</p>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Blog Update</td>
                                                    <td>                                                    
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-success">100%</p></td>
                                                    <td class="text-center">
                                                        <p>18 hrs ago</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Landing Page</td>
                                                    <td>                                                    
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 19.15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-danger">19.15%</p></td>
                                                    <td class="text-center">
                                                        <p>5 days ago</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Shopify Dev</td>
                                                    <td>                                                    
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 60.55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><p class="text-success">60.55%</p></td>
                                                    <td class="text-center">
                                                        <p>8 days ago</p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                         --}}
                    </div>

                    <div class="row mt-4">

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="summary layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Summary</h3>
                                    <div class="order-summary">

                                        <div class="summary-list summary-income">
    
                                            <div class="summery-info">
    
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                                </div>
    
                                                <div class="w-summary-details">
    
                                                    <div class="w-summary-info">
                                                        <h6>Income <span class="summary-count">$92,600 </span></h6>
                                                        <p class="summary-average">90%</p>
                                                    </div>
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                        <div class="summary-list summary-profit">
    
                                            <div class="summery-info">
    
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                </div>
                                                
                                                <div class="w-summary-details">
    
                                                    <div class="w-summary-info">
                                                        <h6>Profit <span class="summary-count">$37,515</span></h6>
                                                        <p class="summary-average">65%</p>
                                                    </div>
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                        <div class="summary-list summary-expenses">
    
                                            <div class="summery-info">
    
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                                </div>
                                                <div class="w-summary-details">
    
                                                    <div class="w-summary-info">
                                                        <h6>Expenses <span class="summary-count">$55,085</span></h6>
                                                        <p class="summary-average">42%</p>
                                                    </div>
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">

                            <div class="pro-plan layout-spacing">
                                <div class="widget">
    
                                    <div class="widget-heading">
        
                                        <div class="task-info">
                                            <div class="w-title">
                                                <h5>Pro Plan</h5>
                                                <span>$25/month</span>
                                            </div>
                                        </div>
        
                                        <div class="task-action">
                                            <button class="btn btn-secondary">Renew Now</button>
                                        </div>
                                    </div>
                                    
                                    <div class="widget-content">
        
                                        <ul class="p-2 ps-3 mb-4">
                                            <li class="mb-1"><strong>10,000 Monthly Visitors</strong></li>
                                            <li class="mb-1"><strong>Unlimited Reports</strong></li>
                                            <li class=""><strong>2 Years Data Storage</strong></li>
                                        </ul>
                                        
                                        <div class="progress-data">
                                            <div class="progress-info">
                                                <div class="due-time">
                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 5 Days Left</p>
                                                </div>
                                                <div class="progress-stats"><p class="text-info">$25 / month</p></div>
                                            </div>
                                            
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
        
                                    </div>
        
                                </div>

                            </div>
                            
                        </div>
    
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="payment-history layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Payment History</h3>

                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">March</div>
                                                <p class="sub-title mb-0">Pro Membership</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">$45</span>
                                            <div class="btn-group dropstart align-self-center" role="group">
                                                <a id="paymentHistory1" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="paymentHistory1">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Download Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">February</div>
                                                <p class="sub-title mb-0">Pro Membership</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">$45</span>
                                            <div class="btn-group dropstart align-self-center" role="group">
                                                <a id="paymentHistory2" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="paymentHistory2">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Download Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">January</div>
                                                <p class="sub-title mb-0">Pro Membership</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">$45</span>
                                            <div class="btn-group dropstart align-self-center" role="group">
                                                <a id="paymentHistory3" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="paymentHistory3">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Download Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="payment-methods layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Payment Methods</h3>

                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <img src="https://designreset.com/cork/html/src/assets/img/card-americanexpress.svg" class="align-self-center me-3" alt="americanexpress">
                                            <div class="me-auto">
                                                <div class="fw-bold title">American Express</div>
                                                <p class="sub-title mb-0">Expires on 12/2025</p>
                                            </div>
                                            <span class="badge badge-success align-self-center me-3">Primary</span>
                                        </div>
                                        
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <img src="https://designreset.com/cork/html/src/assets/img/card-mastercard.svg" class="align-self-center me-3" alt="mastercard">
                                            <div class="me-auto">
                                                <div class="fw-bold title">Mastercard</div>
                                                <p class="sub-title mb-0">Expires on 03/2025</p>
                                            </div>
                                        </div>
                                        
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <img src="https://designreset.com/cork/html/src/assets/img/card-visa.svg" class="align-self-center me-3" alt="visa">
                                            <div class="me-auto">
                                                <div class="fw-bold title">Visa</div>
                                                <p class="sub-title mb-0">Expires on 10/2025</p>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>

            </div>

            {{-- <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Personal Information</h4>
                                    <div class="nk-block-des">
                                        <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                                    </div>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none">
                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                </div>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Basics</h6>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Full Name</span>
                                        <span class="data-value">{{ Auth::user()->f_name .' '.  Auth::user()->l_name}}</span>
                                    </div>
                                    <div class="data-col data-col-end">
                                        <span class="data-more"><em class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Display Name</span><span class="data-value">Ishtiyak</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Email</span><span
                                            class="data-value">{{ Auth::user()->email }}</span></div>
                                    <div class="data-col data-col-end">
                                        <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                                    </div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Phone Number</span>
                                        <span class="data-value text-soft">{{ Auth::user()->phone }}</span>
                                    </div>
                                    <div class="data-col data-col-end">
                                        <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                                    </div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal"
                                    data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Date of Birth</span>
                                        <span class="data-value">29 Feb, 1986</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal"
                                    data-bs-target="#profile-edit" data-tab-target="#address">
                                    <div class="data-col"><span
                                            class="data-label">Address</span><span
                                            class="data-value">2337 Kildeer Drive,<br>Kentucky,
                                            Canada</span></div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                            </div>
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Preferences</h6>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span
                                            class="data-label">Language</span><span
                                            class="data-value">English (United State)</span></div>
                                    <div class="data-col data-col-end"><a href="#"
                                            class="link link-primary">Change Language</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                        data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                        data-toggle-overlay="true">
                        <div class="card-inner-group" data-simplebar>
                            <div class="card-inner">
                                <div class="user-card">
                                    <form action="{{ url('tenant/send_add_user_img') }}" method="POST" enctype="multipart/form-data" id="image_upload_form">
                                        @csrf
                            
                                        <div class="user-avatar bg-primary">
                                            
                                            <input type="file" name="uploadUserfile" id="uploadUserfile" style="display: none">
                                            <input type="hidden" name="myId" id="myId" value="{{ Auth::user()->id}}">
                                            <img src="{{ Auth::user()->getUserImage() }}" alt="{{ Auth::user()->f_name .' '.  Auth::user()->l_name}}" id="add_display_img" >
                                        </div>

                                    </form>

                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->f_name .' '.  Auth::user()->l_name}}</span>
                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                    </div>
                                    <div class="user-action">
                                        <div class="dropdown"><a
                                                class="btn btn-icon btn-trigger me-n2"
                                                data-bs-toggle="dropdown" href="#"><em
                                                    class="icon ni ni-more-v"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="javascript:void(0)" onclick="$('#uploadUserfile').trigger('click'); return false;">
                                                        <em class="icon ni ni-camera-fill"></em>
                                                        <span>Change Photo</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <div class="user-account-info py-0">
                                    <h6 class="overline-title-alt">Nio Wallet Account</h6>
                                    <div class="user-balance">12554.39 <small
                                            class="currency currency-btc">GH¢</small></div>
                                    <div class="user-balance-sub">Locked <span>0.344939 <span
                                                class="currency currency-btc">BTC</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner p-0">
                                <ul class="link-list-menu">
                                    <li><a class="active" href="user-profile-regular.html"><em
                                                class="icon ni ni-user-fill-c"></em><span>Personal
                                                Infomation</span></a></li>
                                    <li><a href="user-profile-notification.html"><em
                                                class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
                                    </li>
                                    <li><a href="user-profile-activity.html"><em
                                                class="icon ni ni-activity-round-fill"></em><span>Account
                                                Activity</span></a></li>
                                    <li><a href="user-profile-setting.html"><em
                                                class="icon ni ni-lock-alt-fill"></em><span>Security
                                                Settings</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>



        <!-- MODALS FOR EDIT PROFILE -->
        
        <div class="modal fade" role="dialog" id="profile-edit">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content"><a href="#" class="close" data-bs-dismiss="modal"><em
                            class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-lg">
                        <h5 class="title">Update Profile</h5>
                        <ul class="nk-nav nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                    href="#personal">Personal</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#address">Address</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="full-name">Full
                                                Name</label><input type="text" class="form-control form-control-lg"
                                                id="full-name" value="Abu Bin Ishtiyak" placeholder="Enter Full name"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="display-name">Display
                                                Name</label><input type="text" class="form-control form-control-lg"
                                                id="display-name" value="Ishtiyak" placeholder="Enter display name"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="phone-no">Phone
                                                Number</label><input type="text" class="form-control form-control-lg"
                                                id="phone-no" value="+880" placeholder="Phone Number"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="birth-day">Date of
                                                Birth</label><input type="text"
                                                class="form-control form-control-lg date-picker" id="birth-day"
                                                placeholder="Enter your birth date"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="custom-control custom-switch"><input type="checkbox"
                                                class="custom-control-input" id="latest-sale"><label
                                                class="custom-control-label" for="latest-sale">Use full name to display
                                            </label></div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" data-bs-dismiss="modal" class="btn btn-lg btn-primary">Update
                                                    Profile</a></li>
                                            <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-l1">Address Line
                                                1</label><input type="text" class="form-control form-control-lg"
                                                id="address-l1" value="2337 Kildeer Drive"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label" for="address-l2">Address Line
                                                2</label><input type="text" class="form-control form-control-lg"
                                                id="address-l2" value=""></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label"
                                                for="address-st">State</label><input type="text"
                                                class="form-control form-control-lg" id="address-st" value="Kentucky"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label"
                                                for="address-county">Country</label><select class="form-select js-select2"
                                                id="address-county" data-ui="lg">
                                                <option>Canada</option>
                                                <option>United State</option>
                                                <option>United Kindom</option>
                                                <option>Australia</option>
                                                <option>India</option>
                                                <option>Bangladesh</option>
                                            </select></div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" class="btn btn-lg btn-primary">Update Address</a></li>
                                            <li><a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    @endsection