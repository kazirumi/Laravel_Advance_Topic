<?php

namespace App\QueryFilters;

use Closure;

class Even extends Filter
{

    protected function applyFilter($builder)
    {
       return $builder->whereRaw('MOD(id, 2) = '.request($this->filterClassName()));
    }
}
