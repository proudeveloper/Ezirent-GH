<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziPersonalDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'personal_info_tbl';

    static public function getAllApplications()
    {

        $mySql =  self::select(
            'personal_info_tbl.*', 
            'users.f_name AS f_name',
            'users.l_name AS l_name',
            'users.phone AS phone',
            'users.user_type AS user_type',
            'users.id AS user_id',
        )
            ->join('users', 'users.id', '=', 'personal_info_tbl.user_id')
            ->orderBy('personal_info_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }


    static public function getUsetPersonalDetails($id)
    {

        $mySql =  self::select(
            'personal_info_tbl.*',
        )
            ->orderBy('personal_info_tbl.created_at', 'desc')
            ->where('personal_info_tbl.user_id', '=', $id)
            ->first();

        return $mySql;

    }

    
    
    static public function getSingle($id) {

        return self::find($id);

    }



    static public function get_last_application_id()
    {

        $wordlist = self::select('personal_info_tbl.*')
            ->orderBy('personal_info_tbl.id', 'desc')
            ->limit(1)
            ->first();

        return $wordlist;
    }


    

    static public function get_last_apply_user_id($id)
    {

        $wordlist = self::select('personal_info_tbl.*')
            ->orderBy('personal_info_tbl.id', 'desc')
            ->where('personal_info_tbl.user_id', '=', $id)
            ->limit(1)
            ->first();

        return $wordlist;
    }


    static public function getAllApplicationsStats($rent_status)
    {

        $mySql =  self::select(
            'personal_info_tbl.*',
        )
            ->where('personal_info_tbl.rent_status', '=', $rent_status)
            ->orderBy('personal_info_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }



    
    static public function getAllApplicationDetails($id)
    {

        $mySql =  self::select(
            'personal_info_tbl.*',
            'users.f_name AS f_name',
            'users.l_name AS l_name',
            'users.phone AS phone',
            'users.user_type AS user_type',
            'users.id AS user_id',
        )
            ->join('users', 'users.id', '=', 'personal_info_tbl.user_id')
            
            ->orderBy('personal_info_tbl.created_at', 'desc')
            ->where('personal_info_tbl.user_id', '=', $id)
            ->get();

        return $mySql;

    }



    
    public function getGHcardImage()
    {

        if (!empty($this->gh_card_img) && file_exists('public/tenants/lordGHCard/'. $this->gh_card_img)) {

            
            $theFile = pathinfo(public_path('tenants/lordGHCard/'. $this->gh_card_img));
            $fileExt = $theFile['extension'];

            if ($fileExt == 'pdf') {
                return url('public/tenants/images/pdf_upload.png');
            } else {
                  
                return url('public/tenants/lordGHCard/'. $this->gh_card_img);
            }
            
        } else {
            // return url('public/tenants/lordGHCard/gh_card_img.jpg');
        }
    }
    

    
    public function getProofDocImage()
    {

        if (!empty($this->proof_of_doc) && file_exists('public/tenants/proofDoc/'. $this->proof_of_doc)) {

            
            $theFile = pathinfo(public_path('tenants/proofDoc/'. $this->proof_of_doc));
            $fileExt = $theFile['extension'];

            if ($fileExt == 'pdf') {
                
                $img_file = url('public/tenants/images/pdf_upload.png');
                $pdf_file = url('public/tenants/proofDoc/'. $this->proof_of_doc);
                
                $notification = array(
                    'img_file' => $img_file,
                    'pdf_file' => $pdf_file,
                );
                

                return $notification;
            } else {

                $img_file = url('public/tenants/images/pdf_upload.png');
                $pdf_file = url('public/tenants/proofDoc/'. $this->proof_of_doc);
                
                $notification = array(
                    'img_file' => $img_file,
                    'pdf_file' => $pdf_file,
                );
                

                return $notification;

                // return url('public/tenants/proofDoc/'. $this->proof_of_doc);
            }
            


        } else {
            return '';
        }
    }
    

    
    public function getIDCardImage()
    {

        if (!empty($this->id_card) && file_exists('public/tenants/IDCards/'. $this->id_card)) {

            $theFile = pathinfo(public_path('tenants/IDCards/'. $this->id_card));
            $fileExt = $theFile['extension'];

            if ($fileExt == 'pdf') {
                return url('public/tenants/images/pdf_upload.png');
            } else {
                
                return url('public/tenants/IDCards/'. $this->id_card);
            }
            
        } else {
            return '';
        }
    }
    
        
    public function getSelfieImage()
    {

        if (!empty($this->selfie) && file_exists('public/tenants/selfie/'. $this->selfie)) {

            return url('public/tenants/selfie/'. $this->selfie);
        } else {
            return '';
        }
    }
   

}
