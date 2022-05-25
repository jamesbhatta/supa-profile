<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Table extends Model
{
    use \Sushi\Sushi;

    protected $guarded = ['id'];

    // protected $casts = [
    //     'data' => 'array'
    // ];

    protected $primary_key = null;
    public $incrementing = false;

    protected $rows = [
        [
            'abbr' => 'NY',
            'name' => 'New York',
        ],
        [
            'abbr' => 'CA',
            'name' => 'California',
        ],
    ];

    // protected $rows = [
    //     [
    //         'key' => 'regional_area',
    // 'fields' => [
    //     'region' => [
    //         'type' => 'text',
    //         'label' => 'Region',
    //         'rules' => 'required|email',
    //     ],
    //     'area' => 'float',
    //     'area_percent' => 'float'
    // ]
    // ]
    // ];

    // public static function firstOrCreateForName(string $name): self
    // {
    //     return static::firstOrCreate(['name' => $name]);
    // }

    // public function getData(string $name)
    // {
    //     return Arr::get($this->data, $name);
    // }
}
