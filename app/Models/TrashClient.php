<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TrashClient extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id' , 'user_id');
    }

    public function region()
    {
        return $this->hasOne(Region::class, 'id' , 'region_id');
    }


}
