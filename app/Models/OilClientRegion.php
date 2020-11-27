<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OilClientRegion extends Model
{
    protected $table = 'oil_client_regions';
    public function region()
    {
        return $this->hasOne(Region::class, 'id' , 'region_id');
    }
}
