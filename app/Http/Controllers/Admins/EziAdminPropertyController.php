<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\EziAdminBookingModel;
use App\Models\Agent\EziAddressModel;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziPropertImageModel;
use App\Models\Clients\EziTenantPropertyModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EziAdminPropertyController extends Controller
{
    //
            
    public function getAdminProperties() {

        $currentUser = Auth::user();
        $data['getAllApply'] = EziPersonalDetailsModel::getAllApplications();
        $data['getAllPublishedProp'] = EziTenantPropertyModel::getAllTenantStats('published', 1);
        $data['getAllDeclinedProp'] = EziTenantPropertyModel::getAllTenantStats('status', 0);
        $data['getAllPending'] = EziTenantPropertyModel::getAllTenantStats('status', 1);
        $data['getAllApproved'] = EziTenantPropertyModel::getAllTenantStats('status', 2);


        $data['getAllProperties'] = EziTenantPropertyModel::getAllTotalProperties();



        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('admin.property.list', $data);

    }


                
    public function getSinglePropertyAjax(Request $request, $id) {

        $currentUser = Auth::user();
        $id = $request->id;

        $db_property = EziTenantPropertyModel::getSingle($id);

        $notification = array(
            'title' => 'Delete Application',
            'success' => true,
            'data' => $db_property
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }

                    
    public function sendPropertyStatusAjax(Request $request, $id) {

        $currentUser = Auth::user();
        $id             = $request->id;
        $prop_status    = $request->prop_status;
        $purpose        = $request->purpose;

        $db_property                = EziTenantPropertyModel::getSingle($id);
        $db_property->$purpose  = $prop_status;
        $db_property->update();

        $notification = array(
            'title' => 'Delete Application',
            'success' => true,
            'data' => $db_property
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }

    public function getPropertyDetailPage($id) {

        $currentUser = Auth::user();
        // $data['getAllApply'] = EziPersonalDetailsModel::getAllApplications();
        // $data['getAllApplyApproved'] = EziPersonalDetailsModel::getAllApplicationsStats(4);
        // $data['getAllApplyDeclined'] = EziPersonalDetailsModel::getAllApplicationsStats(5);
        // $data['getAllApplyPending'] = EziPersonalDetailsModel::getAllApplicationsStats(2);

        $data['getAPropertyDetail'] = EziTenantPropertyModel::getSingleProperty($id);
        // $data['getSingleProperty'] = EziTenantPropertyModel::getSingleProperty($id);
        $data['getAPropertyImgs'] = EziPropertImageModel::getDetailProperties($id);




        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        // $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('admin.property.details', $data);

    }


        
    public function getAdminPropertyDeletAjax(Request $request, $id) {

        // dd($request->all());

        $id = $request->id;

        $db_property = EziTenantPropertyModel::getSingle($id);

        if (!empty($db_property)) {
                
            $db_property->delete();
            $this->deleteFolder('uploads/properties/'.$id);

            $notification = array(
                'title' => 'Delete Property',
                'success' => true,
                'data' => $db_property
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Property',
                'success' => false,
                'data' => $db_property
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }


    private function deleteFiles($folderPath, $fileName) {

        $isSuccess = false;
        
        if (file_exists($folderPath . $fileName)) {

            $isSuccess = unlink(public_path($folderPath, $fileName));

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
