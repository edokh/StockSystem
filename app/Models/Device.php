<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'title',
        'device_type_id',
        'room_id',
        'status',
        'properties_about',
    ];

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class)->orderBy('id','desc');
    }
}
