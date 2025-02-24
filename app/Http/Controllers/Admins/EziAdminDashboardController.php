<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziAddressModel;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziTenantPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziAdminDashboardController extends Controller
{
    //
    
    public function getAdminDashboard() {

        $currentUser = Auth::user();
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('admin.dashboard', $data);

    }


    public function getAdminMessages() {

        $currentUser = Auth::user();
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('admin.messages', $data);

    }

    
    public function getAdminSettingsPage() {

        $currentUser = Auth::user();
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('admin.settings', $data);

    }

}
