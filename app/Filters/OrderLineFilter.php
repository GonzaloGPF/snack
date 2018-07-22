<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrderLineFilter extends Filter
{
    /**
     * @var array. Applicable filters by request's query strings. Every filter will be use by Filter class.
     * Filter class will look for a method with the same name of the filter.
     */
    protected $filters = ['user_id', 'order_id', 'paid', 'total'];

    /**
     * @param $userId
     * @return Builder
     */
    protected function userId($userId)
    {
        return $this->builder->where('user_id', $userId);
    }

    /**
     * @param $orderId
     * @return Builder
     */
    protected function orderId($orderId)
    {
        return $this->builder->where('order_id', $orderId);
    }

    /**
     * @param $paid
     * @return Builder
     */
    protected function paid($paid)
    {
        return $this->builder->where('paid', $paid);
    }

    /**
     * @param $total
     * @return Builder
     */
    protected function total($total)
    {
        return $this->builder->where('total', $total);
    }
}