<?php

namespace App\QueryFilters;

class RegisteredDate extends Filter
{
    protected function applyFilter($builder)
    {
        $from = request('date_from');
        $to = request('date_to');

        if ($from != null && $to != null) {
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $from);
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $to);
            $builder->whereBetween($this->filterName(), [$from, $to]);
        }
        return $builder->registered($this->filterBool($this->filterName()));
    }
}
