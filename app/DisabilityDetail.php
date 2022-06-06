<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisabilityDetail extends Model
{
    protected $fillable=[
        'disability_id','district_id','male_num','female_num'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
    public function disibilities()
    {
        return $this->hasMany(Disability::class,'id','disability_id');
    }
}
