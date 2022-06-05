<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MunicipalityArea extends Model
{
    protected $fillable=[
        'municipalitiy_id','muncipality_area','ward_count','district_name'
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function municipalitie_area()
    {
        return $this->belongsTo(District::class);
    }
    
    public function municipalities()
    {
        return $this->hasOne(Municipality::class,'id','municipalitiy_id');
    }
}
