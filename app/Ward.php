<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $guarded = [];

    public function organizations()
    {
        return $this->hasMany('App\Organization', 'org_ward_id');
    }
    
    /**
     * Get the users of this ward
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
