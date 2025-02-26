<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'application_id', 'f_name', 'l_name', 'whatsapp_no', 
        'gender', 'level_edu', 'dob', 'marital_status', 'current_location', 
        'how_heard', 'emer_f_name', 'emer_l_name', 'emer_relationship', 
        'emer_relationship_other', 'emer_phone', 'emer_current_location', 
        'employ_status', 'net_income', 'outstanding_dept', 'current_accomodate', 
        'area_interest', 'monthly_budget', 'move_in_date', 'type_of_property', 
        'request_month', 'months_payback', 'landlord_name', 'landlord_contact', 
        'gh_card_img', 'rent_unit_detail', 'employer_name', 'employer_address', 
        'proof_of_doc', 'id_card', 'rent_status', 'selfie', 'payed_app'
    ];

    protected $casts = [
        'dob' => 'date',
        'move_in_date' => 'date',
        'rent_status' => 'integer',
        'payed_app' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
