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
    protected $table = 'users';

    # role
    public function Role()
    {
        return $this->hasOne('App\Models\Role','id','role');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'user_id', 'id');
    }

    public function Clinics()
    {
        return $this->hasMany('App\Models\Clinic', 'user_id', 'id');
    }
}
