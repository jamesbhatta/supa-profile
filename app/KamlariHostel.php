<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KamlariHostel extends Model
{
    protected $fillable=[
        'district_id','municipality_id','ward_id','school_name','student_num'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
    public function municipalities()
    {
        return $this->hasOne(Municipality::class,'id','municipality_id');
    }
    public function wards()
    {
        return $this->hasOne(Ward::class,'id','ward_id');
    }
}
