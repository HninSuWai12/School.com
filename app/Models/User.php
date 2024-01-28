<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getEmailSingle($email){
        return User::where('email' , '=' , $email)->first();
    }
    static public function getTokenSingle($remember_token){
        return User::where('remember_token' , '=' , $remember_token)->first();
    }

    public static function getType(){
        return[
            'admin'=> 'admin',
            'parent'=> 'parent',
            'student'=> 'student',
            'school' => 'school',
        ];
    }

    public static function getStatus(){
        return[
            'active'=> 'Active',
            'inactive'=>'Inactive',
        ];
    }
    public static function getSubjectType(){
        return[
            'theory'=> 'Theory',
            'pratical'=>'Pratical',
        ];
    }

}
