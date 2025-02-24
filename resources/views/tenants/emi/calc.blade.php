@extends('tenants.layouts.app')

    @section('content')
        <div class="mt-5">
            <div class="container-fluid p-5">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Repayment Breakdown</h3>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block invest-block">
                        <form action="#" class="invest-form">
                            <div class="row">
                                {{-- <div class="col-xxl-7 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invest-field form-group"><input type="hidden"
                                                    value="silver" name="iv-plan" id="invest-choose-plan">
                                                <div class="dropdown invest-cc-dropdown"><a href="#"
                                                        class="invest-cc-chosen dropdown-indicator"
                                                        data-bs-toggle="dropdown">
                                                        <div class="coin-item">
                                                            <div class="coin-icon"><em
                                                                    class="icon ni ni-offer-fill"></em></div>
                                                            <div class="coin-info"><span
                                                                    class="coin-name">Education</span><span
                                                                    class="coin-text">Take Platinum package and
                                                                    get 5% profit.</span></div>
                                                        </div>
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="invest-cc-list">
                                                            <li class="invest-cc-item selected"><a href="#"
                                                                    class="invest-cc-opt" data-plan="silver">
                                                                    <div class="coin-item">
                                                                        <div class="coin-icon"><em
                                                                                class="icon ni ni-offer-fill"></em>
                                                                        </div>
                                                                        <div class="coin-info"><span
                                                                                class="coin-name">Service
                                                                                Holder</span><span
                                                                                class="coin-text">Take Standard
                                                                                package and get 3.75%
                                                                                profit.</span></div>
                                                                    </div>
                                                                </a></li>
                                                            <li class="invest-cc-item selected"><a href="#"
                                                                    class="invest-cc-opt" data-plan="starter">
                                                                    <div class="coin-item">
                                                                        <div class="coin-icon"><em
                                                                                class="icon ni ni-offer-fill"></em>
                                                                        </div>
                                                                        <div class="coin-info"><span
                                                                                class="coin-name">Bussiness</span><span
                                                                                class="coin-text">Take Platinum
                                                                                package and get 5%
                                                                                profit.</span></div>
                                                                    </div>
                                                                </a></li>
                                                            <li class="invest-cc-item"><a href="#"
                                                                    class="invest-cc-opt" data-plan="dimond">
                                                                    <div class="coin-item">
                                                                        <div class="coin-icon"><em
                                                                                class="icon ni ni-offer-fill"></em>
                                                                        </div>
                                                                        <div class="coin-info"><span
                                                                                class="coin-name">Under
                                                                                Privileged People</span><span
                                                                                class="coin-text">Take Pro
                                                                                package and get 5%
                                                                                profit.</span></div>
                                                                    </div>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invest-field form-group">
                                                <div class="form-label-group"><label class="form-label">Loan
                                                        Amount</label></div>
                                                <div class="form-control-group"><input type="number"
                                                        class="form-control form-control-amount form-control-lg"
                                                        id="loan-amount" value="$ 500">
                                                    <div class="form-range-slider" data-tooltip="true"
                                                        data-start="50" id="Tooltip-Range"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invest-field form-group">
                                                <div class="form-label-group"><label class="form-label">Interest
                                                        (%)</label></div>
                                                <div class="form-control-group"><input type="number"
                                                        class="form-control form-control-amount form-control-lg"
                                                        id="loan-interest" value="5">
                                                    <div class="form-range-slider" data-tooltip="true"
                                                        data-start="30" id="interest"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invest-field form-group">
                                                <div class="form-label-group"><label class="form-label">Loan
                                                        Term</label></div>
                                                <div class="form-control-group"><input type="number"
                                                        class="form-control form-control-amount form-control-lg"
                                                        id="loan-term" value="2">
                                                    <div class="form-range-slider" data-tooltip="true"
                                                        data-start="15" id="term"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invest-field form-group">
                                                <div class="form-label-group"><label class="form-label">Choose
                                                        EMI Term</label></div>
                                                <div class="invest-amount-group g-2">
                                                    <div class="invest-amount-item"><input type="radio"
                                                            class="invest-amount-control" name="iv-amount"
                                                            id="iv-amount-1"><label class="invest-amount-label"
                                                            for="iv-amount-1">Weekly</label></div>
                                                    <div class="invest-amount-item"><input type="radio"
                                                            class="invest-amount-control" name="iv-amount"
                                                            id="iv-amount-2"><label class="invest-amount-label"
                                                            for="iv-amount-2">Monthly</label></div>
                                                    <div class="invest-amount-item"><input type="radio"
                                                            class="invest-amount-control" name="iv-amount"
                                                            id="iv-amount-4"><label class="invest-amount-label"
                                                            for="iv-amount-4">Yearly</label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invest-field form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox"><input
                                                type="checkbox" class="custom-control-input"
                                                id="checkbox"><label class="custom-control-label"
                                                for="checkbox">I agree with the <a href="#">terms and &amp;
                                                    conditions.</a></label></div>
                                    </div>
                                </div> --}}
                                <div class="col-xxl-12 col-lg-5">
                                    <div class="card card-bordered p-5">
                                        <div class="nk-iv-wg4">
                                            <div class="nk-iv-wg4-sub">
                                                <h6 class="nk-iv-wg4-title title"> Details</h6>
                                                <ul class="nk-iv-wg4-overview g-2">
                                                    <li>
                                                        <div class="sub-text">Type</div>
                                                        <div class="lead-text">Rent Assistance</div>
                                                    </li>
                                                    <li>
                                                        <div class="sub-text">Repayment Duration</div>
                                                        <div class="lead-text">12 months</div>
                                                    </li>
                                                    <li>
                                                        <div class="sub-text">Principal</div>
                                                        <div class="lead-text currency-ghs">2000</div>
                                                    </li>
                                                    <li>
                                                        <div class="sub-text">Interest Payable</div>
                                                        <div class="lead-text">20% / annum</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nk-iv-wg4-sub">
                                                <ul class="nk-iv-wg4-list">
                                                    <li>
                                                        <div class="sub-text">Repayment schedule</div>
                                                        <div class="lead-text">Monthly</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nk-iv-wg4-sub">
                                                <ul class="nk-iv-wg4-list">
                                                    <li>
                                                        <div class="sub-text">Monthly Repayment Amount</div>
                                                        <div class="lead-text currency-ghs">2175</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nk-iv-wg4-sub">
                                                <ul class="nk-iv-wg4-list">
                                                    <li>
                                                        <div class="lead-text">Total Repayment Amount</div>
                                                        <div class="caption-text text-primary currency-ghs">2176.25</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection