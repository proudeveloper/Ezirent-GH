<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Agent\EziUserModel;
use App\Models\Clients\EziPropertImageModel;
use App\Models\Clients\EziRatingModel;
use App\Models\Clients\EziTenantPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EziAgentPropertiesController extends Controller
{
    //
    
    public function getAgentProperties() {

        $currentUser = Auth::user();
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
         $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesByUserAll(user_id: $currentUser->id, perPage: null);

        $data['getPropertyStats'] = EziTenantPropertyModel::getAllPropertStats(user_id: $currentUser->id, pub_val: 1, status_val: 2);
        $data['getPropertyStatsPend'] = EziTenantPropertyModel::getAllPropertStats(user_id: $currentUser->id, pub_val: null, status_val: 1);

        
        return view('agents.properties', $data);

    }

    
    static public function propertyRating($prop_id) {
        $rate_val = 0;
        $list = EziRatingModel::getPropertyRatings($prop_id);
        
        // $selected_item = json_decode($list, true);

        if ($list == null) {
            
            $rate_val = 0;

        } else {
            $divider = $list->count();
            if ($divider != 0) {
                $divisor = $list->sum('rating_value');
            
                $rate_val =  $divisor / $divider;
            }
    
        }
        
        return $rate_val;
    }


    public function postAddNewProperty(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $txt_title              = $request->title;
        $txt_prop_dexc          = $request->prop_dexc;
        $txt_rent_type          = $request->rent_type;
        $txt_livingroom         = $request->livingroom;
        $txt_bedroom            = $request->bedroom;
        $txt_bathroom           = $request->bathroom;
        $txt_rent_amount        = $request->price;
        $txt_prop_cat_id        = $request->prop_cat_id;
        $txt_furnished          = $request->furnished == 'on' ? 1 : 0;
        $txt_fitted_kitchen     = $request->fitted_kitchen == 'on' ? 1 : 0;
        $txt_prop_location      = $request->prop_location;
        $txt_separate_meter     = $request->separate_meter == 'on' ? 1 : 0;
        $txt_shared_amen        = $request->shared_amen == 'on' ? 1 : 0;
        
        
        $prop_images        = $request->file('prop_images');

        // dd(public_path($folderPath), '$prop_images->name');
        

        $prop_model    = new EziTenantPropertyModel();

        $prop_model->user_id            = $currentUser->id;
        $prop_model->name               = $txt_title;
        $prop_model->rent_amount        = $txt_rent_amount;
        $prop_model->prop_category_id   = $txt_prop_cat_id;
        $prop_model->rent_type          = $txt_rent_type;
        $prop_model->bedroom            = $txt_bedroom;
        $prop_model->bathroom           = $txt_bathroom;
        $prop_model->livingroom         = $txt_livingroom;
        $prop_model->descriptions       = $txt_prop_dexc;
        $prop_model->furnished          = $txt_furnished;
        $prop_model->separate_meter     = $txt_separate_meter;
        $prop_model->shared_amen        = $txt_shared_amen;
        $prop_model->fitted_kitchen     = $txt_fitted_kitchen;
        $prop_model->prop_location      = $txt_prop_location;
        $isSuccess                      = $prop_model->save();


        $index = 1;
        $fileName = '';

        if (!empty($isSuccess)) {
            $db_prop = EziTenantPropertyModel::getSinglePropertyByNameID($txt_title, $currentUser->id, $txt_rent_amount);

            
            $folderPath = 'uploads/properties/'.$db_prop->id.'/';


            if (!empty($prop_images)) {

                foreach ($prop_images as $image) {

                    $ext                    = $image->getClientOriginalExtension();
                    $randomStr              = $db_prop->id.Str::random(20);
                    $fileName               = strtolower($randomStr).'.'.$ext;
                    $move_file_now          = $image->move(public_path($folderPath), $fileName);

                    $prop_img_model         = new EziPropertImageModel();

                    $prop_img_model->img_name           = $fileName;
                    $prop_img_model->img_ext            = !empty($ext) ? $ext : 'jpg';
                    $prop_img_model->prop_id            = $db_prop->id;
                    $prop_img_model->order_img_by       = $index++;
                    $isSuccess                          = $prop_img_model->save();

                
                }

                $db_prop->prop_img  = $fileName;
                $db_prop->update();
                    $notification = array(
                        'title' => 'Success Adding!',
                        'message' => 'New property, has been successfully added.',
                        'alert-type' => 'success',
                        'icon' => 'alert-outline'
                    );
        
                    return redirect('agent/add_property')->with($notification);
                // }


            }

        } else {
            $notification = array(
                'title' => 'Failed Adding!',
                'message' => 'Failed adding new property. Contact Admin.',
                'alert-type' => 'danger',
                'icon' => 'alert-outline'
            );

            return redirect('agent/add_property')->with($notification);
        }
        

        // $db_user = EziUserModel::getSingleUser($currentUser->phone);

        
        // $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();

        // return view('agents.add_property', $data);

    }


    public function getAgentEditproperty($id) {

        $currentUser = Auth::user();
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesOfUser($currentUser->id);
        $data['getSingleProperty'] = EziTenantPropertyModel::getSingleProperty($id);
        $data['getPropertyImgs'] = EziPropertImageModel::getDetailProperties($id);

        // dd($data);
        return view('agents.edit_property', $data);
    }


    
    public function postUpdateProperty(Request $request) {

        // dd($request->all());
        $currentUser = Auth::user();

        $txt_prop_id            = $request->id;
        $txt_title              = $request->title;
        $txt_prop_dexc          = $request->prop_dexc;
        $txt_rent_type          = $request->rent_type;
        $txt_livingroom         = $request->livingroom;
        $txt_bedroom            = $request->bedroom;
        $txt_bathroom           = $request->bathroom;
        $txt_rent_amount        = $request->price;
        $txt_prop_cat_id        = $request->prop_cat_id;
        $txt_furnished          = $request->furnished == 'on' ? 1 : 0;
        $txt_fitted_kitchen     = $request->fitted_kitchen == 'on' ? 1 : 0;
        $txt_prop_location      = $request->prop_location;
        $txt_separate_meter     = $request->separate_meter == 'on' ? 1 : 0;
        $txt_shared_amen        = $request->shared_amen == 'on' ? 1 : 0;
        $prop_images            = $request->file('prop_images');

        // dd(public_path($folderPath), '$prop_images->name');
        

        $prop_model    = EziTenantPropertyModel::getSingle($txt_prop_id);

        $prop_model->user_id            = $currentUser->id;
        $prop_model->name               = $txt_title;
        $prop_model->rent_amount        = $txt_rent_amount;
        $prop_model->prop_category_id   = $txt_prop_cat_id;
        $prop_model->rent_type          = $txt_rent_type;
        $prop_model->bedroom            = $txt_bedroom;
        $prop_model->bathroom           = $txt_bathroom;
        $prop_model->livingroom         = $txt_livingroom;
        $prop_model->descriptions       = $txt_prop_dexc;
        $prop_model->furnished          = $txt_furnished;
        $prop_model->separate_meter     = $txt_separate_meter;
        $prop_model->shared_amen        = $txt_shared_amen;
        $prop_model->fitted_kitchen     = $txt_fitted_kitchen;
        $prop_model->prop_location      = $txt_prop_location;
        $isSuccess                      = $prop_model->update();


        $index = 1;
        $fileName = '';

        if (!empty($isSuccess)) {
            
            $folderPath = 'uploads/properties/'.$txt_prop_id.'/';

            if ($request->has('prop_images')) {

                $db_prop_iamges = EziPropertImageModel::getDetailProperties($txt_prop_id);

                foreach ($db_prop_iamges as $db_img) {
                    $db_img->delete();
                }

                $isSuccess = $this->deleteFolder('uploads/properties/'.$txt_prop_id);

                if ($isSuccess) {
                    
                    foreach ($prop_images as $image) {

                        $ext                    = $image->getClientOriginalExtension();
                        $randomStr              = $txt_prop_id.Str::random(20);
                        $fileName               = strtolower($randomStr).'.'.$ext;
                        $move_file_now          = $image->move(public_path($folderPath), $fileName);

                        $prop_img_model         = new EziPropertImageModel();

                        $prop_img_model->img_name           = $fileName;
                        $prop_img_model->img_ext            = !empty($ext) ? $ext : 'jpg';
                        $prop_img_model->prop_id            = $txt_prop_id;
                        $prop_img_model->order_img_by       = $index++;
                        $isSuccess                          = $prop_img_model->save();

                    
                    }

                    $prop_model->prop_img  = $fileName;
                    $prop_model->update();

                    $notification = array(
                        'title' => 'Success Updates!',
                        'message' => 'Property, has been successfully updated.',
                        'alert-type' => 'success',
                        'icon' => 'alert-outline'
                    );
        
                    return redirect('agent/properties')->with($notification);
                   
                } else {
                    foreach ($prop_images as $image) {

                        $ext                    = $image->getClientOriginalExtension();
                        $randomStr              = $txt_prop_id.Str::random(20);
                        $fileName               = strtolower($randomStr).'.'.$ext;
                        $move_file_now          = $image->move(public_path($folderPath), $fileName);

                        $prop_img_model         = new EziPropertImageModel();

                        $prop_img_model->img_name           = $fileName;
                        $prop_img_model->img_ext            = !empty($ext) ? $ext : 'jpg';
                        $prop_img_model->prop_id            = $txt_prop_id;
                        $prop_img_model->order_img_by       = $index++;
                        $isSuccess                          = $prop_img_model->save();

                    }

                    $prop_model->prop_img  = $fileName;
                    $prop_model->update();

                    $notification = array(
                        'title' => 'Success Updates!',
                        'message' => 'Property, has been successfully updated.',
                        'alert-type' => 'success',
                        'icon' => 'alert-outline'
                    );
        
                    return redirect('agent/properties')->with($notification);
                }
                

            } else {
                $notification = array(
                    'title' => 'Success Updates!',
                    'message' => 'Property, has been successfully updated.',
                    'alert-type' => 'success',
                    'icon' => 'alert-outline'
                );
    
                return redirect('agent/properties')->with($notification);
            }

        } else {
            $notification = array(
                'title' => 'Failed Update!',
                'message' => 'Failed updating property. Contact Admin.',
                'alert-type' => 'danger',
                'icon' => 'alert-outline'
            );

            return redirect('agent/edit_property')->with($notification);
        }
        

    }

    
      ########################################################################################################################################## 
    public function getAgetPropertyDelete(Request $request, $id) {

        // dd($request->all());

        $id = $request->id;

        $db_property = EziTenantPropertyModel::getSingle($id);

        if (!empty($db_property)) {
                
            $db_property->delete();
            
            $isSuccess = $this->deleteFolder('uploads/properties/'.$id);

            $notification = array(
                'title' => 'Delete Property',
                'success' => true,
                'data' => $db_property
            );

            // $selected_item = response()->json($notification);

            return redirect()->back()->with($notification);

        } else {
            $notification = array(
                'title' => 'Delete Property',
                'success' => false,
                'data' => $db_property
            );

            // $selected_item = response()->json($notification);

            return redirect()->back()->with($notification);
        }
        

    }



    public function getAjaxPropertyImages($id) {

        // dd($id);


        $currentUser = Auth::user();
        
        $getSingleProperty = EziTenantPropertyModel::getSingleProperty($id);
        $getPropertyImgs = EziPropertImageModel::getDetailProperties($id);

        $notification = array(
            'title' => 'Downloads',
            // 'message' => $is_success,
            'success' => 'success',
            'data' => $getPropertyImgs
        );

        $selected_item = response()->json($notification);

        return $selected_item;
    }



    public function getAgentFavorite() {

        
        $currentUser = Auth::user();
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
         $data['getPropertyByMe'] = EziTenantPropertyModel::getAllPropertiesByUserAll(user_id: $currentUser->id, perPage: null);

        $data['getPropertyStats'] = EziTenantPropertyModel::getAllPropertStats(user_id: $currentUser->id, pub_val: 1, status_val: 2);
        $data['getPropertyStatsPend'] = EziTenantPropertyModel::getAllPropertStats(user_id: $currentUser->id, pub_val: null, status_val: 1);


        return view('agents.favorite', $data);

    }


    public function getAgentAddProperty() {

        // $currentUser = Auth::user();
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();

        return view('agents.add_property', $data);

    }




    private function checkIfOn($texts) {

        $isSuccess = 0;
        $txt_val = $texts;
        
        if ($txt_val == 'on') {

            $isSuccess = 1;

        } 

        return $isSuccess;
        
    }


    private function deleteFiles($folderPath, $fileName) {

        $isSuccess = false;
        
        if (file_exists($folderPath . $fileName)) {

            $isSuccess = unlink(public_path($folderPath, $fileName));

        } 

        return $isSuccess;
        
    }


    
    private function deleteFolder($folderPath) {

        $isSuccess = false;

        if (File::exists(public_path($folderPath))) {
            $isSuccess = File::deleteDirectory(public_path($folderPath));
        }

        return $isSuccess;
        
    }

}
