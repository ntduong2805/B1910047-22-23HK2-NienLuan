<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'roomtypes';
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
        return $this->belongsToMany(Facility::class, 'facility_roomtype')->withTimestamps();
    }
    //Lấy giá chiết khấu
    public function getDiscountedPriceAttribute()
    {
        return $this->cost_per_day - (($this->cost_per_day/100)* $this->discount_percentage);
    }
    //Lấy giá cuối cùng
    public function getFinalPriceAttribute()
    {
        $after_service_charge = $this->discountedPrice + (($this->discountedProce/100) * config('app.service_charge_percentage'));
        $after_vat = $after_service_charge + (($after_service_charge/100) * config('app.vat_percentage'));
        return $after_vat;
    }
    //Lấy số lượng xếp hạng
    public function getRatingsCount(){
        $rating_count = 0;
        foreach($this->rooms as $room){
            foreach($room->reviews as $review){
                if($review->approval_status == 'approved'){
                    if($review->rating != 0) {
                        $rating_count++;
                    }
                }
            }
        }
        return $rating_count;
    }
    //Lấy xếp hạng tổng hợp
    public function getAggregatedRating(){
        $total_rating = 0;
        $rating_count = 0;
        foreach($this->rooms as $room){
            foreach($room->reviews as $review){
                if($review->approval_status == 'approved'){
                    if($review->rating != 0) {
                        $total_rating = $total_rating + $review->rating;
                        $rating_count++;
                    }
                }
            }
        }

        if($total_rating > 0 && $rating_count > 0){
            return $total_rating/$rating_count;
        } else{
            return 0;
        }
    }
}
