<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CurrentMinistry extends Model
{
    protected $guarded = ['id'];

    public function photoUrl()
    {
        return Storage::url($this->profile);
    }
}
