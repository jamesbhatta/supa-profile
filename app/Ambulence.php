<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulence extends Model
{
    protected $guarded=['id'];

    public function district()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
