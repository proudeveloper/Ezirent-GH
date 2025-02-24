<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziPaymentAmountModel extends Model
{
    use HasFactory;

    
    protected $table = 'payable_amount_tbl';

    static public function getSinglePaymentAmount($the_purpose)
    {

        $mySql =  self::select(
            'payable_amount_tbl.*',
        )
            ->where('payable_amount_tbl.the_purpose', $the_purpose)
            ->first();

        return $mySql;

    }

}
