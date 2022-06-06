<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    protected $fillable=[
        'disability','disability_en'
    ];
    public function disibility()
    {
        return $this->belongsTo(DisabilityDetail::class,'id','disibility_id');
    }
}
