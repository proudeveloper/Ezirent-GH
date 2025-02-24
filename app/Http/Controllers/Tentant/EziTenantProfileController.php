<?php

namespace App\Http\Controllers\Tentant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EziNotificationController;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EziTenantProfileController extends Controller
{
    //

            
    public function getUserProfileInfo() {

        $currentUser = Auth::user();
        
        // $data['getPropertiesOverview'] = EziTenantPropertyModel::getAllPropertiesOverview(6);
        // $data['getAllProperties'] = EziTenantPropertyModel::getAllProperties();

        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        // $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.user.profile');

    }


    public function getChangeUserImg(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();
        // $file = $request->file('user_img');
        
        // $data['getPropertiesOverview'] = EziTenantPropertyModel::getAllPropertiesOverview(6);
        // $data['getAllProperties'] = EziTenantPropertyModel::getAllProperties();

        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        // $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        // return view('tenants.user.profile');
        // $ext              = $file->getClientOriginalExtension();

        $notification = array(
            'title' => 'Upload',
            'message' => 'Congratulations, you have successfully updated your information.',
            'moved' => 'Here',
            'success' => true,
            'data' => $request->all()
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }


                
    public function getUserPersonalIfo() {

        $currentUser = Auth::user();
        
        // $data['getPropertiesOverview'] = EziTenantPropertyModel::getAllPropertiesOverview(6);
        // $data['getAllProperties'] = EziTenantPropertyModel::getAllProperties();

        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPersonalDetails'] = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.user.personal_info', $data);

    }


    public function getUserApplicationInfo() {

        $currentUser = Auth::user();
        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);
        $db_personal_all = EziPersonalDetailsModel::getAllApplicationDetails($currentUser->id);
        
        $notification = array(
            'title' => 'Upload',
            'message' => "Sorry! Your application is being processed.",
            'moved' => 'Here',
            'success' => true,
            'data' => $db_personal,
            'all_data' => $db_personal_all,
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }



    public function savePeronalInfoDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();
        $message = '';

        $user_id            = $request->user_id;
        $f_name             = $request->f_name;
        $l_name             = $request->l_name;
        $whatsapp_no        = $request->whatsapp_no;
        $gender             = $request->gender;
        $level_edu          = $request->level_edu;
        $dob_day            = $request->dob_day;
        $dob_month          = $request->dob_month;
        $dob_year           = $request->dob_year;
        $dob_txt            = $dob_month.'/'.$dob_day.'/'.$dob_year;

        $string = '10/16/2003';
        $timestamp = strtotime($dob_txt);
        $dob_date = date('Y-m-d', $timestamp);
        // echo $date; // Output: 2003-10-16

