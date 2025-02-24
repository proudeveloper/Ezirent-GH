<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziAddressModel extends Model
{
    use HasFactory;
            
    protected $table = 'location_address_tbl';


    static public function getUserAddress($id)
    {

        $mySql =  self::select(
            'location_address_tbl.*',
        )
            ->where('location_address_tbl.user_id', '=', $id)
            ->first();

        return $mySql;

    }


}
