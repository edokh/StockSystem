<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'department_id',
        'faculty_id'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
