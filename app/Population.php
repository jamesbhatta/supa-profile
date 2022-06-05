<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    protected $fillable=[
        'district_id','municipality_id','family_num','male_num','female_num'
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
