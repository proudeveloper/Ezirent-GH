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

        <div class="row">
           

               <div class="col-md-6 col-xl-3">
                    <div class="card">
                         <div class="card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                   <div>
                                        <h4 class="card-title mb-2">Approved Properties</h4>
                                        <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllApproved->count() }}</p>
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
                                        <h4 class="card-title mb-2">Published Properties</h4>
                                        <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllPublishedProp->count() }}</p>
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
                                     <h4 class="card-title mb-2">Declined Properties</h4>
                                     <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllDeclinedProp->count() }}</p>
                                </div>
                                <div>
                                     <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                          <iconify-icon icon="solar:cart-cross-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
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
                                   <h4 class="card-title mb-2">Pending Review</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">{{ $getAllPending->count() }}</p>
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
       </div>

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
                                            <th>Property</th>
                                            <th>Agent / Landlord</th>
                                            <th>Contact</th>
                                            <th>Rent for</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                            <th>Published</th>
                                            <th>When Applied</th>
                                            <th>Action</th>
                                       </tr>
                                  </thead>
                                  <tbody>

                                    @foreach ($getAllProperties as $property)

                                  
                                        <tr>
                                             <td>{{ $property->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                       <a href="{{ url('admin/property_detail', $property->id)}}">
                                                            <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                 <img src="{{ $property->getPropertyImage() }}" alt="" class="avatar-md">
                                                            </div>
                                                       </a>
                                                            <div>
                                                                 <p class="text-dark fw-medium fs-15" style="width: 150px; overflow:  hidden; text-overflow: ellipsis; white-space: nowrap; ">{{ $property->name }}</p>
                                                                 <p class="text-muted mb-0 mt-1 fs-13"><span>{{ $property->prop_cat }}</p>
                                                            </div>
                                                       
                                               </div>
                                             
                                            </td>
                                            <td>
                                                {{ $property->created_by_fname . ' '. $property->created_by_lname }}
                                            </td>
                                            <td>{{ $property->user_phone }}</td>
                                            <td class=" currency-ghs"> {{$property->rent_amount }}</td>
                                            <td> <span class="badge bg-success text-light px-2 py-1 fs-13">{{$property->prop_views }}</span></td>
                                            <td>
                                                <select class="form-control status_btn sm" style="width: 6.65em;" data-data_id="{{ $property->id }}" data-status_val="{{ $property->published }}">
                                                    <option value="1" {{ $property->status == 1 ? 'selected' : '' }}>Pending</option>
                                                    <option value="2" {{ $property->status == 2 ? 'selected' : '' }}>Approved</option>
                                                    <option value="0" {{ $property->status == 0 ? 'selected' : '' }}>Declined</option>
                                                </select>
                                            </td>
                                            <td>
                                                
                                                @if ($property->status == 2)
                                                    <div class="form-check form-switch" id="publish_prop_div_{{ $property->id }}">
                                                        <input class="form-check-input publish_prop_btn" data-data_id="{{ $property->id }}" type="checkbox" role="switch" id="flexSwitchCheckChecked1" {{ $property->published == 1 ? 'checked' : '' }} >
                                                    </div>
                                                @else
                                                    <div class="form-check form-switch" id="publish_prop_div_{{ $property->id }}">
                                                        <input class="form-check-input" type="checkbox" disabled >
                                                    </div>
                                                @endif
                                                    
                                                </div>
                                            </td>
                                            <td>{{ Carbon::parse($property->created_at)->toDayDateTimeString() }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                  
                                                    <a href="{{ url('admin/property_detail', $property->id)}}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                    {{-- <a href="javascript:void(0);" class="btn btn-soft-primary btn-sm reset_tenant_btn" data-data_id="{{ $property->id }}" title="Reset Tenant"><iconify-icon icon="mdi:lock-reset" class="align-middle fs-18"></iconify-icon></a> --}}
                                                    <a href="javascript:void(0);" class="btn btn-soft-danger btn-sm delete_property_btn" data-data_id="{{ $property->id }}" title="Delete Application"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                    
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