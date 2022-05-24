<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Table extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'array'
    ];

    // public static function firstOrCreateForName(string $name): self
    // {
    //     return static::firstOrCreate(['name' => $name]);
    // }

    public function getData(string $name)
    {
        return Arr::get($this->data, $name);
    }
}
