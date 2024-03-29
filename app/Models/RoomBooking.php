<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;
    protected $table = 'room_bookings';
    protected $fillable = [
        'arrival_date',
        'departure_date',
        'room_cost',
        'status',
        'payment',
        'room_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
