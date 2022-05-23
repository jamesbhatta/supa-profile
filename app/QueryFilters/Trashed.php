<?php

namespace App\QueryFilters;

class Trashed extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->onlyTrashed();
    }
}
