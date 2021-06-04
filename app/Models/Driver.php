<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model 
{

    protected $table = 'drivers';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'nationality', 'activate', 'office_id');

    public function tripe()
    {
        return $this->belongsTo('App\Models\Trip');
    }


    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

}