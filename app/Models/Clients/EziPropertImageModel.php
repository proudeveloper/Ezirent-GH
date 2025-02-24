<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziPropertImageModel extends Model
{
    use HasFactory;

    protected $table = 'prop_img_tbl';


    static public function getDetailProperties($id)
    {

        $mySql =  self::select(
            'prop_img_tbl.*',
            'property_tbl.id AS prod_id',
        )
            ->join('property_tbl', 'property_tbl.id', '=', 'prop_img_tbl.prop_id')
            ->where('prop_img_tbl.prop_id', '=', $id)
            ->get();

        return $mySql;

    }


    public function getPropImages()
    {

        if (!empty($this->img_name) && file_exists('public/uploads/properties/'.$this->prop_id.'/' . $this->img_name)) {

            return url('public/uploads/properties/'.$this->prop_id.'/' . $this->img_name);
        } else {
            return url('public/uploads/properties/property-0Cx79FTe.jpg');
        }
    }

    
    // public function deletePropImages()
    // {

    //     if (!empty($this->img_name) && file_exists('public/uploads/properties/'.$this->prop_id.'/' . $this->img_name)) {

    //         return url('public/uploads/properties/'.$this->prop_id.'/' . $this->img_name);
    //     } else {
    //         return url('public/uploads/properties/property-0Cx79FTe.jpg');
    //     }
    // }

}
