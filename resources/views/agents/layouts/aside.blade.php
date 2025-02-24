@php
    $segments = Request::segment(2);


    // echo '<p>'.$segments.'</p>';
@endphp
  
  
  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
       <a href="{{ url('agent/dashboard') }}" class="logo logo-dark">
           <span class="logo-sm mt-4">
                <img src="{{ url('public/assets/img/misc/logo.png') }}" alt="logo-sm-dark" height="24">
           </span>
           <span class="logo-lg">
                <div class=" d-flex justify-content-start">
                    <img src="{{ url('public/assets/img/misc/logo.png') }}" alt="logo-dark" height="22"> <div class="h4 text-white">EzirentGH</div>
                </div>
           </span>
       </a>

       <a href="{{ url('agent/dashboard') }}" class="logo logo-light mt-4">
           <span class="logo-sm">
                <img src="{{ url('public/assets/img/misc/logo.png') }}" alt="logo-sm-light" height="24">
           </span>
           <span class="logo-lg">
                <div class=" d-flex justify-content-start">
                    <img src="{{ url('public/assets/img/misc/logo.png') }}" alt="logo-light" height="22"> <div class="h4 text-white">EzirentGH</div>
                </div>
           </span>
       </a>
   </div>

   <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn" id="vertical-menu-btn">
       <i class="ri-menu-2-line align-middle"></i>
   </button>

   <div data-simplebar class="vertical-scroll">

       <!--- Sidemenu -->
       <div id="sidebar-menu">

           
           <!-- Left Menu Start -->
           <ul class="metismenu list-unstyled" id="side-menu">
               <li class="menu-title">Menu</li>

                <li>
                    <a class="waves-effect {{ $segments == 'dashboard' ? 'active' : '' }}" href="{{ url('agent/dashboard') }}">
                        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect {{ $segments == 'add_property' ? 'active' : '' }}" href="{{ url('agent/add_property') }}">
                        <i class="fa fa-list" aria-hidden="true"></i><span>Add Property</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect {{ $segments == 'properties' ? 'active' : '' }}" href="{{ url('agent/properties') }}">
                        <i class="fa fa-list" aria-hidden="true"></i><span>My Properties</span>
                    </a>
                </li>
                {{-- <li>
                    <a class="waves-effect {{ $segments == 'favorite' ? 'active' : '' }}" href="{{ url('agent/favorite') }}">
                        <i class="fa fa-heart" aria-hidden="true"></i><span>Favorited Properties</span>
                    </a>
                </li> --}}
                <li>
                    <a class="waves-effect {{ $segments == 'payment' ? 'active' : '' }}" href="{{ url('agent/payment') }}">
                        <i class="fas fa-credit-card"></i><span>Payments</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect {{ $segments == 'invoice' ? 'active' : '' }}" href="{{ url('agent/invoice') }}">
                        <i class="fas fa-paste"></i><span>Invoices</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect {{ $segments == 'messages' ? 'active' : '' }}" href="{{ url('agent/messages') }}">
                        <i class="fa fa-commenting" aria-hidden="true"></i><span>Messages</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect {{ $segments == 'profile' ? 'active' : '' }}" href="{{ url('agent/profile') }}">
                        <i class="fa fa-user"></i><span>Profile</span>
                    </a>
                </li>
           </ul>

       </div>
       <!-- Sidebar -->
   </div>

   <div class="dropdown px-3 sidebar-user sidebar-user-info">
       <button type="button" class="btn w-100 px-0 border-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="d-flex align-items-center">
               <div class="flex-shrink-0">
                       <img src="{{ Auth::user()->getUserImage() }}" class="img-fluid header-profile-user rounded-circle" alt="">
               </div>

               <div class="flex-grow-1 ms-2 text-start">
                   <span class="ms-1 fw-medium user-name-text">{{ Auth::user()->f_name .' '.  Auth::user()->l_name}}</span>
               </div>

               <div class="flex-shrink-0 text-end">
                   <i class="mdi mdi-dots-vertical font-size-16"></i>
               </div>
           </span>
       </button>
       <div class="dropdown-menu dropdown-menu-end">
           <!-- item-->
           <a class="dropdown-item" href="{{ url('agent/profile') }}"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
           {{-- <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
           <a class="dropdown-item" href="pages-faq.html"><i class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Help</span></a> --}}
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="{{ url('agent/settings') }}"><span class="badge bg-primary mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
           <a class="dropdown-item" href="{{ url('agent/logout') }}"><i class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Log Out</span></a>
       </div>
   </div>

</div>
<!-- Left Sidebar End -->
