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
    
        <!-- Start Container Fluid -->
        <div class="container">

            <div class="row">
                 <div class="col-xl-9">
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="card">
                                  <div class="card-header">
                                       <h4 class="card-title d-flex align-items-center gap-1">
                                            <iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>Notification Settings
                                        </h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                        <div class="container mt-2">
                                            <h1>Create a New Post</h1>

                                            <!-- Display validation errors if any -->
                                            {{-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                    
                                            <form action="{{ url('admin/send_my_notifications') }}" method="POST" id="send_my_notifications">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="meta-tag">Author:</label>
                                                    <input type="text"  id="meta-tag" class="form-control" name="author" value="{{ old('author') }}" required>
                                                </div>
                                    
                                                <div class="form-group mb-3">
                                                    <label for="meta-tag">Title:</label>
                                                    <input type="text"  id="meta-tag" class="form-control" name="title" value="{{ old('title') }}" required>
                                                </div>
                                    
                                                <button type="submit" class="btn btn-primary">Create Post</button>
                                            </form> --}}
                                        </div>
                                       {{-- <div class="row">
                                        
                                            <a class="btn btn-success" id="send_getTrack" href="javascript:void(0);" data-total_amount="40.0"> Get Track</a>
                                            <div class="notifications_table_div"></div>
                                       </div> --}}
                                    </div>
                                  </div>
                             </div>

                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-lg-12">
                             <div class="card">
                                  <div class="card-header">
                                       <h4 class="card-title d-flex align-items-center gap-1">
                                            <iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>Property Type Settings
                                        </h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                        <form action="{{ url('admin/add_new_property_cat_form') }}" method="POST" class="mb-4" id="add_new_property_cat_forms">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="meta-tag" class="form-label">Name</label>
                                                    <input type="text" id="meta-tag" name="name" class="form-control" placeholder="Family House" value="{{ old('name') }}" required>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="meta-tag" class="form-label">Code Name</label>
                                                    <input type="text" id="meta-tag" name="code_name" class="form-control" placeholder="family_house" value="{{ old('code_name') }}" required>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="meta-tag" class="form-label">Filter Name</label>
                                                    <input type="text" id="meta-tag" name="filters" class="form-control" placeholder=".filter-family_house" value="{{ old('filters') }}" required>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="meta-tag" class="form-label">Action</label>
                                                    <div>
                                                        <button type="submit" id="meta-tag" class="btn btn-primary w-100">Add New Property Type</button>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        </form>
                                       <div class="row">
                                            <div class="property_type_table_div"></div>
                                       </div>
                                    </div>
                                  </div>
                             </div>

                        </div>
                    </div>


                 </div> <!-- end col -->

                 <div class="col-xl-3">
                      <div class="card docs-nav">
                           <ul class="nav bg-transparent flex-column">
                                <li class="nav-item">
                                     <a href="#basic" class="nav-link">Property Type Settings </a>
                                </li>
                                <li class="nav-item">
                                     <a href="#inverse" class="nav-link">General Settings </a>
                                </li>
                           </ul>
                      </div>
                 </div>
            </div> <!-- end row -->
        </div>
        <!-- End Container Fluid -->

    @endsection


    @section('script')
    
        <!-- Gridjs Demo js -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

        <script src="{{ url('public/assets/js/make_payments.js') }}"></script>
        <script src="{{ url('public/admins/assets/js/admin_settings.js') }}"></script>

    @endsection