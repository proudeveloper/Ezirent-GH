<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    
    static public function getAllUserWhereType($rent_status)
    {

        $mySql =  self::select(
            'users.*',
        )
            ->where('users.user_type', '=', $rent_status)
            ->orderBy('users.created_at', 'desc')
            ->get();

        return $mySql;

    }



    static public function getSingle($id) {

        return User::find($id);

    }



    public function getUserImage()
    {

        if (!empty($this->user_img) && file_exists('public/uploads/users/' . $this->user_img)) {

            return url('public/uploads/users/' . $this->user_img);
        } else {
            return url('public/uploads/users/user.jpg');
        }
    }

}
