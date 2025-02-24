<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziPropertyTypeModel extends Model
{
    use HasFactory;
        
    protected $table = 'property_cat_tbl';

    static public function getAllPeopertyTypes()
    {

        $mySql =  self::select(
            'property_cat_tbl.*',
        )
            ->get();

        return $mySql;

    }


        
    static public function getSingle($id) {

        return self::find($id);

    }

    
        
    static public function checkIfExist($name) {

 
        $mySql =  self::select(
            'property_cat_tbl.*',
        )
            ->where('property_cat_tbl.name', $name)
            // ->where('property_cat_tbl.code_name', '=', $code_name)
            ->doesntExist();

        return $mySql;

    }


}
