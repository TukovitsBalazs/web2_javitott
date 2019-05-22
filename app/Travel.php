<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
