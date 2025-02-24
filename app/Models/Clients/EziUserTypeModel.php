<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziUserTypeModel extends Model
{
    use HasFactory;

        
    protected $table = 'user_type_tbl';


    static public function getAllUserTypes()
    {

        $mySql =  self::select(
            'user_type_tbl.*',
        );

        $mySql = $mySql->orderBy('user_type_tbl.id', 'asc')
            ->get();

        return $mySql;

    }



    static public function getSinglelUserTypes()
    {

        $mySql =  self::select(
            'user_type_tbl.*',
            'users.f_name AS created_by_fname',
            'users.l_name AS created_by_lname',
            'users.user_type AS user_type',
            // 'rating_tbl.id AS state_name'
        )
            ->join('users', 'users.id', '=', 'user_type_tbl.user_id')
            // ->join('rating_tbl', 'rating_tbl.id', '=', 'user_type_tbl.id')
            ->where('user_type_tbl.status', '=', 1)
            ->where('users.status', '=', 1)
            ->where('users.is_deleted', '=', 0)
            ->where('user_type_tbl.review_type', '=', 2);


        $mySql = $mySql->orderBy('user_type_tbl.id', 'desc')
            ->get();

        return $mySql;

    }

}
