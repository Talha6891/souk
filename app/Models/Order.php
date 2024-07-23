<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_name',
        'user_id',
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
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

//    public function product()
//    {
//        return $this->belongsTo(Product::class);
//    }

}
