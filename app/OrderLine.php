<?php

namespace App;

use App\Traits\FilterAndOrder;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use FilterAndOrder;

    protected $fillable = ['user_id', 'order_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @return OrderLine
     */
    public function refreshTotal()
    {
        $this->total = $this->products()->sum('price');
        $this->save();

        return $this;
    }
}
