<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_name',
        'user_id',
        'status',
        'custom_order_id',
        'customer_name',
        'email',
        'contact_no',
        'city',
        'shipping_address',
        'country_id',
        'quantity',
        'total_price',
        'product_id',
        'warehouse_id'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function warehouse() : BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

}
