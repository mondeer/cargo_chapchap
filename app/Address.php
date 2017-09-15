<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'name', 'detail', 'city', 'phone'];

    public function user()
    {
        return $this->belongsTo('Cartalyst\Sentinel\Users\EloquentUser');
    }

}
