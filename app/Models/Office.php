<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{

    protected $table = 'offices';
    public $timestamps = true;
    protected $fillable = array('email', 'name', 'phone', 'address');

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function trips()
    {
        return $this->hasMany('App\Models\Trip');
    }

    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }

    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }

}
