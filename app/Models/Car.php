<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $table = 'cars';
    public $timestamps = true;
    protected $fillable = array('types', 'model', 'color', 'plate', 'count_number','type_id','office_id');



    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

}
