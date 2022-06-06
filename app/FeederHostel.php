<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeederHostel extends Model
{
    protected $fillable=[
        'district_id','municipality_id','school_name','quota','student_number'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
    public function municipalities()
    {
        return $this->hasOne(Municipality::class,'id','municipality_id');
    }
}
