<?php

namespace App\QueryFilters;

class OrgType extends Filter
{
    public function applyFilter($builder)
    {
        if (request()->filled('org_type')) {
            return $builder->where('org_type', request($this->filterName()));
        }
        return $builder;
    }
}
