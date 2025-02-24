<!doctype html>
<html lang="en">

<head>
        
        <meta charset="utf-8" />
        <title>EzirentGH Tenants</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('public/assets/img/misc/logo.png') }}">

        <!-- plugin css -->
        <link href="{{ url('public/tenants/assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Layout Js -->
        <script src="{{ url('public/tenants/assets/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ url('public/tenants/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('public/tenants/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ url('public/tenants/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        
        <!-- Tenants CSS -->
        <link href="{{ url('public/tenants/assets/css/tenants.css') }}" rel="stylesheet" type="text/css" />


        <!-- Sweet Alert 2 Css-->
        <link href="{{ url('public/tenants/assets/libs/sweetalert2/sweetalert2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Toastr Css-->
        <link href="{{ url('public/tenants/assets/libs/toastr/build/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Banca -->
        <link rel="stylesheet" type="text/css" href="{{ url('public/tenants/banca/css/style.css') }}" media="all" />

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="{{ url('public/agents/assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/agents/assets/css/font-awesome.min.css') }}">
        
        
        @yield('style')

    </head>

    <body data-sidebar="colored">
        <!-- Preloader -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="round_spinner">
                    <div class="spinner"></div>
                    <div class="text">
                        <img src="{{ url('public/assets/img/misc/logo.png') }}" alt="">
                    </div>
                </div>
                <h1 class="head">EzirentGH</h1>
                <p></p>
            </div>
        </div>
    
        <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('tenants.layouts.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('tenants.layouts.aside')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('content')
              
                @include('tenants.layouts.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('tenants.layouts.right')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ url('public/tenants/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/node-waves/waves.min.js') }}"></script>
            
        <!-- sweetalert2 plugin -->
        <script src="{{ url('public/tenants/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- toastr plugin -->
        <script src="{{ url('public/tenants/assets/libs/toastr/build/toastr.min.js') }}"></script>

        
        <!-- MAIN JS FOR TENANTS -->
        <script src="{{ url('public/tenants/assets/js/main_tenants.js') }}"></script>
        

        <!-- Preloader -->
        <script type="text/javascript" src="{{ url('public/tenants/banca/js/preloader.js') }}"></script>

        <!-- Icon -->
        <script src="{{ url('public/tenants/assets/script/monochrome/bundle.js') }}"></script>

        @yield('script')


        <!-- App js -->
        <script src="{{ url('public/tenants/assets/js/app.js') }}"></script>


            
        <script type="text/javascript">
            $('.currency-inr').each(function () {
                var monetary_value = $(this).text();
                var i = new Intl.NumberFormat('en-IN', {
                    style: 'currency',
                    currency: 'INR'
                }).format(monetary_value);
                $(this).text(i);
            });
        
            // var currency_type = {
            //     "usd": {'style': 'currency' en-US},
            // };
        
            $('.currency-usd').each(function () {
                var monetary_value = $(this).text();
                var i = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD'
                }).format(monetary_value);
                $(this).text(i);
            });
        
        
            $('.currency-ghs').each(function () {
                var monetary_value = $(this).text();
                var i = new Intl.NumberFormat('en-GH', {
                    style: 'currency',
                    currency: 'GHS'
                }).format(monetary_value);
                $(this).text(i);
            });
        
            
            $('.currency-eru').each(function () {
                var monetary_value = $(this).text();
                var i = new Intl.NumberFormat('en-ER', {
                    style: 'currency',
                    currency: 'EUR'
                }).format(monetary_value);
                $(this).text(i);
            });
        
        </script>
    
  
    </body>


</html>