        $marital_status     = $request->marital_status;
        $current_location   = $request->current_location;
        $how_heard          = $request->how_heard;


        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);
        $last_applications = EziPersonalDetailsModel::get_last_application_id();
       

        $new_application_id = '';
   
        if (!empty($last_applications)) {

            $db_last_id = $last_applications->application_id;

            $application_id = substr($db_last_id, 0);
            $application_id = intval($application_id);
            $next_application_id = ($application_id + 1);
            $prefix_id = sprintf('%011d', $next_application_id );
            $new_application_id = $prefix_id;

        } else {
                
            $new_application_id = '00000000001';

        }
    
        // dd($new_application_id);
        
        if (!empty($db_personal)) {

           
            if ($db_personal->rent_status == 1) {
                $message = 'Personal details saved successfully';
            } elseif ($db_personal->rent_status == 2) {
                $message = 'Sorry, your document is pending.';
            } elseif ($db_personal->rent_status == 3) {
                $message = "Sorry, you can't imput any information.";
            } elseif ($db_personal->rent_status == 4) {
                $message = "Sorry, you have been approved already.";
            } elseif ($db_personal->rent_status == 5) {
                $message = "Rejected, you can't imput any information.";
            } elseif ($db_personal->rent_status == 6) {
                $message = "Money is delivered to your account.";
            }

            if ($db_personal->rent_status == 1) {
                
                $db_personal->f_name             = $f_name;
                $db_personal->l_name             = $l_name;
                // $db_personal->application_id     = $new_application_id;
                $db_personal->whatsapp_no        = $whatsapp_no;
                $db_personal->gender             = $gender;
                $db_personal->level_edu          = $level_edu;
                $db_personal->dob                = $dob_date;
                $db_personal->marital_status     = $marital_status;
                $db_personal->current_location   = $current_location;
                $db_personal->how_heard          = $how_heard;
                $db_personal->rent_status        = 1;

                $isSuccess                       = $db_personal->update();
        
                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your personal information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry, you could not update your personal details.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
        
            } elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
            } else {
                
                $db_personal                     = new EziPersonalDetailsModel();

                $db_personal->user_id            = $currentUser->id;
                $db_personal->f_name             = $f_name;
                $db_personal->l_name             = $l_name;
                $db_personal->application_id     = $new_application_id;
                $db_personal->whatsapp_no        = $whatsapp_no;
                $db_personal->gender             = $gender;
                $db_personal->level_edu          = $level_edu;
                $db_personal->dob                = $dob_date;
                $db_personal->marital_status     = $marital_status;
                $db_personal->current_location   = $current_location;
                $db_personal->how_heard          = $how_heard;
                $db_personal->rent_status        = 1;
    
                $isSuccess                       = $db_personal->save();
        
                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully saved your personal information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => $message,
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
            }
            
        } else {

            $db_personal                     = new EziPersonalDetailsModel();

            $db_personal->user_id            = $currentUser->id;
            $db_personal->f_name             = $f_name;
            $db_personal->l_name             = $l_name;
            $db_personal->application_id     = $new_application_id;
            $db_personal->whatsapp_no        = $whatsapp_no;
            $db_personal->gender             = $gender;
            $db_personal->level_edu          = $level_edu;
            $db_personal->dob                = $dob_date;
            $db_personal->marital_status     = $marital_status;
            $db_personal->current_location   = $current_location;
            $db_personal->how_heard          = $how_heard;
            $db_personal->rent_status        = 1;

            $isSuccess                       = $db_personal->save();
    
            if (!empty($isSuccess)) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => 'Congratulations, you have successfully saved your personal information.',
                    'moved' => 'Here',
                    'success' => true,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            } else {
                $notification = array(
                    'title' => 'Upload',
                    'message' => $message,
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            }
        }
        


    }



    
    public function saveEmergencyInfoDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $emer_f_name              = $request->emer_f_name;
        $emer_l_name              = $request->emer_l_name;
        $emer_relationship        = $request->emer_relationship;
        $emer_relationship_other  = $request->emer_relationship_other;
        $emer_phone               = $request->emer_phone;
        $current_location         = $request->current_location;

        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);

        if (!empty($db_personal)) {

            if ($db_personal->rent_status == 1) {
                $message = 'Personal details saved successfully';
            } elseif ($db_personal->rent_status == 2) {
                $message = 'Sorry, your document is pending.';
            } elseif ($db_personal->rent_status == 3) {
                $message = "Sorry, you can't imput any information.";
            } elseif ($db_personal->rent_status == 4) {
                $message = "Sorry, you have been approved already.";
            } elseif ($db_personal->rent_status == 5) {
                $message = "Rejected, you can't imput any information.";
            } elseif ($db_personal->rent_status == 6) {
                $message = "Money is delivered to your account.";
            }

            if ($db_personal->rent_status == 1) {
                            
                $db_personal->emer_f_name               = $emer_f_name;
                $db_personal->emer_l_name               = $emer_l_name;
                $db_personal->emer_relationship         = $emer_relationship;
                $db_personal->emer_relationship_other   = $emer_relationship == 'Other' ? $emer_relationship_other : null;
                $db_personal->emer_phone                = $emer_phone;
                $db_personal->emer_current_location     = $current_location;

                $isSuccess                              = $db_personal->update();
        
                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your emengency contact information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
            } elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
            } else {
                $db_personal->emer_f_name               = $emer_f_name;
                $db_personal->emer_l_name               = $emer_l_name;
                $db_personal->emer_relationship         = $emer_relationship;
                $db_personal->emer_relationship_other   = $emer_relationship == 'Other' ? $emer_relationship_other : null;
                $db_personal->emer_phone                = $emer_phone;
                $db_personal->emer_current_location     = $current_location;

                $isSuccess                              = $db_personal->update();
        
                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your emengency contact information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
            }

        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Sorry cannot update information.',
                'moved' => 'Here',
                'success' => false,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }

    }

    
    public function saveEmploymentInfoDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $employ_status              = $request->employ_status;
        $net_income                 = $request->net_income;
        $outstanding_dept           = $request->outstanding_dept;

        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);


        if (!empty($db_personal)) {

            if ($db_personal->rent_status == 1) {
                $message = 'Personal details saved successfully';
            } elseif ($db_personal->rent_status == 2) {
                $message = 'Sorry, your document is pending.';
            } elseif ($db_personal->rent_status == 3) {
                $message = "Sorry, you can't imput any information.";
            } elseif ($db_personal->rent_status == 4) {
                $message = "Sorry, you have been approved already.";
            } elseif ($db_personal->rent_status == 5) {
                $message = "Rejected, you can't imput any information.";
            } elseif ($db_personal->rent_status == 6) {
                $message = "Money is delivered to your account.";
            }

            if ($db_personal->rent_status == 1) {
                                            
                $db_personal->employ_status             = $employ_status;
                $db_personal->net_income                = $net_income;
                $db_personal->outstanding_dept          = $outstanding_dept;

                $isSuccess                              = $db_personal->update();

                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
                
            } elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;

            } else {

                $db_personal->employ_status             = $employ_status;
                $db_personal->net_income                = $net_income;
                $db_personal->outstanding_dept          = $outstanding_dept;

                $isSuccess                              = $db_personal->update();

                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
            }
            

        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Sorry cannot update information.',
                'moved' => 'Here',
                'success' => false,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }


    }


    
    public function saveAccomodationInfoDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $current_accomodate              = $request->current_accomodate;
        $area_interest                   = $request->area_interest;
        $monthly_bugbet                  = $request->monthly_bugbet;
        $string_date                     = $request->move_in_date;

        // $stringDate = '10-16-2003';
        $date = DateTime::createFromFormat('Y-m-d', $string_date);
        // echo $date->format('Y-m-d'); 
        $move_in_date                    = $date->format('Y-m-d');
        $type_of_property                = $request->type_of_property;
        $request_month                   = $request->request_month;
        $months_payback                  = $request->months_payback;
        
        // dd($move_in_date);

        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);


        if (!empty($db_personal)) {

            if ($db_personal->rent_status == 1) {
                $message = 'Personal details saved successfully';
            } elseif ($db_personal->rent_status == 2) {
                $message = 'Sorry, your document is pending.';
            } elseif ($db_personal->rent_status == 3) {
                $message = "Sorry, you can't imput any information.";
            } elseif ($db_personal->rent_status == 4) {
                $message = "Sorry, you have been approved already.";
            } elseif ($db_personal->rent_status == 5) {
                $message = "Rejected, you can't imput any information.";
            } elseif ($db_personal->rent_status == 6) {
                $message = "Money is delivered to your account.";
            }

            if ($db_personal->rent_status == 1) {
                            
                $db_personal->current_accomodate        = $current_accomodate;
                $db_personal->area_interest             = $area_interest;
                $db_personal->monthly_bugbet            = $monthly_bugbet;
                $db_personal->move_in_date              = $move_in_date;
                $db_personal->type_of_property          = $type_of_property;
                $db_personal->request_month             = $request_month;
                $db_personal->months_payback            = $months_payback;

                $isSuccess                              = $db_personal->update();
        
                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
                
            } elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;

            } else  {
                                
                $db_personal->current_accomodate        = $current_accomodate;
                $db_personal->area_interest             = $area_interest;
                $db_personal->monthly_bugbet            = $monthly_bugbet;
                $db_personal->move_in_date              = $move_in_date;
                $db_personal->type_of_property          = $type_of_property;
                $db_personal->request_month             = $request_month;
                $db_personal->months_payback            = $months_payback;

                $isSuccess                              = $db_personal->update();
        
                if (!empty($isSuccess)) {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Congratulations, you have successfully updated your information.',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
                
            }
   
        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Sorry cannot update information.',
                'moved' => 'Here',
                'success' => false,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }
        
    }

    
    public function saveLandLordInfoDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $landlord_name              = $request->landlord_name;
        $landlord_contact           = $request->landlord_contact;
        $rent_unit_details          = $request->rent_unit_details;

        $landlord_doc_file          = $request->file('landlord_doc_file');
        
        // dd($move_in_date);

        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);

        if (!empty($db_personal)) {

            if ($db_personal->rent_status == 1) {
                $message = 'Personal details saved successfully';
            } elseif ($db_personal->rent_status == 2) {
                $message = 'Sorry, your document is pending.';
            } elseif ($db_personal->rent_status == 3) {
                $message = "Sorry, you can't imput any information.";
            } elseif ($db_personal->rent_status == 4) {
                $message = "Sorry, you have been approved already.";
            } elseif ($db_personal->rent_status == 5) {
                $message = "Rejected, you can't imput any information.";
            } elseif ($db_personal->rent_status == 6) {
                $message = "Money is delivered to your account.";
            }

                
            $oldFileName = $db_personal->gh_card_img;

            if ($db_personal->rent_status == 1)  {
                
                $db_personal->landlord_name        = $landlord_name;
                $db_personal->landlord_contact     = $landlord_contact;
                $db_personal->rent_unit_detail     = $rent_unit_details;
            
                $isSuccess                          = $db_personal->update();
                
                $folderPath = 'tenants/lordGHCard/';

        
                if (!empty($isSuccess)) {

                    if ($request->has('landlord_doc_file')) {

                        $isSuccess = $this->deleteFiles($folderPath, $oldFileName);

                        if ($isSuccess) {
                            $ext                      = $landlord_doc_file->getClientOriginalExtension();
                            $randomStr                = $db_personal->id.Str::random(20);
                            $fileName                 = strtolower($randomStr).'.'.$ext;
                            $move_file_now            = $landlord_doc_file->move(public_path($folderPath), $fileName);

                            $db_personal->gh_card_img = $fileName;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } else {
                            $ext                      = $landlord_doc_file->getClientOriginalExtension();
                            $randomStr                = $db_personal->id.Str::random(20);
                            $fileName                 = strtolower($randomStr).'.'.$ext;
                            $move_file_now            = $landlord_doc_file->move(public_path($folderPath), $fileName);

                            $db_personal->gh_card_img = $fileName;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } 
        
                    } else {
                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Congratulations, you have successfully updated your information.',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;

                    }
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
            
            } elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;

            } else {
                                
                $db_personal->landlord_name        = $landlord_name;
                $db_personal->landlord_contact     = $landlord_contact;
                $db_personal->rent_unit_detail     = $rent_unit_details;
            
                $isSuccess                          = $db_personal->update();
                
                $folderPath = 'tenants/lordGHCard/';

        
                if (!empty($isSuccess)) {

                    if ($request->has('landlord_doc_file')) {

                        $isSuccess = $this->deleteFiles($folderPath, $oldFileName);

                        if ($isSuccess) {
                            $ext                      = $landlord_doc_file->getClientOriginalExtension();
                            $randomStr                = $db_personal->id.Str::random(20);
                            $fileName                 = strtolower($randomStr).'.'.$ext;
                            $move_file_now            = $landlord_doc_file->move(public_path($folderPath), $fileName);

                            $db_personal->gh_card_img = $fileName;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } else {
                            $ext                      = $landlord_doc_file->getClientOriginalExtension();
                            $randomStr                = $db_personal->id.Str::random(20);
                            $fileName                 = strtolower($randomStr).'.'.$ext;
                            $move_file_now            = $landlord_doc_file->move(public_path($folderPath), $fileName);

                            $db_personal->gh_card_img = $fileName;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } 
        
                    } else {
                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Congratulations, you have successfully updated your information.',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;

                    }
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
            
            }
             
        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Sorry cannot update information.',
                'moved' => 'Here',
                'success' => false,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }

    }


       
    public function saveDocVerificationDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $employer_name              = $request->employer_name;
        $employer_address           = $request->employer_address;

        $proof_of_doc               = $request->file('proof_of_doc');
        $id_card                    = $request->file('id_card');
        
        // dd($move_in_date);
               
        $folderPathID = 'tenants/IDCards/';
        $folderPathDoc = 'tenants/proofDoc/';

        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);

        if (!empty($db_personal)) {
            
            if ($db_personal->rent_status == 1) {
                $message = 'Personal details saved successfully';
            } elseif ($db_personal->rent_status == 2) {
                $message = 'Sorry, your document is pending.';
            } elseif ($db_personal->rent_status == 3) {
                $message = "Sorry, you can't imput any information.";
            } elseif ($db_personal->rent_status == 4) {
                $message = "Sorry, you have been approved already.";
            } elseif ($db_personal->rent_status == 5) {
                $message = "Rejected, you can't imput any information.";
            } elseif ($db_personal->rent_status == 6) {
                $message = "Money is delivered to your account.";
            }


            if ($db_personal->rent_status == 1)  {
                            
                
                $oldFileNameID                     = $db_personal->id_card;
                $oldFileNameDoc                    = $db_personal->proof_of_doc;

                $db_personal->employer_name        = $employer_name;
                $db_personal->employer_address     = $employer_address;
            
                $isSuccess                         = $db_personal->update();
        
            
                if (!empty($isSuccess)) {

                    if ($request->has('proof_of_doc') || $request->has('id_card')) {

                        $isSuccess = $request->has('proof_of_doc') ? $this->deleteFiles($folderPathDoc, $oldFileNameDoc) : false;
                        $isSuccess = $request->has('id_card') ? $this->deleteFiles($folderPathID, $oldFileNameID) : false;

                        if ($isSuccess) {
                            $id_card_ext              = $request->has('id_card') ? $id_card->getClientOriginalExtension() : 'jpg';
                            $proof_of_doc_ext         = $request->has('proof_of_doc') ? $proof_of_doc->getClientOriginalExtension() : 'jpg';
                            $randomStrID              = $db_personal->id.Str::random(20);
                            $randomStrDoc             = $db_personal->id.Str::random(20);
                            $fileNameID               = strtolower($randomStrID).'.'.$id_card_ext;
                            $fileNameDoc              = strtolower($randomStrDoc).'.'.$proof_of_doc_ext;
                            $move_file_now            = $id_card->move(public_path($folderPathID), $fileNameID);
                            $move_file_now            = $proof_of_doc->move(public_path($folderPathDoc), $fileNameDoc);

                            $db_personal->id_card     = $request->has('id_card') ? $fileNameID : $db_personal->id_card;
                            $db_personal->proof_of_doc= $request->has('proof_of_doc') ? $fileNameDoc : $db_personal->proof_of_doc;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } else {
                            $id_card_ext              = $request->has('id_card') ? $id_card->getClientOriginalExtension() : 'jpg';
                            $proof_of_doc_ext         = $request->has('proof_of_doc') ? $proof_of_doc->getClientOriginalExtension() : 'jpg';
                            $randomStrID              = $db_personal->id.Str::random(20);
                            $randomStrDoc             = $db_personal->id.Str::random(20);
                            $fileNameID               = strtolower($randomStrID).'.'.$id_card_ext;
                            $fileNameDoc              = strtolower($randomStrDoc).'.'.$proof_of_doc_ext;
                            $move_file_now            = $id_card->move(public_path($folderPathID), $fileNameID);
                            $move_file_now            = $proof_of_doc->move(public_path($folderPathDoc), $fileNameDoc);

                            $db_personal->id_card     = $request->has('id_card') ? $fileNameID : $db_personal->id_card;
                            $db_personal->proof_of_doc= $request->has('proof_of_doc') ? $fileNameDoc : $db_personal->proof_of_doc;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } 
        
                    } else {
                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Congratulations, you have successfully updated your information.',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;

                    }
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
                
            } elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;

            } else {
                                
                $oldFileNameID                     = $db_personal->id_card;
                $oldFileNameDoc                    = $db_personal->proof_of_doc;

                $db_personal->employer_name        = $employer_name;
                $db_personal->employer_address     = $employer_address;
            
                $isSuccess                         = $db_personal->update();
        
            
                if (!empty($isSuccess)) {

                    if ($request->has('proof_of_doc') || $request->has('id_card')) {

                        $isSuccess = $request->has('proof_of_doc') ? $this->deleteFiles($folderPathDoc, $oldFileNameDoc) : false;
                        $isSuccess = $request->has('id_card') ? $this->deleteFiles($folderPathID, $oldFileNameID) : false;

                        if ($isSuccess) {
                            $id_card_ext              = $request->has('id_card') ? $id_card->getClientOriginalExtension() : 'jpg';
                            $proof_of_doc_ext         = $request->has('proof_of_doc') ? $proof_of_doc->getClientOriginalExtension() : 'jpg';
                            $randomStrID              = $db_personal->id.Str::random(20);
                            $randomStrDoc             = $db_personal->id.Str::random(20);
                            $fileNameID               = strtolower($randomStrID).'.'.$id_card_ext;
                            $fileNameDoc              = strtolower($randomStrDoc).'.'.$proof_of_doc_ext;
                            $move_file_now            = $id_card->move(public_path($folderPathID), $fileNameID);
                            $move_file_now            = $proof_of_doc->move(public_path($folderPathDoc), $fileNameDoc);

                            $db_personal->id_card     = $request->has('id_card') ? $fileNameID : $db_personal->id_card;
                            $db_personal->proof_of_doc= $request->has('proof_of_doc') ? $fileNameDoc : $db_personal->proof_of_doc;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } else {
                            $id_card_ext              = $request->has('id_card') ? $id_card->getClientOriginalExtension() : 'jpg';
                            $proof_of_doc_ext         = $request->has('proof_of_doc') ? $proof_of_doc->getClientOriginalExtension() : 'jpg';
                            $randomStrID              = $db_personal->id.Str::random(20);
                            $randomStrDoc             = $db_personal->id.Str::random(20);
                            $fileNameID               = strtolower($randomStrID).'.'.$id_card_ext;
                            $fileNameDoc              = strtolower($randomStrDoc).'.'.$proof_of_doc_ext;
                            $move_file_now            = $id_card->move(public_path($folderPathID), $fileNameID);
                            $move_file_now            = $proof_of_doc->move(public_path($folderPathDoc), $fileNameDoc);

                            $db_personal->id_card     = $request->has('id_card') ? $fileNameID : $db_personal->id_card;
                            $db_personal->proof_of_doc= $request->has('proof_of_doc') ? $fileNameDoc : $db_personal->proof_of_doc;
                            $isSuccess                = $db_personal->update();

                            $notification = array(
                                'title' => 'Upload',
                                'message' => 'Congratulations, you have successfully updated your information.',
                                'moved' => 'Here',
                                'success' => true,
                                // 'data' => $request->all()
                            );
                    
                            $selected_item = response()->json($notification);
                    
                            return $selected_item;
                        } 
        
                    } else {
                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Congratulations, you have successfully updated your information.',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;

                    }
            
                } else {
                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Sorry cannot update information.',
                        'moved' => 'Here',
                        'success' => false,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;
            
                }
               
            }

        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Sorry cannot update information.',
                'moved' => 'Here',
                'success' => false,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }

    }


    
    public function saveSelfieImg(Request $request) {

        $sendNoti = new EziNotificationController();

        // dd($request->all());
        $currentUser = Auth::user();

        $encoded_data              = $request->photoStore;

        // dd($binary_data);

        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);

   
        if (!empty($db_personal)) {

            if ($db_personal->rent_status == 1) {
                
                $oldFileName = $db_personal->selfie;

                $ext                      = 'jpg';
                $randomStr                = $db_personal->id.Str::random(20);
                $fileName                 = strtolower($randomStr).'.'.$ext;
                $folderPath               = 'tenants/selfie/';
                $binary_data              = base64_decode($encoded_data);

        
                if (!empty($oldFileName)) {

                    $isSuccess = $this->deleteFiles($folderPath, $oldFileName);

                    if ($isSuccess) {

                        $move_file_now              = file_put_contents(public_path($folderPath.$fileName) , $binary_data);

                        $db_personal->selfie        = $fileName;
                        $db_personal->rent_status   = 2;
                        $isSuccess                  = $db_personal->update();

                        $sendNoti->sendNotification($currentUser->id, $currentUser->user_type, $db_personal->id, $currentUser->f_name .' '. $currentUser->l_name, 'Has applied for a rent assistance.', 'apply');

                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Selfie uploaded successfully',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;
                    } else {
                        
                        $move_file_now         = file_put_contents(public_path($folderPath.$fileName) , $binary_data);

                        $db_personal->selfie   = $fileName;
                        $db_personal->rent_status   = 2;
                        $isSuccess             = $db_personal->update();

                        $sendNoti->sendNotification($currentUser->id, $currentUser->user_type, $db_personal->id, $currentUser->f_name .' '. $currentUser->l_name, 'Has applied for a rent assistance.', 'apply');

                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Selfie uploaded successfully',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;
                    } 
    
                } else {
                
                    $move_file_now         = file_put_contents(public_path($folderPath.$fileName) , $binary_data);

                    $db_personal->selfie   = $fileName;
                    $db_personal->rent_status   = 2;
                    $isSuccess             = $db_personal->update();

                    $sendNoti->sendNotification($currentUser->id, $currentUser->user_type, $db_personal->id, $currentUser->f_name .' '. $currentUser->l_name, 'Has applied for a rent assistance.', 'apply');

                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Selfie uploaded successfully',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;

                }
        
            }  elseif ($db_personal->rent_status == 2 || $db_personal->rent_status == 3 || $db_personal->rent_status == 4 || $db_personal->rent_status == 5 || $db_personal->rent_status == 6) {
                $notification = array(
                    'title' => 'Upload',
                    'message' => "Sorry! Your application is being processed.",
                    'moved' => 'Here',
                    'success' => false,
                    // 'data' => $request->all()
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
            } else {
                
                                
                $oldFileName = $db_personal->selfie;

                $ext                      = 'jpg';
                $randomStr                = $db_personal->id.Str::random(20);
                $fileName                 = strtolower($randomStr).'.'.$ext;
                $folderPath               = 'tenants/selfie/';
                $binary_data              = base64_decode($encoded_data);

        
                if (!empty($oldFileName)) {

                    $isSuccess = $this->deleteFiles($folderPath, $oldFileName);

                    if ($isSuccess) {

                        $move_file_now              = file_put_contents(public_path($folderPath.$fileName) , $binary_data);

                        $db_personal->selfie        = $fileName;
                        $db_personal->rent_status   = 2;
                        $isSuccess                  = $db_personal->update();

                        $sendNoti->sendNotification($currentUser->id, $currentUser->user_type, $db_personal->id, $currentUser->f_name .' '. $currentUser->l_name, 'Has applied for a rent assistance.', 'apply');

                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Selfie uploaded successfully',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;
                    } else {
                        
                        $move_file_now         = file_put_contents(public_path($folderPath.$fileName) , $binary_data);

                        $db_personal->selfie   = $fileName;
                        $isSuccess             = $db_personal->update();

                        $notification = array(
                            'title' => 'Upload',
                            'message' => 'Selfie uploaded successfully',
                            'moved' => 'Here',
                            'success' => true,
                            // 'data' => $request->all()
                        );
                
                        $selected_item = response()->json($notification);
                
                        return $selected_item;
                    } 
    
                } else {
                
                    $move_file_now         = file_put_contents(public_path($folderPath.$fileName) , $binary_data);

                    $db_personal->selfie   = $fileName;
                    $isSuccess             = $db_personal->update();

                    $notification = array(
                        'title' => 'Upload',
                        'message' => 'Selfie uploaded successfully',
                        'moved' => 'Here',
                        'success' => true,
                        // 'data' => $request->all()
                    );
            
                    $selected_item = response()->json($notification);
            
                    return $selected_item;

                }
        
            }
       
        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Please fill in your details to add your selfie.',
                'moved' => 'Here',
                'success' => false,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }
        

    }

    

        
    public function getUserApplicationInfoDetails(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();
       
        $db_personal = EziPersonalDetailsModel::get_last_apply_user_id($currentUser->id);

        // dd($db_personal);

        $fName = $currentUser->f_name == null ? $currentUser->f_name : '';
        $lName = $currentUser->l_name == null ? $currentUser->l_name : '';

        $fullName = $currentUser->f_name;

        if ($db_personal != null) {

            $notification = array(
                'title' => 'Upload',
                'message' => 'Congratulations, you have successfully updated your emengency contact information.',
                'moved' => 'Here',
                'success' => true,
                'user' => $fullName,
                'data' => $db_personal
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
        } else {
            $notification = array(
                'title' => 'Upload',
                'message' => 'Congratulations, you have successfully updated your emengency contact information.',
                'moved' => 'Here',
                'success' => false,
                'user' => $fullName,
                // 'data' => $request->all()
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
        }
            
                
    }

    


    private function deleteFiles($folderPath, $fileName) {

        $isSuccess = false;

        if ($fileName == null || $fileName == '' ) {
            $isSuccess = false;
        } else {
                
            if (file_exists(public_path($folderPath . $fileName))) {

                $isSuccess = unlink(public_path($folderPath . $fileName));

            } 

        }
        
    
        return $isSuccess;
        
    }


    
    private function deleteFolder($folderPath) {

        $isSuccess = false;

        if (File::exists(public_path($folderPath))) {
            $isSuccess = File::deleteDirectory(public_path($folderPath));
        }

        return $isSuccess;
        
    }


}
