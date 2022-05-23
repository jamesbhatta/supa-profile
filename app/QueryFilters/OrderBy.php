<?php

namespace App\QueryFilters;

class OrderBy extends Filter
{
    protected function applyFilter($builder)
    {
        if (request('order_by')) {
            return $builder->orderBy(request('order_by'), request('order', 'DESC'));
        }

        return $builder->latest();
    }
}
