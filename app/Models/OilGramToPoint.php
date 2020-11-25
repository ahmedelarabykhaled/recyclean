<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OilGramToPoint extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
}
