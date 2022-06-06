<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalBank extends Model
{
    protected $fillable=[
        'district_id','municipalities_id','banks_id','bank_number'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
    public function municipality()
    {
        return $this->hasOne(Municipality::class,'id','municipalities_id');
    }
    public function banks()
    {
        return $this->hasOne(Bank::class,'id','banks_id');
    }

}
