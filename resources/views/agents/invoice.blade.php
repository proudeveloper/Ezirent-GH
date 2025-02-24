
@extends('agents.layouts.app')


    @section('style')
        <link rel="stylesheet" href="{{ url('public/agents/assets/css/invoice.css') }}">
    @endsection

     @section('content')
        <div class="main_content">
                       
            <div class="col-lg-12 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
                
                <!-- Print Button -->
                <div class="print-button-container">
                    <a href="javascript:window.print()" class="print-button">Print this invoice</a>
                </div>
                <div class="invoice mb-0">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row p-5 the-five">
                                <div class="col-md-6">
                                    <img src="{{ url('public/agents/assets/images/logo.svg') }}" width="80" alt="Logo">
                                </div>

                                <div class="col-md-6 text-right">
                                    <p class="font-weight-bold mb-1">Invoice #550</p>
                                    <p class="text-muted">Due to: 4 Jan, 2020</p>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row pb-5 p-5 the-five">
                                <div class="col-md-6">
                                    <h3 class="font-weight-bold mb-4">Invoice To</h3>
                                    <p class="mb-0 font-weight-bold">Carls Jhons</p>
                                    <p class="mb-0">Acme Inc</p>
                                    <p class="mb-0">Est St, 77 - Central Park, NYC</p>
                                    <p class="mb-0">6781 45P</p>
                                </div>

                                <div class="col-md-6 text-right">
                                    <h3 class="font-weight-bold mb-4">Payment Details</h3>
                                    <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                                    <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                                    <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                                    <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                                </div>
                            </div>

                            <div class="row p-5 the-five">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">VAT (10%)</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Standard Plan</td>
                                                <td>$40</td>
                                                <td>$7.55</td>
                                                <td>$47.55</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                                <div class="py-3 px-5 text-left">
                                    <div class="mb-2">Grand Total</div>
                                    <div class="h2 font-weight-light">$42.79</div>
                                </div>

                                <div class="py-3 px-5 text-right">
                                    <div class="mb-2">Discount</div>
                                    <div class="h2 font-weight-light">10%</div>
                                </div>

                                <div class="py-3 px-5 text-left">
                                    <div class="mb-2">Sub - Total</div>
                                    <div class="h2 font-weight-light">$47.55</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
     @endsection

        
    @section('script')
        
    
        <script src="{{ url('public/agents/assets/js/popper.min.js') }}"></script>
        <script src="{{ url('public/agents/assets/js/dropzone.js') }}"></script>
    

        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });

        </script>

    @endsection
   
    <!-- Wrapper / End -->