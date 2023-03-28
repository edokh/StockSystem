<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function teamable()
    {
        return $this->morphTo();
    }
    public function members()
    {
        return $this->belongsToMany(Staff::class, 'team_members')->withPivot('role')->withTimestamps();
    }
}
