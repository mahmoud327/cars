<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name', 'price');

    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

    public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }

}
