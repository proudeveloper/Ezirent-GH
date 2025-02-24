<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziPropertyTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziAdminSettingsController extends Controller
{
    //
    
           
    public function getAdminPropertyTypesAjax() {

        // dd($request->all());

        $db_property_type = EziPropertyTypeModel::getAllPeopertyTypes();

        if (!empty($db_property_type)) {
          
            $notification = array(
                'title' => 'Delete Booking',
                'success' => true,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Booking',
                'success' => false,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }


    
    public function singleAdminPropertyTypeAjax($id) {

      
        $db_property_type = EziPropertyTypeModel::getSingle($id);

        if (!empty($db_property_type)) {

            $notification = array(
                'title' => 'Update Property Type',
                'success' => true,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Update Property Type',
                'success' => false,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }

    public function updateAdminPropertyTypesAjax(Request $request, $id) {

        // dd($request->all());
        $name       = $request->name;
        $code_name  = $request->code_name;
        $filters    = $request->filters;

        $db_property_type = EziPropertyTypeModel::getSingle($id);

        if (!empty($db_property_type)) {

            $db_property_type->name         = $name;
            $db_property_type->code_name    = $code_name;
            $db_property_type->filters      = $filters;
            $db_property_type->update();

            $notification = array(
                'title' => 'Update Property Type',
                'success' => true,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Update Property Type',
                'success' => false,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }

         
    public function deleteAdminPropertyTypesAjax(Request $request, $id) {

        // dd($request->all());

        $id = $request->id;

        $db_property_type = EziPropertyTypeModel::getSingle($id);

        if (!empty($db_property_type)) {
                
            $db_property_type->delete();

            $notification = array(
                'title' => 'Delete Property Type',
                'success' => true,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Property Type',
                'success' => false,
                'data' => $db_property_type
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }


                           
    public function sendUserStatusAjax(Request $request, $id) {

        $id             = $request->id;
        $prop_status    = $request->prop_status;
        $purpose        = $request->purpose;

        $db_property_type = EziPropertyTypeModel::getSingle($id);
        $db_property_type->$purpose  = $prop_status;
        $db_property_type->update();

        $notification = array(
            'title' => 'User Status',
            'success' => true,
            'data' => $db_property_type
        );

        $selected_item = response()->json($notification);

        return $selected_item;

    }


    public function postNewPropTypeFormAjax(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $name                   = $request->name;
        $code_name              = $request->code_name;
        $filters                = $request->filters;


        $db_prop_type = EziPropertyTypeModel::checkIfExist($name);

        // dd($db_prop_type);

        if ($db_prop_type) {
            $prop_model    = new EziPropertyTypeModel();

            $prop_model->user_id            = $currentUser->id;
            $prop_model->name               = $name;
            $prop_model->rent_type          = $code_name;
            $prop_model->bedroom            = $filters;
            $isSuccess                      = $prop_model->save();

            if ($isSuccess) {
                    
                $notification = array(
                    'title' => 'Property Type',
                    'success' => true,
                    'message' => 'New Property Type Saved Successfully.'
                );

                $selected_item = response()->json($notification);

                return $selected_item;

            } else {
                    
                $notification = array(
                    'title' => 'Property Type',
                    'success' => false,
                    'message' => 'Could not save new property type.'
                );

                $selected_item = response()->json($notification);

                return $selected_item;

            }
            
    
        } else {
            
            $notification = array(
                'title' => 'Property Type',
                'success' => false,
                'message' => 'Property Type Already Exists.'
            );

            $selected_item = response()->json($notification);

            return $selected_item;

    
        }


    }


}
