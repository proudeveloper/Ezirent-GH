<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziPropertyTypeModel;
use App\Models\Clients\EziPropertImageModel;
use App\Models\Clients\EziPropertyCategoryModel;
use App\Models\Clients\EziReviewModel;
use App\Models\Clients\EziTenantPropertyModel;
use App\Models\Clients\EziUserTypeModel;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class FrontClientController extends Controller
{
    //   
    public function getFrontPage(Request $request) {

        // $currentUser = Auth::user();
        $userIp = $request->ip;
        $position = Location::get('154.161.62.219');

        // dd($position->countryName);
        
        $data['position'] = $position;
        $data['getTesimonials'] = EziReviewModel::getAllTestimonials();

        return view('clients.home', $data);
    }


    public function getBrowseOverviewPage() {

        // $currentUser = Auth::user();
        $data['getPropertyType'] = EziPropertyCategoryModel::getAllPropertyCategory();
        $data['getPropertiesOverview'] = EziTenantPropertyModel::getAllPropertiesOverview(8);
        // $data['getProperties'] = EziTenantPropertyModel::getAllProperties();


        return view('clients.overview', $data);

    }


    public function getPropertyDetailPage($id) {

        // $currentUser = Auth::user();
        $data['getPropType'] = EziPropertyTypeModel::getAllPeopertyTypes();
        $data['getSingleProperty'] = EziTenantPropertyModel::getSingleProperty($id);
        $data['getPropertyImgs'] = EziPropertImageModel::getDetailProperties($id);
        
        $db_prop = EziTenantPropertyModel::getSingle($id);

        $db_prop->prop_views = $db_prop->prop_views + 1;
        $db_prop->update();

        // dd($data);
        return view('clients.prop_details', $data);
    }



    public function getLoginPage() {

        // $currentUser = Auth::user();
        $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        return view('login.login', $data);

    }



        public function getAdminLoginPage() {

        // $currentUser = Auth::user();
        $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        return view('login.admin_log', $data);

    }


    // public function getOTPPage() {

    //     // $currentUser = Auth::user();
    //     // $data['getProperties'] = EziTenantPropertyModel::getAllProperties();

    //     return view('login.otp_auth');

    // }


    public function postLoginOTPNumber(Request $request) {

        $opt_number = $request->phone_otp;

        $data['title'] = 'Login';
        $data['success'] = 'success';
        $data['otp_number'] = $request->phone_otp;

        return view('login.otp_auth', $data);

    }



}
