<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EziAgentProfileController extends Controller
{
    //
    
    public function getAgentProfile() {

        // $currentUser = Auth::user();
        // $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        return view('agents.profile');

    }

}
