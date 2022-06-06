<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $fillable=[
        'district_id','bank_type','bank_number'
    ];
    public function districts()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
