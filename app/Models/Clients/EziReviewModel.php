<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziReviewModel extends Model
{
    use HasFactory;
    
    protected $table = 'review_tbl';


    static public function getAllTestimonials()
    {

        // $mySql =  self::select(
        //     'review_tbl.*',
        //     'users.f_name AS created_by_fname',
        //     'users.l_name AS created_by_lname',
        //     'countries_tbl.name AS country_name',
        //     'states_tbl.name AS state_name'
        // )
        //     ->join('users', 'users.id', '=', 'review_tbl.user_id')
        //     ->join('countries_tbl', 'countries_tbl.id', '=', 'review_tbl.nationality_id')
        //     ->join('states_tbl', 'states_tbl.id', '=', 'review_tbl.state_county_id')
        //     ->where('review_tbl.status', '=', 1);


        // $mySql = $mySql->orderBy('review_tbl.id', 'desc')
        //     ->get();

        // return $mySql;

        $mySql =  self::select(
            'review_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.user_type AS user_type',
            // 'rating_tbl.id AS state_name'
        )
            ->join('users', 'users.id', '=', 'review_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.id', '=', 'review_tbl.id')
            ->where('review_tbl.status', '=', 1)
            ->where('users.status', '=', 1)
            ->where('users.is_deleted', '=', 0)
            ->where('review_tbl.review_type', '=', 2);


        $mySql = $mySql->orderBy('review_tbl.id', 'desc')
            ->get();

        return $mySql;

    }



    
    public function getPropertyImage()
    {

        if (!empty($this->mem_img_name) && file_exists('public/uploads/mem_img/' . $this->mem_img_name)) {

            return url('public/uploads/mem_img/' . $this->mem_img_name);
        } else {
            return url('public/uploads/mem_img/user.jpg');
        }
    }


}
