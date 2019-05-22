<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merged extends Model
{
    public function travels()
    {
        return $this->hasMany(Travel::class);
    }

    public function passenger()
    {
        return $this->hasMany(User::class);
    }
}
