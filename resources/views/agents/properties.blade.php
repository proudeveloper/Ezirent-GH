
@php
    use Carbon\Carbon;
@endphp


@extends('agents.layouts.app')


@section('style')

    <!-- DataTables -->
    <link href="{{ url('public/tenants/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/tenants/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/tenants/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ url('public/tenants/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />     

@endsection

@section('content')
    
    <div class="main_content">
            <div class="page-content">
                <div class="container-fluid p-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Header
                                </div>
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Property Info</th>
                                                <th>Date Added</th>
                                                <th>Last Update</th>
                                                <th>Status</th>
                                                <th>Publications</th>
                                                <th>Views</th>
                                                <th>Actions</th>
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
                                                <td class="image myelist">
                                                    <a href="{{ url('overview/prop_detail',  $property->id )}}">
                                                        <img alt="my-properties-3" src="{{ url($property->getPropertyImage()) }}" class="rounded avatar-lg">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="inner">
                                                        <a href="{{ url('overview/prop_detail',  $property->id )}}"><h5>{{ $property->name }}</h5></a>
                                                        <figure><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $property->prop_location }} </figure>
                                                        <div class="row justify-content-start d-flex">
                                                            ({{ $ratings }}) 
                                                            <div class="comment_ratings_{{ $property->id }}"  data-rateyo-read-only="true" data-rateyo-half-star="true"></div>
                                                        </div>
                                                        
                                                        {{-- <div class="comment_ratingse_{{ $property->id }}"  data-rateyo-read-only="true" data-rating_val="{{ $ratings }}"></div> --}}
                                                        {{-- <div class="profile_rate"  data-rateyo-read-only="true" data-rating_val="{{ $ratings }}"></div> --}}
                                                        {{-- <p>{{ $property->rating_value }}</p> --}}
                                                    </div>
                                                </td>
                                                <td>{{ Carbon::parse($property->created_at)->toDayDateTimeString() }}</td>
                                                <td>{{ Carbon::parse($property->updated_at)->diffForHumans() }}</td>
                                                        <td class="status"><span class="active text-{{$text_color}}"><i class="fab fa-cc-mastercard me-1"></i> {{ $status }}</span></td>
                                                        <td class="status"><span class="badge rounded badge-soft-{{ $property->published == 1 ? 'success' : 'danger' }} font-size-12">{{ $property->published == 1 ? 'Published' : 'Not Published' }}</span></td>
                                                <td>{{ $property->prop_views }}</td>
                                                <td class="actions">
                                                    <a href="{{ url('edit_property', $property->id) }}" class="edit"><i class="ri-edit-box-fill"></i> Edit</a>
                                                    <a href="{{ url('agent/delete_property', $property->id) }}"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection


@section('script')
    
    <script src="{{ url('public/assets/js/prop_details.js') }}"></script>

   <!-- Required datatable js -->
   <script src="{{ url('public/tenants/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ url('public/tenants/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ url('public/tenants/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('public/tenants/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ url('public/tenants/assets/js/pages/datatables.init.js') }}"></script>


@endsection