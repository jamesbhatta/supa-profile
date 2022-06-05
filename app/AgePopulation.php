<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgePopulation extends Model
{
    protected $fillable=[
        'district_id','male_num','female_num','age_group'
    ];

    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
