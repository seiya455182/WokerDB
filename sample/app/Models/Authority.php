<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    public function Authoriry()
    {
        return $this->belongsTo('App\User');
    }
}
