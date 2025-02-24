<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EziNotificationModelr extends Model
{
    use HasFactory;
    
    protected $table = 'notifications_tbl';
    
    static public function getAllNotifications()
    {

        $mySql =  self::select(
            'notifications_tbl.*', 
            'users.f_name AS f_name',
            'users.l_name AS l_name',
            'users.phone AS phone',
            'users.user_type AS user_type',
            'users.id AS user_id',
            'users.user_img AS user_img',
        )
            ->join('users', 'users.id', '=', 'notifications_tbl.user_id')
            ->orderBy('notifications_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }



    static public function getAllNotificationsCheckOpened($val)
    {

        $mySql =  self::select(
            'notifications_tbl.*', 
            'users.f_name AS f_name',
            'users.l_name AS l_name',
            'users.phone AS phone',
            'users.user_type AS user_type',
            'users.id AS user_id',
            'users.user_img AS user_img',
        )
            ->join('users', 'users.id', '=', 'notifications_tbl.user_id')
            ->where('notifications_tbl.opened', $val)
            ->orderBy('notifications_tbl.created_at', 'desc')
            ->get();

        return $mySql;

    }

        
    static public function getSingle($id) {

        return self::find($id);

    }



    public function getUserImage()
    {
        $mySql = User::getSingle($this->user_id);
       

        if (!empty($mySql->user_img) && file_exists('public/uploads/users/' . $mySql->user_img)) {

            return url('public/uploads/users/' . $mySql->user_img);
        } else {
            return url('public/uploads/users/user.jpg');
        }
    }

}
