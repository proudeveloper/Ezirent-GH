<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziUserModel extends Model
{
    use HasFactory;

        
    protected $table = 'users';



    static public function getSingleUser($phone_id)
    {

        $mySql =  self::select(
            'users.*',
        )
            ->where('users.phone', '=', $phone_id)
            ->first();

        return $mySql;

    }



    static public function getSingleUserByEmail($email)
    {

        $mySql =  self::select(
            'users.*',
        )
            ->where('users.email', '=', $email)
            ->first();

        return $mySql;

    }


}
