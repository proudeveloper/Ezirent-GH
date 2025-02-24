<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\EziAdminBookingModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziAdminBookingController extends Controller
{
    //
    public function getAdminViewBooking() {

        $currentUser = Auth::user();
        $data['getAllApply'] = EziPersonalDetailsModel::getAllApplications();
        $data['getAllApplyApproved'] = EziPersonalDetailsModel::getAllApplicationsStats(4);
        $data['getAllApplyDelivered'] = EziPersonalDetailsModel::getAllApplicationsStats(7);
        $data['getAllApplyPending'] = EziPersonalDetailsModel::getAllApplicationsStats(2);


        $data['getAllBookings'] = EziAdminBookingModel::getAllBookingViews();
        $data['getAllRented'] = EziAdminBookingModel::getAllViewingStats(1);

        return view('admin.booking.list', $data);

    }



           
    public function getAdminBookingDeletAjax(Request $request, $id) {

        // dd($request->all());

        $id = $request->id;

        $db_booking_view = EziAdminBookingModel::getSingle($id);

        if (!empty($db_booking_view)) {
                
            $db_booking_view->delete();

            $notification = array(
                'title' => 'Delete Booking',
                'success' => true,
                'data' => $db_booking_view
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Booking',
                'success' => false,
                'data' => $db_booking_view
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }


}
