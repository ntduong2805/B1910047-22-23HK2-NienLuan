<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table = 'facilities';
    protected $fillable = [
        'name',
        'icon',
        'description',
        'status',
    ];
    public function room_types()
    {
        return $this->belongsToMany(RoomType::class, 'facility_room_type')->withTimestamps();
    }
}
