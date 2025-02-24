<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziTenantPropertyModel extends Model
{
    use HasFactory;


    
    protected $table = 'property_tbl';


    static public function getAllTotalProperties()
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.phone AS user_phone',
            'users.user_type AS user_type',
            'property_cat_tbl.code_name AS code_name',
            'property_cat_tbl.name AS prop_cat'
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->join('property_cat_tbl', 'property_cat_tbl.id', '=', 'property_tbl.prop_category_id');


        $mySql = $mySql->orderBy('property_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }


    
    static public function getAllTenantStats($field_name, $field_status)
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.phone AS user_phone',
            'users.user_type AS user_type',
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            ->where('property_tbl.'.$field_name, '=', $field_status)
            ->orderBy('property_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }




    static public function getAllProperties()
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.phone AS user_phone',
            'users.user_type AS user_type',
            'property_cat_tbl.code_name AS code_name',
            'property_cat_tbl.name AS prop_cat'
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->join('property_cat_tbl', 'property_cat_tbl.id', '=', 'property_tbl.prop_category_id')
            ->where('property_tbl.status', '=', 2)
            ->where('property_tbl.published', '=', 1)
            ->where('users.status', '=', 1);


        $mySql = $mySql->orderBy('property_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }



    static public function getAllPropertiesOverview($perPage)
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.user_type AS user_type',
            'property_cat_tbl.code_name AS code_name',
            'property_cat_tbl.name AS prop_cat'
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->join('property_cat_tbl', 'property_cat_tbl.id', '=', 'property_tbl.prop_category_id')
            ->where('property_tbl.status', '=', 2)
            ->where('property_tbl.published', '=', 1)
            ->where('users.status', '=', 1);


        $mySql = $mySql->orderBy('property_tbl.created_at', 'desc')
            ->paginate($perPage);

        return $mySql;

    }


    
    static public function getAllPropertiesByUserAll(int $user_id, ?int $perPage)
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.user_type AS user_type',
            'property_cat_tbl.code_name AS code_name',
            'property_cat_tbl.name AS prop_cat'
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->join('property_cat_tbl', 'property_cat_tbl.id', '=', 'property_tbl.prop_category_id')
            ->where('property_tbl.user_id', '=', $user_id)
            ->where('users.status', '=', 1)
            ->orderBy('property_tbl.created_at', 'desc');


        if (isset($perPage)) {
             
            $mySql = $mySql->paginate($perPage);

        } else {
             
            $mySql = $mySql->get();

        }
       
        return $mySql;

    }






    
    static public function getAllPropertiesOfUser($user_id)
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.user_type AS user_type',
            'property_cat_tbl.code_name AS code_name',
            'property_cat_tbl.name AS prop_cat',
            // 'rating_tbl.*'
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->join('property_cat_tbl', 'property_cat_tbl.id', '=', 'property_tbl.prop_category_id')
            ->where('property_tbl.status', '=', 2)
            ->where('property_tbl.published', '=', 1)
            ->where('property_tbl.user_id', '=', $user_id)
            ->where('users.status', '=', 1);


        $mySql = $mySql->orderBy('property_tbl.created_at', 'desc')
            ->paginate(4);

        return $mySql;

    }


        
    static public function getAllPropertStats(int $user_id, ?int $pub_val, ?int $status_val)
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.user_type AS user_type',
            'property_cat_tbl.code_name AS code_name',
            'property_cat_tbl.name AS prop_cat',
            // 'rating_tbl.*'
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->join('property_cat_tbl', 'property_cat_tbl.id', '=', 'property_tbl.prop_category_id')
            ->where('property_tbl.user_id', '=', $user_id)
            ->where('users.status', '=', 1);

        if (isset($status_val)) {
            $mySql = $mySql->where('property_tbl.status', $status_val);
        }
        
        if (isset($pub_val)) {
            $mySql = $mySql->where('property_tbl.published', $pub_val);
        }
        
        $mySql = $mySql->orderBy('property_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }



    static public function getSingleProperty($id)
    {

        $mySql =  self::select(
            'property_tbl.*',
            'users.f_name AS f_name',
            'users.l_name AS l_name',
            'users.phone AS phone',
            'users.user_type AS user_type',
            'property_tbl.id AS props_id',
        )
            ->join('users', 'users.id', '=', 'property_tbl.user_id')
            ->where('property_tbl.id', '=', $id)
            ->first();

        return $mySql;

    }

    
    static public function getSingle($id) {

        return self::find($id);

    }



    static public function getSinglePropertyByNameID($name, $user_id, $rent_amount)
    {

        $mySql =  self::select(
            'property_tbl.*',
        )
            ->where('property_tbl.name', '=', $name)
            ->where('property_tbl.user_id', '=', $user_id)
            ->where('property_tbl.rent_amount', '=', $rent_amount)
            ->orderBy('property_tbl.created_at', 'desc')
            ->first();

        return $mySql;

    }
    
    
    

    public function getPropertyRatings($id) {

        $mySql =  self::select(
            'property_tbl.*',
            'rating_tbl.*'
        )
            ->join('rating_tbl', 'rating_tbl.prop_id', '=', 'property_tbl.id')
            ->where('property_tbl.id', '=', $id)
            ->first();

        return $mySql;


    }




















    
    public function getSubCategory() {

        $getCategory = $this->belongsTo(EziRatingModel::class, "sub_category");

        return $getCategory;

    }

    public function getColor() {

        $getColor = $this->hasMany(EziRatingModel::class, "prop_id")
        ->JOIN('color_tbl', 'color_tbl.id', '=', 'product_color_tbl.color_id' );
        
        return $getColor;

    }

    
    public function getProductCounts($prop_id) {

        $getImageName = $this->hasMany(EziRatingModel::class, "prop_id")->orderBy('order_by', 'asc')->first();

        // $getImageName = EziRatingModel::where("prop_id", '=', $prop_id)->orderBy('order_by', 'asc')->first();

        return $getImageName;

    }


    public function getCategory() {

        // $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc')->first();

        $getCategory = $this->belongsTo(EziRatingModel::class, "id");

        return $getCategory;

    }





    

    public function getPropertyImage()
    {

        if (!empty($this->prop_img) && file_exists('public/uploads/properties/'.$this->id.'/' . $this->prop_img)) {

            return url('public/uploads/properties/'.$this->id.'/' . $this->prop_img);
        } else {
            return url('public/uploads/properties/property-0Cx79FTe.jpg');
        }
    }


    public function getUserImage()
    {

        if (!empty($this->user_img) && file_exists('public/uploads/users/'. $this->user_img)) {

            return url('public/uploads/users/'. $this->user_img);
        } else {
            return url('public/uploads/users/user_img.jpg');
        }
    }
    
}
