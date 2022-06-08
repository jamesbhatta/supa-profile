<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoCard extends Model
{
    protected $guarded = ['id'];

    public function scopePositioned($query)
    {
        return $query->orderByRaw('ISNULL(position), position ASC');
    }
}
