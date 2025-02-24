<?php

namespace App\Http\Controllers\Tentant;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziAddressModel;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziTenantPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziTenantDashboardController extends Controller
{
    //

    public function getTenantDashboard() {

        $currentUser = Auth::user();
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        return view('tenants.dashboard', $data);

    }
}
