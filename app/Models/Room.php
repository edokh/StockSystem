<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'location', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
