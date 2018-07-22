<?php

namespace App;

use App\Traits\FilterAndOrder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use FilterAndOrder;

    protected $fillable = ['order_date', 'open'];

    protected $dates = ['order_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }
}
