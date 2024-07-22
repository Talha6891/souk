<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','contact_no','city','address','user_id','country_id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
