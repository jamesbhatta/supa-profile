<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    protected $guarded = [];

    protected $dates = [
        'start_ad',
        'end_ad',
    ];
    
    /**
     * Filter the current running fiscal year
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeRunning($query)
    {
        $query->where('is_running', true);
    }
}
