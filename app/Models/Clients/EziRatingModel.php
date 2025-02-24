<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziRatingModel extends Model
{
    use HasFactory;

    protected $table = 'rating_tbl';


    static public function getPropertyRatings($prop_id) {

        $mySql =  self::select(
            'rating_tbl.rating_value AS rating_value',
            'property_tbl.*'
        )
            ->join('property_tbl', 'property_tbl.id', '=', 'rating_tbl.prop_id')
            ->where('rating_tbl.prop_id', '=', $prop_id)
            ->get();

        return $mySql;


    }


}
