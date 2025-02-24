@extends('tenants.layouts.app')


    @section('content')
    
            <div class="page-content">
                
                <div class="container-fluid p-5">
                    
                    
                    <div class="row">
                        <div class="h4">Hi {{ Auth::user()->f_name.' '. Auth::user()->l_name }}</div>
                    </div>        

                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-briefcase"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Total Repayment Amount</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3 currency-ghs">34123.20 </h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-layer-group"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Amount Paid</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3 currency-ghs">63234</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-airplay"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Amount Remaining</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3 currency-ghs">26482.46 </h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-5">
                                            <div class="text-center mb-5">
                                                <h4 class="mt-2">Recent Payment Details</h4>
                                                {{-- <p class="text-muted mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo veritatis</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
            
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="pricing-box border mt-4 rounded">
                                                <div class="pricing-content">
                                                    <i class="mdi mdi-cash h1"></i>
                                                    <h4 class="mt-3">Previous</h4>
                                                    <p class="text-muted mt-3 mb-5">Your payments done in the last two previous.</p>
                                                    <hr>
                                                    <div class="pricing-plan mt-4 text-primary text-center">
                                                        <h1><span class="currency-ghs">365</span> <small class="fw-normal font-size-16 text-muted"> / Amount</small></h1>
                                                    </div>
                                                    <hr>
                                                    
                                                    <div class="pricing-features pt-3 my-4">
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">Paid late</strong></p>
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">Thu, 19th December, 2024</strong> || Due Date</p>
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">0242330799</strong> || Momo Number</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="pricing-box border mt-4 rounded">
                                                <div class="pricing-content">
                                                    <i class="mdi mdi-cash h1"></i>
                                                    <h4 class="mt-3">Previous</h4>
                                                    <p class="text-muted mt-3 mb-5">Your payments done in the previous time.</p>
                                                    <hr>
                                                    <div class="pricing-plan mt-4 text-primary text-center">
                                                        <h1><span class="currency-ghs">365</span> <small class="fw-normal font-size-16 text-muted"> / Amount</small></h1>
                                                    </div>
                                                    <hr>
                                                    <div class="pricing-features pt-3 my-4">
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">Paid on time</strong></p>
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">Thu, 19th December, 2024</strong> || Due Date</p>
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">0242330799</strong> || Momo Number</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-sm-6">
                                            <div class="pricing-box border bg-primary text-white mt-4 rounded">
                                                <div class="pricing-badge">
                                                    <span class="badge">Due</span>
                                                </div>
                                                <div class="pricing-content">
                                                    <i class="mdi mdi-cash h1 text-white"></i>
                                                    <h4 class="mt-3 text-white">Next Due Payment</h4>
                                                    <p class="text-white-50 mt-3 mb-4">You can make payments before due date, by clicking on the pay now button.
                                                    </p>
                                                    <hr>
                                                    <div class="pricing-plan mt-4 text-primary text-center">
                                                        <h1 class="text-white"><span class="currency-ghs">489</span> <small class="fw-normal font-size-16 text-white-50"> / Amount</small></h1>
                                                    </div>
                                                    <hr>
                                                    <div class="pricing-features pt-3">
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">2</strong> || Days Remaining</p>
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">Thu, 19th December, 2024</strong> || Due Date</p>
                                                        <p class="text-white-50 mb-2"><i class="mdi mdi-checkbox-marked-circle text-white font-size-16 me-2"></i><strong class="text-white">0242330799</strong> || Momo Number</p>
                                                    </div>
                                                    <div class="pricing-border mt-3"></div>
                                                    <div class="mt-4 pt-2 text-center">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-round">Pay Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                     </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
           
    @endsection


    @section('script')
        
        <!-- apexcharts -->
        {{-- <script src="{{ url('public/tenants/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Vector map-->
        <script src="{{ url('public/tenants/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/jsvectormap/maps/world-merc.js') }}"></script> --}}

        {{-- <script src="{{ url('public/tenants/assets/js/pages/dashboard.init.js') }}"></script> --}}

    @endsection