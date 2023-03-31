<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'teamable_type', 'teamable_id', 'team_type'];

    public function teamable(): MorphTo
    {
        return $this->morphTo();
    }
    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}
