<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'team_id',
        'role',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function team(): MorphMany
    {
        return $this->morphMany(Team::class, 'teamable');
    }
}
