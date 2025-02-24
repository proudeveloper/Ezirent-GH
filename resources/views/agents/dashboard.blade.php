@extends('agents.layouts.app')

@php
    use Carbon\Carbon;
@endphp

    @section('content')
    
            <div class="page-content">
                
                <div class="container-fluid p-5">

                    <div class="row">
                        <div class="h4">Hi {{ Auth::user()->f_name.' '. Auth::user()->l_name }}</div>
                    </div>        

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-briefcase"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Published Property</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $getPropertyStats->count() }} </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-layer-group"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Under Review</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $getPropertyStatsPend->count() }}</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-airplay"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Messages Received</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">26486 </h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-md flex-shrink-0">
                                            <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                <i class="uim uim-airplay"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-4">
                                            <p class="text-muted text-truncate font-size-15 mb-2"> Total Reviews</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">26486 </h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-4">
                        <div class="col-xl-12">
                             <div class="card">
                                 <div class="card-header border-0 align-items-center d-flex pb-0">
                                     <h3 class="card-title mb-2 p-1">Listing</h3>
                                     {{-- <div>
                                         <div class="dropdown">
                                             <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                                 aria-haspopup="true" aria-expanded="false">
                                                 <span class="fw-semibold">Sort By:</span>
                                                 <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span>
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-end">
                                                 <a class="dropdown-item" href="#">Yearly</a>
                                                 <a class="dropdown-item" href="#">Monthly</a>
                                                 <a class="dropdown-item" href="#">Weekly</a>
                                                 <a class="dropdown-item" href="#">Today</a>
                                             </div>
                                         </div>
                                     </div> --}}
                                 </div>
                                 <div class="card-body pt-2">
                                     <div class="table-responsive px-2">
                                         <table class="table align-middle table-nowrap mb-0">
                                             <thead>
                                                <tr>
                                                    <th>Property Name</th>
                                                    <th>Location</th>
                                                    <th>Date</th>
                                                    <th>Last Update</th>
                                                    <th>Status</th>
                                                    <th>Publications</th>
                                                    <th>Action</th>
                                                </tr>
                                                 </tr>
                                             </thead>
                                             <tbody>

                                                
                 
                                                @foreach ($getPropertyByMe as $property)
                                        
                                                    @php

                                                        $status = '';
                                                        $text_color = '';

                                                        $ratings = App\Http\Controllers\Agent\EziAgentPropertiesController::propertyRating($property->id);

                                                        if ($property->status == 1) {
                                                            $status = 'Pending';
                                                            $text_color = 'warning';
                                                        } else if ($property->status == 2) {
                                                            $status = 'Approved';
                                                            $text_color = 'success';
                                                        } else if ($property->status == 0) {
                                                            $status = 'Declined';
                                                            $text_color = 'danger';
                                                        }
                                                        
                                                    @endphp


                                                    <input id="{{ $property->id }}" class="comm_ratings" type="hidden" name="" value="{{ $ratings }}">

                                                    <tr>
                                                        <td>{{ $property->name }}</td>
                                                        <td class="rating"><span>{{ $property->prop_location }}</span></td>
                                                       
                                                        <td>{{ Carbon::parse($property->created_at)->toDayDateTimeString() }}</td>
                                                        <td>{{ Carbon::parse($property->updated_at)->diffForHumans() }}</td>
                                                        <td class="status"><span class="active text-{{$text_color}}"><i class="fab fa-cc-mastercard me-1"></i> {{ $status }}</span></td>
                                                        <td class="status"><span class="badge rounded badge-soft-{{ $property->published == 1 ? 'success' : 'danger' }} font-size-12">{{ $property->published == 1 ? 'Published' : 'Not Published' }}</span></td>
                                                        <td class="edit">
                                                            <a class="btn btn-success btn-sm me-1" href="{{ url('edit_property', $property->id) }}"><i class="mdi mdi-pencil"></i></a>
                                                            <a class="btn btn-danger btn-sm" href="{{ url('agent/delete_property', $property->id) }}"><i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                @endforeach
                                            
                                             </tbody>
                                         </table>
                                     </div>
                                     <!-- end table-responsive -->

                                 </div>
                                 
                                 <div class="pagination-container p-4 d-flex col-12 justify-content-end">
                                    <nav>{{ $getPropertyByMe->links() }}</nav>
                                 
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
    
        <script src="{{ url('public/assets/js/prop_details.js') }}"></script>

    @endsection