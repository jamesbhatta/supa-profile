<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPopulation extends Model
{
    protected $fillable=[
        'district','municipality_name','house_number','male_number','female_number','avg_house_number','anupat','fml_edu_percentage','ml_edu_percentage'
    ];

    // public function districts()
    // {
    //     return $this->hasMany(District::class,'id','district_id');
    // }
}
