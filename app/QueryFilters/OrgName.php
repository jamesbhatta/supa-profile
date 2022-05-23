<?php

namespace App\QueryFilters;

class OrgName extends Filter
{
    public function applyFilter($builder)
    {
        if (request()->filled('org_name')) {
            return $builder->where('org_name', 'like',  '%' . request($this->filterName()) . '%');
        }
        return $builder;
    }
}
