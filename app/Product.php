<?php

namespace App;

use App\Traits\FilterAndOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use FilterAndOrder, SoftDeletes;

    protected $fillable = ['name', 'description', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orderLines()
    {
        return $this->belongsToMany(OrderLine::class);
    }
}
