<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'review',
        'rating',
        'approval_status',
        'room_booking_id',
    ];
    public function room_booking()
    {
        return $this->belongsTo(RoomBooking::class);
    }
}
