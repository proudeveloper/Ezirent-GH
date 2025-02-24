<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EziAgentPaymentController extends Controller
{
    //
    public function getAgentPayment() {

        // $currentUser = Auth::user();
        // $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        return view('agents.payment');

    }


    public function getAgentInvoice() {

        // $currentUser = Auth::user();
        // $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        return view('agents.invoice');

    }
    
}
