<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends Filter
{
    /**
     * @var array. Applicable filters by request's query strings. Every filter will be use by Filter class.
     * Filter class will look for a method with the same name of the filter.
     */
    protected $filters = ['order_date'];

    /**
     * @param $orderDate
     * @return Builder
     */
    protected function orderDate($orderDate)
    {
        return $this->builder->where('order_date', $orderDate);
    }
}