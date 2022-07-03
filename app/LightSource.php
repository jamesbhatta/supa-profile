<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LightSource extends Model
{
    protected $guarded=['id'];

    public function district()
    {
        return $this->hasOne(District::class,'id','district_id');
    }

    public function municipality()
    {
        return $this->hasOne(Municipality::class,'id','municipality_id');
    }
}
