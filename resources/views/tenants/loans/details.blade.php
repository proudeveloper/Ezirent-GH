@extends('tenants.layouts.app')


    @section('content')
    
            <div class="page-content">
                
                <div class="container-fluid">
                    
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="stepper-widget mt-sm-5 px-3 px-sm-0">
                                <ul>
                                    <li class="active mt-0" id="per_info_btn">
                                        <a href="javascript:void(0);" class="per_info_btn">
                                            <div class="number"><i class="icon_check"></i> <span>1</span></div> Personal Information
                                        </a>
                                    </li>
                                    <li  id="emer_cont_btn">
                                        <a href="javascript:void(0);" class="emer_cont_btn">
                                            <div class="number"><i class="icon_check"></i> <span>2</span></div>
                                            Emergency Contact
                                        </a>
                                    </li>
                                    <li id="employ_info_btn">
                                        <a href="javascript:void(0);" class="employ_info_btn">
                                            <div class="number"><i class="icon_check"></i> <span>3</span></div>
                                            Employment Information
                                        </a>
                                    </li>
                                    <li id="accomodate_info_btn">
                                        <a href="javascript:void(0);" class="accomodate_info_btn">
                                            <div class="number"><i class="icon_check"></i> <span>4</span></div>
                                            Accomodation Info
                                        </a>
                                    </li>
                                    <li id="ladlord_info_btn">
                                        <a href="javascript:void(0);" class="ladlord_info_btn">
                                            <div class="number"><i class="icon_check"></i> <span>5</span></div>
                                            Landloord Information
                                        </a>
                                    </li>
                                    <li id="document_info_btn">
                                        <a href="javascript:void(0);" class="document_info_btn">
                                            <div class="number"><i class="icon_check"></i> <span>6</span></div>
                                            Document Verification
                                        </a>
                                    </li>
                                    <li id="finished_btn">
                                        <a href="javascript:void(0);" class="finished_btn">
                                            <div class="number"><i class="icon_check"></i> <span>7</span></div>
                                            Finish
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
    
                        <!-- PERSONAL INFO 1 -->
                        <div class="col-lg-9" id="p_info_one">
                            
                            <div class="loan-details-widget">
                                <h4 class="mb-4">PERSONAL INFORMATION</h4>
                                <form action="{{ url('tenant/personal_info_form') }}" method="POST" id="personal_info_form">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label class="label" for="f_name">First Name*</label>
                                            <input id='f_name' class="form-control" name="f_name" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->f_name }}">
                                        </div>
    
                                        <div class="col-md-6">
                                            <label class="label" for="l_name">Last Name*</label>
                                            <input id='l_name' name="l_name" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->l_name }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="label" for="inputPhoneNumber1">WhatsApp Number*</label>
                                            <input id="inputPhoneNumber1" name="whatsapp_no" class="form-control w-100" type="tel" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->whatsapp_no }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="label" for="loandetails02">Gender*</label>
                                            <div class="dob d-flex">
                                                <select id="loandetails02" name="gender">
                                                    <option value="" disabled>Select Your Gender</option>
                                                    <option value="Male" {{ $getPersonalDetails != null ?  $getPersonalDetails->gender == 'Male' ? 'selected' : '' :''}}>Male</option>
                                                    <option value="Female" {{ $getPersonalDetails != null ? $getPersonalDetails->gender == 'Female' ? 'selected' : '' : '' }}>Female</option>
                                                    <option value="Other" {{ $getPersonalDetails != null ? $getPersonalDetails->gender == 'Other' ? 'selected' : '' :'' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="label" for="level_edu">Highest Level of Education*</label>
                                            <input id='level_edu' class="form-control" name="level_edu" type="text" required value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->level_edu }}">
                                        </div>
    
                                        <div class="col-md-6">
                                            <label class="label" for="dob-d">Date of Birth*</label>

                                            @php
                                                // $now_date = DateTime::createFromFormat('Y-m-d', '2000-01-01');
                                                $dateString = $getPersonalDetails != null ? $getPersonalDetails->dob : '2000-01-01';
                                                $date = DateTime::createFromFormat('Y-m-d', $dateString);

                                                $day = $date->format('d');
                                                $month = $date->format('m');
                                                $db_year = $date->format('Y');

                                            @endphp

                                            <div class="dob d-flex">
                                                <select id="dob-d" name="dob_day">
                                                    <option value="" disabled>Day</option>
                                                    <option value="01" {{ $day == '01' ? 'selected' : '' }}>01</option>
                                                    <option value="02" {{ $day == '02' ? 'selected' : '' }}>02</option>
                                                    <option value="03" {{ $day == '03' ? 'selected' : '' }}>03</option>
                                                    <option value="04" {{ $day == '04' ? 'selected' : '' }}>04</option>
                                                    <option value="05" {{ $day == '05' ? 'selected' : '' }}>05</option>
                                                    <option value="06" {{ $day == '06' ? 'selected' : '' }}>06</option>
                                                    <option value="07" {{ $day == '07' ? 'selected' : '' }}>07</option>
                                                    <option value="08" {{ $day == '08' ? 'selected' : '' }}>08</option>
                                                    <option value="09" {{ $day == '09' ? 'selected' : '' }}>09</option>
                                                    <option value="10" {{ $day == '10' ? 'selected' : '' }}>10</option>
                                                    <option value="11" {{ $day == '11' ? 'selected' : '' }}>11</option>
                                                    <option value="12" {{ $day == '12' ? 'selected' : '' }}>12</option>
                                                    <option value="13" {{ $day == '13' ? 'selected' : '' }}>13</option>
                                                    <option value="14" {{ $day == '14' ? 'selected' : '' }}>14</option>
                                                    <option value="15" {{ $day == '15' ? 'selected' : '' }}>15</option>
                                                    <option value="16" {{ $day == '16' ? 'selected' : '' }}>16</option>
                                                    <option value="17" {{ $day == '17' ? 'selected' : '' }}>17</option>
                                                    <option value="18" {{ $day == '18' ? 'selected' : '' }}>18</option>
                                                    <option value="19" {{ $day == '19' ? 'selected' : '' }}>19</option>
                                                    <option value="20" {{ $day == '20' ? 'selected' : '' }}>20</option>
                                                    <option value="21" {{ $day == '21' ? 'selected' : '' }}>21</option>
                                                    <option value="22" {{ $day == '22' ? 'selected' : '' }}>22</option>
                                                    <option value="23" {{ $day == '23' ? 'selected' : '' }}>23</option>
                                                    <option value="24" {{ $day == '24' ? 'selected' : '' }}>24</option>
                                                    <option value="25" {{ $day == '25' ? 'selected' : '' }}>25</option>
                                                    <option value="26" {{ $day == '26' ? 'selected' : '' }}>26</option>
                                                    <option value="27" {{ $day == '27' ? 'selected' : '' }}>27</option>
                                                    <option value="28" {{ $day == '28' ? 'selected' : '' }}>28</option>
                                                    <option value="29" {{ $day == '29' ? 'selected' : '' }}>29</option>
                                                    <option value="30" {{ $day == '30' ? 'selected' : '' }}>30</option>
                                                    <option value="31" {{ $day == '31' ? 'selected' : '' }}>31</option>
                                                </select>
    
                                                <select id="dob-m" name="dob_month">
                                                    <option value="" disabled>Month</option>
                                                    <option value="01" {{ $month == '01' ? 'selected' : '' }}>January</option>
                                                    <option value="02" {{ $month == '02' ? 'selected' : '' }}>February</option>
                                                    <option value="03" {{ $month == '03' ? 'selected' : '' }}>March</option>
                                                    <option value="04" {{ $month == '04' ? 'selected' : '' }}>April</option>
                                                    <option value="05" {{ $month == '05' ? 'selected' : '' }}>May</option>
                                                    <option value="06" {{ $month == '06' ? 'selected' : '' }}>June</option>
                                                    <option value="07" {{ $month == '07' ? 'selected' : '' }}>July</option>
                                                    <option value="08" {{ $month == '08' ? 'selected' : '' }}>August</option>
                                                    <option value="09" {{ $month == '09' ? 'selected' : '' }}>September</option>
                                                    <option value="10" {{ $month == '10' ? 'selected' : '' }}>October</option>
                                                    <option value="11" {{ $month == '11' ? 'selected' : '' }}>November</option>
                                                    <option value="12" {{ $month == '12' ? 'selected' : '' }}>December</option>
                                                </select>
    
                                                    @php
                                                        $now_year =  date("Y");
                                                        $from_y = 1900;
                                                        $years = array();

                                                        for ($i = $from_y; $i < $now_year; $i++) { 

                                                            $years [] = $now_year--;
                                                        }
                                                    @endphp

                                                <select class="me-0" id="dob-y" name="dob_year">
                                                    <option value="" selected disabled>Year</option>
    
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year }}" {{ $year == $db_year ? 'selected' : '' }}>{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <label class="label mb-4">Marital Statas*</label>
    
                                            <div class="form-check form-check-inline me-3">
                                                <input class="form-check-input" type="radio" name="marital_status"  {{ $getPersonalDetails != null ? $getPersonalDetails->marital_status == 'single' ? 'checked' : '' : '' }}
                                                    id="single" value="single">
                                                <label class="form-check-label" for="single">Single</label>
                                            </div>
                                            <div class="form-check form-check-inline me-3">
                                                <input class="form-check-input" type="radio" name="marital_status" {{ $getPersonalDetails != null ? $getPersonalDetails->marital_status == 'married' ? 'checked' : '' : '' }}
                                                    id="married" value="married">
                                                <label class="form-check-label" for="married">Married</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="marital_status" {{ $getPersonalDetails != null ? $getPersonalDetails->marital_status == 'divorced' ? 'checked' : '' : '' }}
                                                    id="divorced" value="divorced">
                                                <label class="form-check-label" for="divorced">Divorced</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="label" for="current_location">Current Location*</label>
                                            <input id="current_location" name="current_location" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->current_location }}" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="label" for="loandetails01">How did you hear about us?</label>
                                            <div class="dob d-flex">
                                                <select id="loandetails01" name="how_heard" required>
                                                    <option value="">Select How</option>
                                                    <option value="Friend" {{ $getPersonalDetails != null ? $getPersonalDetails->how_heard == 'Friend' ? 'selected' : '' : '' }}>Friend</option>
                                                    <option value="Google Search" {{ $getPersonalDetails != null ? $getPersonalDetails->how_heard == 'Google Search' ? 'selected' : '' : '' }}>Google Search</option>
                                                    <option value="Social Media" {{ $getPersonalDetails != null ? $getPersonalDetails->how_heard == 'Social Media' ? 'selected' : '' : '' }}>Social Media</option>
                                                    <option value="Referral" {{ $getPersonalDetails != null ? $getPersonalDetails->how_heard == 'Referral' ? 'selected' : '' : '' }}>Referral</option>
                                                    <option value="Advertisement" {{ $getPersonalDetails != null ? $getPersonalDetails->how_heard == 'Advertisement' ? 'selected' : '' : '' }}>Advertisement</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row  mt-60">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex justify-content-end">
                                                <button id="personal_info_form_btn" class=" theme-btn-primary_alt theme-btn next-btn" type="submit">Save <i class="ri-save-3-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        <!-- PERSONAL INFO EMERGENCY CONTACT -->
                        <div class="col-lg-9" id="p_info_emergency" style="display: none">
                            
                            <div class="loan-details-widget">
                                <h4 class="mb-4">EMERGENCY CONTACT</h4>
                                <form action="{{ url('tenant/emergency_contact_form')}}" method="POST" id="emergency_contact_form">
                                    @csrf

                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label class="label" for="emer_f_name">First Name*</label>
                                            <input id='emer_f_name' name="emer_f_name" class="form-control" type="text" required value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->emer_f_name }}">
                                        </div>
    
                                        <div class="col-md-6">
                                            <label class="label" for="emer_l_name">Last Name*</label>
                                            <input id='emer_l_name' name="emer_l_name" class="form-control" type="text" required value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->emer_l_name }}">
                                        </div>
    
                                        <div class="col-md-12">
                                            <label class="label" for="select-lang">Relationship*</label>
                                            <div class="dob d-flex">
                                                <select id="select-lang" name="emer_relationship" class="emer_relationship">
                                                    <option value="" disabled>Select Relationship</option>
                                                    <option value="Brother" {{ $getPersonalDetails != null ? $getPersonalDetails->emer_relationship == 'Brother' ? 'selected' : '' : '' }}>Brother</option>
                                                    <option value="Sister" {{ $getPersonalDetails != null ? $getPersonalDetails->emer_relationship == 'Sister' ? 'selected' : '' : '' }}>Sister</option>
                                                    <option value="Parent" {{ $getPersonalDetails != null ? $getPersonalDetails->emer_relationship == 'Parent' ? 'selected' : '' : '' }}>Parent</option>
                                                    <option value="Friend" {{ $getPersonalDetails != null ? $getPersonalDetails->emer_relationship == 'Friend' ? 'selected' : '' : '' }}>Friend</option>
                                                    <option value="Other" {{ $getPersonalDetails != null ? $getPersonalDetails->emer_relationship == 'Other' ? 'selected' : '' : '' }}>Other</option>
                                                </select>

                                                {{-- @if ($getPersonalDetails->emer_relationship == 'Other')
                                                    <input id='emer_relationship_other' name="emer_relationship" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->emer_relationship_other }}">
                                                @endif --}}
                                                <input id='emer_relationship_other' name="emer_relationship_other" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->emer_relationship_other }}" class="form-control emer_relationship_other" type="text" style="display: none;">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="label" for="inputPhoneNumber2">Phone Number*</label>
                                            <input id="inputPhoneNumber2" name="emer_phone" class="form-control w-100" type="tel" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->emer_phone }}">
                                        </div>
        
                                        <div class="col-md-12">
                                            <label class="label" for="current_location">Current Location*</label>
                                            <input id="current_location" name="current_location" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->emer_current_location }}">
                                        </div>

    
                                    </div>

                                    <div class="row  mt-60">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex justify-content-end">
                                                <button class=" theme-btn-primary_alt theme-btn next-btn"
                                                    type="submit">Save <i class="ri-save-3-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        <!-- PERSONAL INFO EMPLOYMENT STATE -->
                        <div class="col-lg-9" id="p_info_employment" style="display: none">
                            
                            <div class="loan-details-widget">
                                <h4 class="mb-4">EMPLOYMENT INFORMATION</h4>
                                <form action="{{ url('tenant/employment_form')}}" method="POST" id="employment_form">
                                    @csrf

                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <label class="label" for="gender">Current Employment Status*</label>
                                            <div class="dob d-flex">
                                                <select id="gender" name="employ_status">
                                                    <option value="" disabled>Select Status</option>
                                                    <option value="Employed in the public sector" {{ $getPersonalDetails != null ? $getPersonalDetails->employ_status == 'Employed in the public sector' ? 'selected' : '' : '' }}>Employed in the public sector</option>
                                                    <option value="Employed in the private sector" {{ $getPersonalDetails != null ? $getPersonalDetails->employ_status == 'Employed in the private sector' ? 'selected' : '' : '' }}>Employed in the private sector</option>
                                                    <option value="Employed in the informal sector" {{ $getPersonalDetails != null ? $getPersonalDetails->employ_status == 'Employed in the informal sector' ? 'selected' : '' : '' }}>Employed in the informal sector</option>
                                                    <option value="Self-Employed" {{ $getPersonalDetails != null ? $getPersonalDetails->employ_status == 'Self-Employed' ? 'selected' : '' : '' }}>Self-Employed</option>
                                                    <option value="Unemployed" {{ $getPersonalDetails != null ? $getPersonalDetails->employ_status == 'Unemployed' ? 'selected' : '' : '' }}>Unemployed</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-md-12">
                                            <label class="label" for="net_income">Monthly Net Income*</label>
                                            <input id="net_income" name="net_income" class="form-control" type="number" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->net_income }}" step="0.01" inputmode="decimal">
                                        </div>

                                        <div class="col-md-12">
                                            <label class="label" for="outstanding_dept">Do you have any outstanding loan*</label>
                                            <div class="dob d-flex">
                                                <select id="outstanding_dept" name="outstanding_dept">
                                                    <option value="" selected disabled>Status</option>
                                                    <option value="Yes" {{ $getPersonalDetails != null ? $getPersonalDetails->outstanding_dept == 'Yes' ? 'selected' : '' : '' }}>Yes</option>
                                                    <option value="No" {{ $getPersonalDetails != null ? $getPersonalDetails->outstanding_dept == 'No' ? 'selected' : '' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  mt-60">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex justify-content-end">
                                                <button class=" theme-btn-primary_alt theme-btn next-btn"
                                                    type="submit">Save <i class="ri-save-3-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        <!-- PERSONAL INFO ACCOMODATION PLACE -->
                        <div class="col-lg-9" id="p_info_accomodatoing" style="display: none">
                            
                            <div class="loan-details-widget">
                                <h4 class="mb-4">ACCOMODATION INFORMATION</h4>
                                <form action="{{ url('tenant/accomodation_form')}}" method="POST" id="accomodation_form">
                                    @csrf

                                    <div class="row gy-4">
                                        
                                        <div class="col-md-12">
                                            <label class="label" for="current_accomodate">Current Accomodation Status*</label>
                                            <div class="dob d-flex">
                                                <select id="current_accomodate" name="current_accomodate">
                                                    <option value="" disabled>Select Status</option>
                                                    <option value="I want to renew my rent" {{ $getPersonalDetails != null ? $getPersonalDetails->current_accomodate == 'I want to renew my rent' ? 'selected' : '' : '' }}>I want to renew my rent</option>
                                                    <option value="I have a new place to rent" {{ $getPersonalDetails != null ? $getPersonalDetails->current_accomodate == 'I have a new place to rent' ? 'selected' : '' : '' }}>I have a new place to rent</option>
                                                    <option value="I have plans to move in the future" {{ $getPersonalDetails != null ? $getPersonalDetails->current_accomodate == 'I have plans to move in the future' ? 'selected' : '' : '' }}>I have plans to move in the future</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <label class="label" for="area_interest">Area Of Interest*</label>
                                            <input id="area_interest" name="area_interest" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->area_interest }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="label" for="monthly_bugbet">Budgeted Monthly Rent GH¢*</label>
                                            <input id="monthly_bugbet" name="monthly_bugbet" class="form-control" type="number" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->monthly_bugbet }}" step="0.01" inputmode="decimal">
                                        </div>

                                        <div class="col-md-12">
                                            <label class="label" for="move_in_date">Expected Move-in Date*</label>
                                            <input id="move_in_date" name="move_in_date" class="form-control" type="date" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->move_in_date }}" required>
                                        </div>


                                        <div class="col-md-12">
                                            <label class="label" for="type_of_property">Type of Property*</label>
                                            <div class="dob d-flex">
                                                <select id="type_of_property" name="type_of_property">
                                                    <option value="" disabled>Status</option>

                                                    @foreach ($getPropType as $propType)
                                                        <option value={{ $propType == null ? '' : $propType->name }} {{ ($propType == null ? '' : $propType->name) == ($getPersonalDetails == null ? '' : $getPersonalDetails->type_of_property) ? 'selected' : '' }}>{{ $propType == null ? '' : $propType->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <label class="label" for="request_month">How many months of rent is the landlord requesting?*</label>
                                            <input id="request_month" name="request_month" class="form-control" type="number"  value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->request_month }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="label" for="months_payback">How many months do you want to use to payback EzirentGH (Months)*</label>
                                            <input id="months_payback" name="months_payback" class="form-control" type="number"  value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->months_payback }}">
                                        </div>

                                    </div>

                                    <div class="row  mt-60">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex justify-content-end">
                                                <button class=" theme-btn-primary_alt theme-btn next-btn"
                                                    type="submit">Save <i class="ri-save-3-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        
                        <!-- PERSONAL INFO LANDLORD/LAND LADY -->
                        <div class="col-lg-9" id="p_info_lanlord" style="display: none">
                            
                            <div class="loan-details-widget">
                                <h4 class="mb-4">LANDLORD LANDLADY INFORMATION</h4>
                                <form action="{{ url('tenant/landlord_info_form')}}" id="landlord_info_form" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row gy-4">
                                        
                                        <div class="col-lg-12 col-md-6">
                                            <label class="label" for="landlord_name">Name of landlord or landlady*</label>
                                            <input id="landlord_name" name="landlord_name" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->landlord_name }}">
                                        </div>

                                        <div class="col-lg-12 col-md-6">
                                            <label class="label" for="inputPhoneNumber3">Phone Number*</label>
                                            <input id="inputPhoneNumber3" name="landlord_contact" class="form-control w-100" type="tel" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->landlord_contact }}">
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <label class="label" for="landlord_doc_file">Ghana Card (JPG/PNG)*</label>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('landlord_doc_file').click()">Select GH Card Document File</button>
                                            <input id="landlord_doc_file" name="landlord_doc_file" class="form-control" type="file" style="display: none;" accept=".jpg, .jpeg, .png">
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <label class="label" for="display_img">Document Max Size (2MB)</label>
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img class="img-fluid" src="{{ $getPersonalDetails == null ? '' : $getPersonalDetails->getGHcardImage() }}" alt="" id="display_img" style="height: 12vh;">
                                                </div>
                                                <i class="error_land_img text-danger"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="label" for="rent_unit_details">Rent Unit Details*</label>
                                            <textarea name="rent_unit_details" id="rent_unit_details" rows="4" style="width: 100%;">{{ $getPersonalDetails == null ? '' : $getPersonalDetails->rent_unit_details }}</textarea>
                                        </div>

                                        
                                    </div>

                                    <div class="row  mt-6">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex justify-content-end">
                                                <button class=" theme-btn-primary_alt theme-btn next-btn" type="submit">Save <i class="ri-save-3-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        
                        <!-- PERSONAL INFO DOCUMENT VERIFICATION -->
                        <div class="col-lg-9" id="p_info_document" style="display: none">
                            
                            <div class="loan-details-widget">
                                <h4 class="mb-4">DOCUMENT VERIFICATION</h4>
                                <form action="{{ url('tenant/document_verification_form')}}" id="document_verification_form" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row gy-4">
                                        
                                        <div class="col-lg-12 col-md-6">
                                            <label class="label" for="employer_name">Name of Employer*</label>
                                            <input id="employer_name" name="employer_name" class="form-control" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->employer_name }}">
                                        </div>

                                        <div class="col-lg-12 col-md-6">
                                            <label class="label" for="employer_address">Office Address of Employer*</label>
                                            <input id="employer_address" name="employer_address" class="form-control w-100" type="text" value="{{ $getPersonalDetails == null ? "" : $getPersonalDetails->employer_address }}">
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <label class="label" for="proof_of_doc_file">Proof of Employment (PDF/DOC/JPG/PNG)*</label>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('proof_of_doc_file').click()">Select Proof of Employment Document File</button>
                                            <input id="proof_of_doc_file" name="proof_of_doc" class="form-control" type="file" style="display: none;" accept=".jpg, .jpeg, .png, .pdf, .doc">
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <label class="label" for="doc_veri_display_img">Document</label>
                                            <div class="card">
                                                <div class="card-body p-0">
                                    
                                                    <img class="img-fluid" src="{{ $getPersonalDetails == null ? '' : $getPersonalDetails->getProofDocImage()['img_file'] ?? null }}" alt="" id="doc_veri_display_img" style="height: 12vh;">
                                                 
                                                </div>
                                                <i class="error_employ_img text-danger"></i>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6">
                                            <label class="label" for="id_card_file">ID Card (Ghana Card (JPG)/PNG)*</label>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('id_card_file').click()">Select ID Card Document</button>
                                            <input id="id_card_file" name="id_card" class="form-control" type="file" style="display: none;" accept=".jpg, .jpeg, .png">
                                        </div>
                                        {{-- {{ $getPersonalDetails->getIDCardImage() }} --}}
                                        <div class="col-lg-6 col-md-6">
                                            <label class="label" for="doc_Id_veri_display_img">Document</label>
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <img class="img-fluid" src="{{ $getPersonalDetails == null ? '' : $getPersonalDetails->getIDCardImage() }}" alt="" id="doc_Id_veri_display_img" style="height: 12vh;">
                                                </div>
                                                <i class="error_employ_id_img text-danger"></i>
                                            </div>
                                        </div>

                                        
                                    </div>

                                    <div class="row  mt-6">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex justify-content-end">
                                                <button class="theme-btn-primary_alt theme-btn next-btn" type="submit">Save <i class="ri-save-3-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        <!-- PERSONAL INFO COMPLETE SUBMIT -->
                        <div class="col-md-9" id="p_info_finish" style="display: none">
                            <div class="loan-details-widget">
                                {{-- <form action="{{ url('tenant/document_selfie_form')}}" id="document_verification_form" method="POST" enctype="multipart/form-data"> --}}
                                    {{-- @csrf --}}

                                    <div class="row gy-4">
                                        <div class="col-12">
                                            <div class="doc-info">
                                               <div class="row">
                                                <i class="h5 text-danger">Please make sure you have filled every neccessary detail before taking your selfie. Failure to do so disqualifies your application for the rent assistance.</i>
                                                <p>Selfie Photo. Your Personal Photo. The photo must be done by yourself.
                                                    The photo must show your face and your both shoulders. (Please attach file )</p>
                                                
                                               </div>
                                                
                                            </div>
                                            <div class="doc-info">
                                                <div class="row mt-4">
                                                    <div class="col-6">
                                                        <ul>
                                                            <li>* Take a photo against a plain white background.</li>
                                                            <li>* Avoid shadows on face or anything blocking face view, no hats, no dark lenses, or anything that obscures the face.</li>
                                                            <li>* Photo should be front view, full face from shoulders up, eyes open and looking at camera.</li>
                                                            <li>* Avoid blurry pictures, no filters or enhanced photos</li>
                                                        </ul>
                                                       
                                                    </div>

                                                    <div class="col-6">
                                                         
                                                        <ul>
                                                            <li>INSTRUCTIONS</li>
                                                            <li>Make sure there is enough light before taking photo.</li>
                                                            <li>1. Click or tap on the "Open the Camera" button for your selfie.</li>
                                                            <li>2. Click or tap on "Capture Photo" button to take photo.</li>
                                                            <li> - You can retake photo if the <picture> isn't clear.</picture></li>
                                                            <li>3. Click or tap on "Submit Forms" button to submit your forms with the selfie taken.</li>
                                                        </ul>
        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-12">
                                            
                                            <div class="col-sm-12 col-md-6 mx-auto justify-content-center">
                                                <h5 class="">
                                                    Capture a photo from webcam 
                                                </h5>

                                                <div class="card m-0">
                                                    
                                                    <img src="{{ $getPersonalDetails == null ? '' : $getPersonalDetails->getSelfieImage() }}" alt="" srcset="{{ $getPersonalDetails == null ? '' : $getPersonalDetails->getSelfieImage() }}" id="display_selfie_img" class="w-100 mb-3">

                                                </div>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="theme-btn-primary_alt theme-btn w-100" id="accesscamera" data-bs-toggle="modal" data-bs-target="#photoModal">
                                                    Open Camera <i class="ri-camera-line"></i>
                                                </button>
  
                                            </div>
                                        </div>
                                       
                                    </div>
                                    {{-- <div class="row mt-5">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex flex-wrap justify-content-between">
                                                <a href="personal-details.html"
                                                    class="prev-btn theme-btn-primary_alt theme-btn"><iclass="arrow_left"></i>previous
                                                </a>
                                                <button type="submit"
                                                    class="theme-btn-primary_alt theme-btn">Submit</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </form> --}}
                            </div>
                        </div>



                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
           
    @endsection


    @section('script')
        
        <!-- apexcharts -->
        <script src="{{ url('public/tenants/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Vector map-->
        <script src="{{ url('public/tenants/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
        <script src="{{ url('public/tenants/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ url('public/tenants/assets/js/pages/dashboard.init.js') }}"></script>

    @endsection