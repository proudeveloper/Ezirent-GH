@php
    $segments = Request::segment(1);


    // echo '<h1>'.$segments.'</h1>';
@endphp

<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8" />
  <title>Ezirent Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="EziRent Site" name="description" />
  <meta content="Segitech" name="author" />

  
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ url('public/assets/img/misc/logo.png') }}">
  <meta name="robots" content="noindex, nofollow">

  <!-- Favicons -->
  <link href="{{ url('public/assets/img/misc/logo.png') }}" rel="icon">
  <link href="{{ url('public/assets/img/misc/logo.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="{{ url('https://fonts.googleapis.com/') }}" rel="preconnect">
  <link href="{{ url('https://fonts.gstatic.com/') }}" rel="preconnect" crossorigin>
  <link href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('public/assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ url('public/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}
  <link href="{{ url('public/assets/vendors/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('public/assets/vendors/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('public/assets/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ url('public/assets/css/main.css') }}" rel="stylesheet">
  <!-- Main For FAQ  -->
  <link rel="stylesheet" href="{{ url('public/assets/css/main_eStart.css') }}">
  
  <link href="{{ url('public/assets/css/ezistyle.css') }}" rel="stylesheet">


  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css') }}"/>
  <link rel="stylesheet" href="{{ url('https://unicons.iconscout.com/release/v4.0.8/css/line.css') }}">

  
  <!-- Ratings -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/rating/jquery.rateyo.min.css') }}" />


    <!-- Toastr Css-->
    <link href="{{ url('public/tenants/assets/libs/toastr/build/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

  @yield('style')
        

</head>

<body class="{{ $segments == '' ? 'index-page' : 'service-details-page' }}">

    @include('clients.layouts.header')

  <main class="main">

            
    @yield('content')


  </main>


  
  @include('clients.layouts.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="mdi mdi-arrow-up-bold"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>




  <!-- Modal -->
  <div class="modal top fade" id="rentCalculatorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: var(--main-color); border-radius: 60px; width: 50px; height: 50px;"><span aria-hidden="true" class="fw-20 fs-2">&times;</span></button>
        <div class="modal-content w-75">
            <div class="modal-body p-4">
                <img src="{{ url('public/assets/img/misc/eziRentLogo.png') }}" alt="avatar" class="rounded position-absolute top-0 start-50 translate-middle h-50" />
                <!-- <form> -->
                    <div>
                      
                      <h4 class="pt-5 my-3">Check Your Affordability</h4>
                      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <label for="net_income" class="form-label rent_amount_r">Net Monthly Income <span class="net_income-r">*</span></label>
                          <input id="net_income" type="number" name="net_income" class="form-control" id="exampleInputEmail1" placeholder="Enter your monthly income" required>
                          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label for="rent_amount" class="form-label">Monthly Rent Amount <span id="rent_amount-r">*</span></label>
                          <input id="rent_amount" type="number" name="rent_amount" class="form-control" placeholder="Enter your rent month amount" required>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                          <label for="rent_duration" class="form-label">Rent Duration (Monthly) <span id="rent_duration-r">*</span></label>
                          <select id="rent_duration" class="form-select" name="rent_duration" required>
                            <option value="" selected>-Select your rent duration-</option>
                            <option value="6">6 Months</option>
                            <option value="12">12 Months</option>
                          </select>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                          <label for="payback_duration" class="form-label">Number of Months To Payback <span id="payback_duration-r">*</span></label>
                          <select id="payback_duration" class="form-select" name="payback_duration" required>
                            <option value="" selected>-Select your payback duration-</option>
                            <option value="6">6 Months</option>
                            <option value="12">12 Months</option>
                          </select>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                          <label for="employment_status" class="form-label">Select your employment status <span id="employment_status-r">*</span></label>
                          <select id="employment_status" class="form-select" name="employment_status" required>
                            <option value="" selected>-Select your employment status-</option>
                            <option value="1">Employed</option>
                            <option value="2">Self-Employed</option>
                            <option value="0">Unemployed</option>
                          </select>
                        </div>

                        <!-- Submit button -->
                        <div class="buy_btns">
                          <button class="btn btn-primary check_affordability_btn">Check Your Affordability</button>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
  </div>
  <!-- Modal -->


  <!-- Modal -->
  <div class="modal fade" id="confirmRenCalculationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-body p-4">
                <img src="{{ url('public/assets/img/misc/eziRentLogo.png') }}" alt="avatar" class="rounded position-absolute top-0 start-50 translate-middle h-50" />
                <!-- <form> -->
                  <div>
                    <h4 class="pt-5 my-3">Expected Monthly Payment</h4>
                      <div class="col-lg-12 align-items-lg-start" data-aos="zoom-in" data-aos-delay="200">
                        
                        <h4 class="expected_amount currency-ghs">2000</h4>
                        <div>
                          <div class="total_amount_to_pay mb-3"><i class="ri-close-fill"></i> <span>0</span></div>
                          <div class="payback_durations mb-3"><i class="ri-close-fill"></i> <span>0/span></div>
                          <div class="not_affordable mb-3"><i class="ri-close-fill"></i> <span>0/span></div>
                        </div>
    
    
    
                        <div class="row buy_btns">
                          <div class="col-6">
                            <button class="btn apply_btn" data-bs-target="#rentCalculatorModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back to Calculator</button>
                          </div>
                          <div class="col-6">
                            <button class="btn apply_btn apply_rental_btn">Start Your Application</button>
                          </div>
                        </div>
                      </div>
                  </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
  </div>
  <!-- Modal -->



  <script src="{{ url('public/assets/js/jquery-3.7.1.js') }}"></script>

  
  
  <!-- Vendor JS Files -->
  <script data-cfasync="false" src="{{ url('public/assets/vendors/email-decode/email-decode.min.js') }}"></script>
  <script src="{{ url('public/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('public/assets/vendors/php-email-form/validate.js') }}"></script>
  <script src="{{ url('public/assets/vendors/aos/aos.js') }}"></script>
  <script src="{{ url('public/assets/vendors/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('public/assets/vendors/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('public/assets/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ url('public/assets/vendors/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('public/assets/vendors/countup/countUp.umd.js') }}"></script>


  <!-- Main JS File -->
  <script src="{{ url('public/assets/js/main.js') }}"></script>
  <!-- Main For FAQ  -->
  <script src="{{ url('public/assets/js/main_eStart.js') }}"></script>

<!-- For Icons -->
{{-- <script src="{{ url('public/assets/dist/icons/fa6.6.0/all.min.js') }}"></script> --}}

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ url('public/agents/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/agents/assets/css/font-awesome.min.css') }}">
    

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


 <!-- Ratings -->
 <script src="{{ url('public/assets/dist/rating/jquery.rateyo.min.js') }}"></script>


  <!-- toastr plugin -->
  <script src="{{ url('public/tenants/assets/libs/toastr/build/toastr.min.js') }}"></script>



@yield('script')

</body>


</html>