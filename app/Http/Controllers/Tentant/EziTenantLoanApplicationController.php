<?php

namespace App\Http\Controllers\Tentant;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziTenantPropertyModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziTenantLoanApplicationController extends Controller
{
    //
    public function getApplicationPage() {

        $currentUser = Auth::user();
        
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPersonalDetails'] = EziPersonalDetailsModel::getUsetPersonalDetails($currentUser->id);


        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.loans.apply', $data);

    }


    public function getApplicationLoanListPage() {

        $currentUser = Auth::user();
        
        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getRentHistoryByMe'] = EziPersonalDetailsModel::getAllApplicationDetails($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.loans.list', $data);

    }


    public function getLoanCalcPage() {

        $currentUser = Auth::user();
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.emi.calc', $data);

    }

    
    public function getLoanDetailsPage() {

        $currentUser = Auth::user();
        
        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        // $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.loans.details');

    }



        
    public function getPropListPage() {

        $currentUser = Auth::user();
        
        $data['getPropertiesOverview'] = EziTenantPropertyModel::getAllPropertiesOverview(6);
        $data['getAllProperties'] = EziTenantPropertyModel::getAllProperties();

        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        // $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.property.list', $data);

    }




       public function getPropListAllAjax() {

        $currentUser = Auth::user();
        
        $data['getPropertiesOverview'] = EziTenantPropertyModel::getAllPropertiesOverview(6);
        $data['getAllProperties'] = EziTenantPropertyModel::getAllProperties();

        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        // $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        // $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        $notification = array(
            'title' => 'Delete Application',
            'success' => false,
            'data' => $data
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }


}
