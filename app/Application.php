<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function profiles()
    {
        return $this->belongsToMany('App\Profile')
                    ->withPivot('priority','unique_id');
    }
}
