<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'whatsapp_no',
        'city',
        'address',
        'bank_name',
        'branch_code',
        'store_name',
        'account_title',
        'iban_number',
        'verified',
        'country_id',
        'user_id',
        'client_type'
    ];

    public function scopeWithoutAuthUser($query): mixed
    {
        return $query->where('id', '!=', auth()->id());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
