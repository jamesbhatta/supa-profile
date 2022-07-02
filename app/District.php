<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function sampleSchools()
    {
        return $this->belongsToMany(SampleSchool::class);
    }
}
