<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    protected $table = 'trips';
    public $timestamps = true;
    protected $fillable = array('name', 'Longitude_from', 'Longitude_to', 'latitude_from', 'latitude_to', 'user_id', 'office_id');

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

}
