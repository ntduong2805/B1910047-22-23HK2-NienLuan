<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'name',
        'caption',
        'is_primary',
        'room_type_id',
    ];
    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }
}
