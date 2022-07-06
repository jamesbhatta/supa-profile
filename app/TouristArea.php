<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TouristArea extends Model
{
    protected $guarded=['id'];

    public function imageUrl()
    {
        return Storage::url($this->image);
    }
}
