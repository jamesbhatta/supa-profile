<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovermentStudent extends Model
{
    protected $fillable=[
        'district_id','class','boys_num','girl_num'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
