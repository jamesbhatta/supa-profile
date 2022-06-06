<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=[
        'district_id','school_type','school_level','school_number'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
