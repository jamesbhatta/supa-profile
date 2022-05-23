<?php

namespace App\QueryFilters;

class RegistrationNumber extends Filter
{
    public function applyFilter($builder)
    {
        if (request()->filled('registration_number')) {
            return $builder->where('org_reg_no', request($this->filterName()));
        }
        return $builder;
    }
}
