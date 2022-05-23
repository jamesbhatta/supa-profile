<?php

namespace App\QueryFilters;

class PropPhone extends Filter
{
    public function applyFilter($builder)
    {
        if (request()->filled('prop_phone')) {
            return $builder->where('prop_phone', 'like', request($this->filterName()) . '%');
        }
        return $builder;
    }
}
