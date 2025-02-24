<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziAddressModel;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziTenantPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziAgentDashboardController extends Controller
{
    //
    public function getAgentDashboard() {

        $currentUser = Auth::user();
        
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesByUserAll(user_id: $currentUser->id, perPage: 10);

        $data['getUserAddress'] = EziAddressModel::getUserAddress($currentUser->id);

        $data['getPropertyStats'] = EziTenantPropertyModel::getAllPropertStats(user_id: $currentUser->id, pub_val: 1, status_val: 2);
        $data['getPropertyStatsPend'] = EziTenantPropertyModel::getAllPropertStats(user_id: $currentUser->id, pub_val: null, status_val: 1);


        return view('agents.dashboard', $data);

    }


}
