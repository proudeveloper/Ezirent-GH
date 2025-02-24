<?php

namespace App\Http\Controllers;

use App\Models\EziPaymentAmountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziPaymentAmountController extends Controller
{
    //
                    
    public function getPaymentAmount(Request $request) {

        $currentUser = Auth::user();
        $purpose = $request->purpose;

        $db_property = EziPaymentAmountModel::getSinglePaymentAmount($purpose);

        $notification = array(
            'title' => 'Delete Application',
            'success' => true,
            'data' => $db_property
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }

       
}
