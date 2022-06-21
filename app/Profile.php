<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['interest'];

    // public function setInterestAttribute($value)
    // {
    //     $this->attributes['interest'] = json_encode($value);
    //     // $this->attributes['interest'] = array($value);
    // }

    // public function getInterestAttribute($value)
    // {
    //     return $this->attributes['interest'] = json_decode($value, true);
    //     // return $this->attributes['interest'] = array($value);
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function colleges()
    {
        return $this->belongsToMany('App\College');
    }

    public function applications()
    {
        return $this->belongsToMany('App\Application')
                    ->withPivot('priority','unique_id');
    }
}
