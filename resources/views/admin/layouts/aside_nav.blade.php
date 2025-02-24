    
    <div class="main-nav">
        <!-- Sidebar Logo -->
        <div class="logo-box">
            {{-- <a href="index.html" class="logo-dark">
                <img src="{{ url('public/admins/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                <img src="{{ url('public/admins/assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
            </a> --}}
            {{-- <a href="{{ url('admin/dashboard')}}" class="logo-dark d-flex justify-content-start">
                <img src="{{ url('public/assets/img/misc/logo.png') }}" class="logo-sm" alt="logo sm">
                <img src="{{ url('public/assets/img/misc/logo.png') }}" class="logo-lg" alt="logo dark">
                <div class="h3">EzirentGH</div>
            </a> --}}

            <a href="{{ url('admin/dashboard')}}" class="logo-light d-flex justify-content-start mt-4">
                <img src="{{ url('public/assets/img/misc/logo.png') }}" class="logo-sm m-0" style="width: 30px; height: 3vh;" alt="logo sm">
                <img src="{{ url('public/assets/img/misc/logo.png') }}" class="logo-lg m-0" style="width: 30px; height: 3vh;" alt="logo light">
                <div class="h2 fw-bolder text-white ms-2">EzirentGH</div>
            </a>

        </div>

        <!-- Menu Toggle Button (sm-hover) -->
        <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
            <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
        </button>

        <div class="scrollbar" data-simplebar>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title">General</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Dashboard </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/messages')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:mailbox-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Messages </span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/application')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:lock-keyhole-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Application </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Assets</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/properties')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:card-send-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Properties </span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/tenants')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Tenants </span>
                    </a>
                </li>

                   
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/agents')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Agents </span>
                    </a>
                </li>

                   
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/landlords')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Landlords </span>
                    </a>
                </li>


                <li class="menu-title mt-2">Bookings</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/view_booking')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="basil:book-check-solid"></iconify-icon>
                            </span>
                            <span class="nav-text"> Tenants Bookings </span>
                    </a>
                </li>

                
                
                <li class="menu-title mt-2">Finance</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/finance')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:box-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Finance Overview </span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/tenants')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Payables </span>
                    </a>
                </li>

                   
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/landlords')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Receivables </span>
                    </a>
                </li>

                
                <li class="menu-title mt-2">Support</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/support')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:pie-chart-2-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Support Overview </span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/tenant_report')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Tenants Report </span>
                    </a>
                </li>

                   
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/landlord_report')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Landlord Report </span>
                    </a>
                </li>

             
                <li class="menu-title mt-2">Internal</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/staff')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Staff </span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/profile')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:user-speak-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Profile </span>
                    </a>
                </li>

                   
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/my_messages')}}">
                            <span class="nav-icon">
                            
                                <iconify-icon icon="solar:chat-round-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> My Messages </span>
                    </a>
                </li>



      
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/get_notifications')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="clarity:notification-solid"></iconify-icon>
                            </span>
                            <span class="nav-text"> Notifications </span>
                    </a>
                </li>


      
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/settings')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Settings </span>
                    </a>
                </li>



            </ul>
        </div>
    </div>