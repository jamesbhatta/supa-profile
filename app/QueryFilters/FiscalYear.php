<?php

namespace App\QueryFilters;

class FiscalYear extends Filter
{
    public function applyFilter($builder)
    {
        if (request()->filled('fiscal_year')) {
            return $builder->where('fiscal_year', request($this->filterName()));
        }
        return $builder;
    }
}
