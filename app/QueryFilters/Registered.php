<?php

namespace App\QueryFilters;

class Registered extends Filter
{
    public function applyFilter($builder)
    {
         /**
         * Applies filter by date if current filter is true and has dates
         *
         * @return void
         */
        if ($this->filterBool(request('registered'))) {
            $from = request('date_from');
            $to = request('date_to');

            if ($from != null && $to != null) {
                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $from);
                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $to);
                $builder->whereBetween('registered_date', [$from, $to]);
            }
        }

        return $builder->registered($this->filterBool(request($this->filterName())));
    }
}
