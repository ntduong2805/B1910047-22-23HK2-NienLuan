<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'room_number',
        'description',
        'available',
        'status',
        'room_type_id',
    ];
    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }
    public function room_bookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
    public function reviews()
    {
        return $this->hasManyThrough(Review::class, RoomBooking::class);
    }
}
