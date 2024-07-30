<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'religion',
        'blood_group',
        'dob',
        'joining_date',
        'address',
        'department_id',
        'designation_id',
        'user_id'
    ];

    protected $casts = [
        'dob' => 'datetime',
        'joining_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
