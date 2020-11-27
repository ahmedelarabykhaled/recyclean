<?php

namespace App;

use App\Models\OilClient;
use App\Models\TrashClient;
use App\Models\UserRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne(UserRole::class, 'user_id' , 'id');
    }

    public function oilClient()
    {
        return $this->hasOne(OilClient::class, 'user_id' , 'id');
    }

    public function trashClient()
    {
        return $this->hasOne(TrashClient::class, 'user_id', 'id');
    }
}
