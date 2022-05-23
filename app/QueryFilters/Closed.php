<?php

namespace App\QueryFilters;

class Closed extends Filter
{
    public function applyFilter($builder)
    {
         /**
         * Applies filter by date if current filter is true and has dates
         *
         * @return void
         */
        if ($this->filterBool(request('closed'))) {
            $from = request('date_from');
            $to = request('date_to');

            if ($from != null && $to != null) {
                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
                $builder->whereBetween('closed_date', [$from, $to]);
            }
        }

        return $builder->closed($this->filterBool(request($this->filterName())));
    }
}
