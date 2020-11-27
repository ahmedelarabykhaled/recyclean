<?php

namespace App\Models;

use App\Models\OilClientRegion;
use App\User;
use Illuminate\Database\Eloquent\Model;

class OilClient extends Model
{
    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function region()
    {
        return $this->hasOne(OilClientRegion::class , 'region_id' , 'id');
    }
}
