<?php

namespace App\QueryFilters;

class TokenNumber extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
