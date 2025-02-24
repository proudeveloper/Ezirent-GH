@php
    use Carbon\Carbon;
@endphp


@extends('admin.layouts.app')

    @section('style')
        
        <!-- Gridjs Plugin css -->
        <link rel="stylesheet"  href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css') }}" />
        <link rel="stylesheet"  href="{{ url('https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css') }}">
     
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
    <div class="container-xxl">

        {{-- <div class="row">
           

               <div class="col-md-6 col-xl-3">
                    <div class="card">
                         <div class="card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                   <div>
                                        <h4 class="card-title mb-2">Registered</h4>
                                        <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllApply->count() }}</p>
                                   </div>
                                   <div>
                                        <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:clipboard-check-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               
            <div class="col-md-6 col-xl-3">
                 <div class="card">
                      <div class="card-body">
                           <div class="d-flex align-items-center justify-content-between">
                                <div>
                                     <h4 class="card-title mb-2">Pending Approval</h4>
                                     <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllApplyPending->count() }}</p>
                                </div>
                                <div>
                                     <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="material-symbols:order-approve" class="fs-32 text-primary avatar-title"></iconify-icon>
                                     </div>
                                </div>
                           </div>
                      </div>
                 </div>
            </div>
       
            <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Renting</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllApplyDelivered->count() }}</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="material-symbols:bedroom-parent" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                     <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                               <div>
                                    <h4 class="card-title mb-2">Booked Viewing</h4>
                                    <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllBookings->count() }}</p>
                               </div>
                               <div>
                                    <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                       <iconify-icon icon="solar:clock-circle-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                    </div>
                               </div>
                          </div>
                     </div>
                </div>
             </div>
       </div> --}}

        <div class="row">
            <div class="col-xl-12 p-0 m-0">
                
                <div class="card m-0 p-0">

                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                             <h4 class="card-title">All Applications List</h4>
                        </div>

                   </div>
           
                    <div class="card-body">
                        <div class="table-responsive">
                             <table id="properties_table"  class="table align-middle table-hover table-centered">
                                  <thead class="bg-light-subtle">
                                       <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Tenant</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Enable</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                       </tr>
                                  </thead>
                                  <tbody>

                                    @foreach ($getAllTenants as $tenant)

                                  
                                        <tr>
                                             <td>{{ $tenant->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                  
                                                  <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                       <img src="{{ $tenant->getUserImage() }}" alt="{{ $tenant->f_name }}" class="avatar-md">
                                                  </div>
                                                  
                                               </div>
                                             
                                            </td>
                                            <td>
                                                {{ $tenant->f_name . ' '. $tenant->l_name }}
                                            </td>
                                            <td>{{ $tenant->email }}</td>
                                            <td>{{ $tenant->phone }}</td>
                                            <td>
                                                  <div class="form-check form-switch" id="user_status_div_{{ $tenant->id }}">
                                                       <input class="form-check-input user_status_btn" data-data_id="{{ $tenant->id }}" type="checkbox" role="switch" id="flexSwitchCheckChecked1" {{ $tenant->status == 1 ? 'checked' : '' }} >
                                                  </div>
                                             </td>
                                            <td>{{ Carbon::parse($tenant->created_at)->toDayDateTimeString() }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                  
                                                    {{-- <a href="{{ url('admin/property_detail', $tenant->prop_id) }}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a> --}}
                                                  
                                                    <a href="javascript:void(0);" class="btn btn-soft-danger btn-sm delete_user_btn" data-data_id="{{ $tenant->id }}" data-user_page="tenants" title="Delete Application"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                  

                                  </tbody>
                             </table>
                        </div>
                        <!-- end table-responsive -->
                   </div>
          
                </div>

            </div> <!-- end card body -->

        </div> <!-- end row -->

    </div>
    <!-- End Container Fluid -->

    @endsection


    @section('script')
        
        <!-- Gridjs Demo js -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

        <script src="{{ url('public/admins/assets/js/admin_properties.js') }}"></script>

    @endsection