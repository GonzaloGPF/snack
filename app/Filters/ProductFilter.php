<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends Filter
{
    /**
     * @var array. Applicable filters by request's query strings. Every filter will be use by Filter class.
     * Filter class will look for a method with the same name of the filter.
     */
    protected $filters = ['name', 'description', 'price'];

    /**
     * @param $name
     * @return Builder
     */
    protected function name($name)
    {
        return $this->builder->where('name', 'like', "%$name%");
    }

    /**
     * @param $description
     * @return Builder
     */
    protected function description($description)
    {
        return $this->builder->where('description', 'like', "%$description%");
    }

    /**
     * @param $price
     * @return Builder
     */
    protected function price($price)
    {
        return $this->builder->where('price', $price);
    }
}