<?php

namespace App\Models\Admin;

use App\Models\Clients\EziTenantPropertyModel;
use App\Models\Tenant\EziPersonalDetailsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziAdminBookingModel extends Model
{
    use HasFactory;

    protected $table = 'booked_review_tbl';

    static public function getAllBookingViews()
    {

        $mySql =  self::select(
            'booked_review_tbl.*',
            'users.f_name AS f_name',
            'users.l_name AS l_name',
            'users.phone AS phone',
            'users.user_type AS user_type',
            'users.phone AS phone',
            'users.id AS user_id',
            'property_tbl.name AS prop_name',
            'property_tbl.id AS prop_id',
            'property_tbl.available AS available',
            'property_tbl.prop_location AS prop_location',
        )
        ->join('users', 'users.id', '=', 'booked_review_tbl.user_id')
        ->join('property_tbl', 'property_tbl.id', '=', 'booked_review_tbl.property_id')
        ->orderBy('booked_review_tbl.created_at', 'desc')
        ->get();

        return $mySql;

    }


    static public function getAllViewingStats($status)
    {

        $mySql =  self::select(
            'booked_review_tbl.*',
        )
        ->where('booked_review_tbl.viewd', '=', $status)
        ->get();

        return $mySql;

    }


    
        
    static public function getSingle($id) {

        return self::find($id);

    }


    
        
    public function getSelfieImages()
    {
        $mySql = EziPersonalDetailsModel::getSingle($this->property_id);
       

        if (!empty($mySql->selfie) && file_exists('public/tenants/selfie/'. $mySql->selfie)) {

            return url('public/tenants/selfie/'. $mySql->selfie);
        } else {
            return $mySql->name;
        }
    }
   

}
