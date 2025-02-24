<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\EziAdminBookingModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziAdminTenantsController extends Controller
{
    //
    public function getAdminTenantsList() {

        $currentUser = Auth::user();
        $data['getAllTenants'] = User::getAllUserWhereType(1);
        $data['getAllLandlords'] = EziPersonalDetailsModel::getAllApplicationsStats(3);


        $data['getAllAdmins'] = EziAdminBookingModel::getAllBookingViews(1);

        return view('admin.tenants.list', $data);

    }


    public function getAdminLandlordsList() {

        $currentUser = Auth::user();
        $data['getAllLandlords'] = User::getAllUserWhereType(3);


        $data['getAllAdmins'] = EziAdminBookingModel::getAllBookingViews(1);

        return view('admin.landlords.list', $data);

    }


    public function getAdminAgentsList() {

        $currentUser = Auth::user();
        $data['getAllAgents'] = User::getAllUserWhereType(2);


        $data['getAllAdmins'] = EziAdminBookingModel::getAllBookingViews(1);

        return view('admin.agents.list', $data);

    }



               
    public function getAdminUsersAjax($id) {

        // dd($request->all());

        $db_user = User::getSingle($id);

        if (!empty($db_user)) {
           
            $notification = array(
                'title' => 'Users',
                'success' => true,
                'data' => $db_user
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Users',
                'success' => false,
                'data' => $db_user
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }


                       
    public function sendUserStatusAjax(Request $request, $id) {

        $currentUser = Auth::user();
        $id             = $request->id;
        $prop_status    = $request->prop_status;
        $purpose        = $request->purpose;

        $db_property    = User::getSingle($id);
        $db_property->$purpose  = $prop_status;
        $db_property->update();

        $notification = array(
            'title' => 'User Status',
            'success' => true,
            'data' => $db_property
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }


    
           
    public function getAdminUserDeletAjax(Request $request, $id) {

        // dd($request->all());

        $id = $request->id;

        $db_user = User::getSingle($id);

        if (!empty($db_user)) {
                
            $db_user->delete();

            $notification = array(
                'title' => 'Delete User',
                'success' => true,
                'data' => $db_user
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete User',
                'success' => false,
                'data' => $db_user
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }




}
