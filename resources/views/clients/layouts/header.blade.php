
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="{{ url('public/assets/img/misc/logo.png') }}" alt="">
      <h6 class="sitename text-white"> Ezirent</h6>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}" class="@if(Request::segment(0) == '/') active @endif">Home</a></li>
        <li class="dropdown"><a href="{{ url('/#about_us') }}"><span>About Us</span> <i class="mdi mdi-chevron-down"></i></a>
          <ul>
            <li><a href="{{ url('/#features')}}">Why Choose Us</a></li>
            <li><a href="{{ url('/#our_numbers') }}">Our Numbers</a></li>
            <li><a href="{{ url('/#our_partners') }}" class="@if(Request::segment(0) == '#our_partners') active @endif">Our Patners</a></li>
            <li><a href="{{ url('/#our_team') }}">Our Team</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/properties') }}" class="@if(Request::segment(1) == 'properties') active @endif">Browse Properties</a></li>
        <li><a data-bs-toggle="modal" href="{{ url('/#rentCalculatorModal') }}">Rent Calculator</a></li>
        <li><a href="{{ url('/#testmonials') }}" class="{{ Request::segment(0) == '#testmonialss' ? 'active' : ''}}">Testimonials</a></li>
        <li><a href="{{ url('/#faq') }}" class="">FAQ</a></li>
        <li><a href="{{ url('/#contact') }}" class="">Contact Us</a></li>
        
      </ul>
      <span class="mobile-nav-toggle d-xl-none bi bi-list"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </nav>

    <a class="btn-getstarted" href="{{ url('tenant/apply')}}">Apply Now</a>

    <a class="btn-getstarted" href="{{ url('/login')}}">Login</a>

  </div>
</header>
  {{-- @if(Request::segment(2) == 'dashboard') active @endif --}}