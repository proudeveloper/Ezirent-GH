<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziPropertyCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'property_cat_tbl';


    static public function getAllPropertyCategory()
    {

        $mySql =  self::select(
            'property_cat_tbl.*',
        );

        $mySql = $mySql->orderBy('property_cat_tbl.id', 'desc')
            ->where('property_cat_tbl.status', '=', 1)
            ->get();

        return $mySql;

    }


}
