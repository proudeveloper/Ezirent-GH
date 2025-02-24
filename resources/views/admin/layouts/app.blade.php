<!DOCTYPE html>
<html lang="en">


<head>
    <title>Ezirent Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Renting Made Easy">
    <meta content="EziRent Site" name="description" />
    <meta content="Segitech" name="author" />
  
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('public/assets/img/misc/logo.png') }}">

     @yield('style')
     
     <!-- Vendor css (Require in all Page) -->
     <link href="{{ url('public/admins/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ url('public/admins/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ url('public/admins/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

     <link href="{{ url('public/assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="{{ url('public/assets/toastr/build/toastr.min.css') }}">
 
 
     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ url('public/admins/assets/js/config.js') }}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('public/assets/dist/rating/jquery.rateyo.min.css') }}"> 


    
    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('https://unicons.iconscout.com/release/v4.0.8/css/line.css') }}">

    
</head>

<body>

     <!-- START Wrapper -->
     <div class="wrapper">

          <!-- ========== Topbar Start ========== -->
         @include('admin.layouts.header_nav')
          <!-- Activity Timeline -->
         @include('admin.layouts.activities')
          <!-- Right Sidebar (Theme Settings) -->
          @include('admin.layouts.right_nav')
          <!-- ========== Topbar End ========== -->

          <!-- ========== App Menu Start ========== -->
            @include('admin.layouts.aside_nav')
          <!-- ========== App Menu End ========== -->

          <div class="page-content">

            <!-- ==================================================== -->
            <!-- Start right Content here -->
            <!-- ==================================================== -->
                @yield('content')
            <!-- ==================================================== -->
            <!-- End Page Content -->
            <!-- ==================================================== -->

                <!-- ========== Footer Start ========== -->
                @include('admin.layouts.footer')
                <!-- ========== Footer End ========== -->
                
          </div>
     </div>
     <!-- END Wrapper -->

     <script src="{{ url('public/assets/js/jquery-3.7.1.js') }}"></script>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ url('public/admins/assets/js/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ url('public/admins/assets/js/app.js') }}"></script>

     <!-- Vector Map Js -->
     <script src="{{ url('public/admins/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
     <script src="{{ url('public/admins/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
     <script src="{{ url('public/admins/assets/vendor/jsvectormap/maps/world.js') }}"></script>

     
  
    <!-- sweetalert2 plugin -->
    <script src="{{ url('public/assets/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- toastr plugin -->
    <script src="{{ url('public/assets/toastr/build/toastr.min.js') }}"></script>

    <!-- Ratings -->
    <script src="{{ url('public/assets/dist/rating/jquery.rateyo.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>


    <!-- Time Ago Plugin -->
    <script src="{{ url('public/assets/js/jquery.timeago.js') }}"></script>
  

     @yield('script')

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

    <!-- Pusher JavaScript -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script src="{{ url('public/assets/js/push_notification.js') }}"></script>

    <style>
        /* Custom style for Toastr notifications */
        .toast-info .toast-message {
            display: flex;
            align-items: center;
        }
        .toast-info .toast-message i {
            margin-right: 10px;
        }
        .toast-info .toast-message .notification-content {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
    </style>
    

</body>


</html>