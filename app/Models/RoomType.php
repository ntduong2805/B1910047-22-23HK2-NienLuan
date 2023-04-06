<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'room_types';
    protected $fillable = [
        'name',
        'cost_per_day',
        'size',
        'max_adult',
        'max_child',
        'description',
        'room_service',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'facility_room_type')->withTimestamps();
    }
    public function getDiscountedPriceAttribute()
    {
        return $this->cost_per_day - (($this->cost_per_day/100)* $this->discount_percentage);
    }
    public function getFianlProceAttribute()
    {
        $after_service_charge = $this->discountedPrice + (($this->discountedProce/100) * config('app.service_charge_percentage'));
        $after_vat = $after_service_charge + (($after_service_charge/100) * config('app.vat_percentage'));
        return $after_vat;
    }
}
