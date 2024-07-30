<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable  = ['name','code','num_code'];

    public function clients() : HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function warehouses() : HasMany
    {
        return $this->hasMany(Warehouse::class);
    }

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }
}
