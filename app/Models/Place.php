<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    protected $table = 'places';
    public $timestamps = true;
    protected $fillable = array('name', 'price', 'office_id');

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }



}
