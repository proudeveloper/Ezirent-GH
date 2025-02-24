<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziAddressModel;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziTenantPropertyModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziAdminApplicationController extends Controller
{
    //
    
    public function getAdminApplication() {

        $currentUser = Auth::user();
        $data['getAllApply'] = EziPersonalDetailsModel::getAllApplications();
        $data['getAllApplyApproved'] = EziPersonalDetailsModel::getAllApplicationsStats(4);
        $data['getAllApplyDeclined'] = EziPersonalDetailsModel::getAllApplicationsStats(5);
        $data['getAllApplyPending'] = EziPersonalDetailsModel::getAllApplicationsStats(2);


        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('admin.application.list', $data);

    }


    
    public function getAllAdminApplicationsAjax()
    {

        // dd($request->all());
        $currentUser = Auth::user();


        $myData = EziPersonalDetailsModel::getAllApplications();

        $notification = array(
            'title' => 'List Of Songs',
            'success' => 'success',
            'data' => $myData
        );

        $selected_item = response()->json($notification);

        return $selected_item;
    }

    public function getAdminApplicationDetails($id) {

        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();

        $data['getSingleEdit'] = EziPersonalDetailsModel::getSingle($id);

        return view('admin.application.details', $data);

    }


    public function getAdminApplicationProcessingAjax(Request $request, $id) {

        // dd($request->all());

        $rent_status = $request->rent_status;

        $db_application = EziPersonalDetailsModel::getSingle($id);

        if (!empty($db_application)) {
                
            $db_application->rent_status = $rent_status;
            $db_application->update();

            $notification = array(
                'title' => 'Rent Status',
                'success' => true,
                // 'data' => $this->myData
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Rent Status',
                'success' => false,
                // 'data' => $this->myData
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }

    
    public function getAdminApplicationDeletAjax(Request $request, $id) {

        // dd($request->all());

        $id = $request->id;

        $db_application = EziPersonalDetailsModel::getSingle($id);

        if (!empty($db_application)) {
                
            $db_application->delete();

            $notification = array(
                'title' => 'Delete Application',
                'success' => true,
                // 'data' => $this->myData
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Application',
                'success' => false,
                // 'data' => $this->myData
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }

    
    public function getAdminApplicationDetailsAjax($id) {

        // dd($request->all());

        $db_application = EziPersonalDetailsModel::getSingle($id);

        if (!empty($db_application)) {
         
            $notification = array(
                'title' => 'Delete Application',
                'success' => true,
                'data' => $db_application
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Application',
                'success' => false,
                'data' => 'No data'
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }

    
    public function sendAdminApplicationPayedAjax(Request $request, $id) {

        // dd($request->all());

        $purpose        = $request->purpose;
        $app_status     = $request->app_status;

        $db_application = EziPersonalDetailsModel::getSingle($id);

        if (!empty($db_application)) {
                
            $db_application->$purpose = $app_status;
            $db_application->update();

            $notification = array(
                'title' => 'Update Application',
                'success' => true,
                'data' => $db_application
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Update Application',
                'success' => false,
                // 'data' => $this->myData
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }

    



}
