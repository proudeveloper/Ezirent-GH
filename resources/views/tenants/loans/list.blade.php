@php
    use Carbon\Carbon;
@endphp


@extends('tenants.layouts.app')


    @section('content')
    
            <div class="page-content">
                
                <div class="container-fluid p-5">
                   
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="{{ url('tenant/apply') }}" class="btn btn-primary"><span>Start New Application</span> <em class="icon ni ni-arrow-long-right"></em></a>
                        </div>
                    </div>

                    <div class="row mt-3">
                         
                        <div class="card mt-4">
                            
                            <div class="card-header h4">
                                Applications List
                            </div>

                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th><div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid">
                                            <label class="custom-control-label" for="uid"></label>
                                        </div></th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Interest</th>
                                        <th>Month</th>
                                        <th>Inconme</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                        @foreach ($getRentHistoryByMe as $history)
                                            
                                        @php
                                            $texts = '';
                                            $badge_type = '';

                                            if ($history->rent_status == 1) {
                                                $texts = 'INCOMPLETE';
                                                $badge_type = 'warning';
                                            } else if ($history->rent_status == 2) {
                                                $texts = 'PENDING';
                                                $badge_type = 'info';
                                            } else if ($history->rent_status == 3) {
                                                $texts = 'REVIEW';
                                                $badge_type = 'dark';
                                            } else if ($history->rent_status == 4) {
                                                $texts = 'APPROVED';
                                                $badge_type = 'success';
                                            }else if ($history->rent_status == 5) {
                                                $texts = 'DECLINED';
                                                $badge_type = 'danger';
                                            } else if ($history->rent_status == 6) {
                                                $texts = 'DELIVERED';
                                                $badge_type = 'primary';
                                            } else if ($history->rent_status == 0) {
                                                $texts = 'DECLINED';
                                                $badge_type = 'danger';
                                            } else {
                                                $texts = 'CAN APPLY NEW';
                                                $badge_type = 'dark';
                                            }
                                        @endphp 

                                        
                                        <tr>
                                            <td><div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid{{$history->id}}">
                                                <label class="custom-control-label" for="uid{{$history->id}}"></label>
                                            </div></td>
                                            <td>
                                                <div class="flex-1">
                                                    <h5 class="font-size-14 mt-1 mb-0"><span class="tb-lead currency-ghs">{{$history->monthly_bugbet}} <span class="dot dot-success d-md-none ms-1"></span></span></h5>
                                                    <small class="text-muted font-size-13"><span class="" style="font-size: 11px;">APP ID: {{$history->application_id}}</span></small>
                                                </div>
                                            </td>
                                            <td><span class="currency-ghs">{{$history->monthly_bugbet*$history->request_month}} </span></td>
                                            <td><span>30.00 %</span></td>
                                            <td>{{$history->request_month}}</td>
                                            <td class="currency-ghs">{{$history->net_income}}</td>
                                            <td><span class="badge bg-{{$badge_type}} text-light">{{$texts}}</span></td>
                                            <td><span>{{ Carbon::parse($history->move_in_date)->toDayDateTimeString() }}</span></td>
                                            <td>
                                            @if ($history->rent_status > 2)
                                            <div class="d-flex gap-3">
                                                    <a href="javascript:void(0);" class="btn btn-success btn-sm disabled"><i class="mdi mdi-eye"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm disabled"><i class="mdi mdi-delete"></i></a>
                                                </div>
                                            @else
                                            <div class="d-flex gap-3">
                                                    <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                </div>
                                            @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
           
    @endsection


    @section('script')
        
        {{-- <!-- apexcharts -->
        <script src="{{ url('public/tenants/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Vector map-->
        <script src="{{ url('public/tenants/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ url('public/tenants/assets/js/pages/dashboard.init.js') }}"></script> --}}

    @endsection