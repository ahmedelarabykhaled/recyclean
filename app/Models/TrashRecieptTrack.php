<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TrashRecieptTrack extends Model
{
    public function employee()
    {
        return $this->hasOne(User::class, 'id' , 'employee_id');
    }
}
