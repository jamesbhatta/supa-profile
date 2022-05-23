<?php

namespace App\QueryFilters;

class WardId extends Filter
{
    public function applyFilter($builder)
    {
        if (request()->filled('ward_id')) {
            return $builder->where('org_ward_id', request($this->filterName()));
        }
        return $builder;
    }
}
