<?php 

namespace App\Book;

use Carbon\Carbon;

class Booking
{
    protected $roomtype;
    protected $new_arrival_date;
    protected $new_departure_date;
    protected $message;

    public function __construct($roomtype, $new_arrival_date, $new_daparture_date)
    {
        $this->roomtype = $roomtype;
        $this->new_arrival_date = $new_arrival_date;
        $this->new_departure_date = $new_daparture_date;
    }
    // Hàm trả về kiểu phòng có tồn tại phòng:
    protected function rooms_exist()
    {
        if (count($this->roomtype->rooms) > 0)
        {
            return true;
        }
        $this->message = "Sorry, there are no room of given type available.";
        return false;
    }
    public function mesage()
    {
        return 'Sorry, no rooms are available in the given dates. Please try another date.';
    }
    // Hàm trả về  phòng có tồn tại đặt phòng:
    protected function room_bookings_exist($room)
    {
        if(count($room->room_bookings) > 0)
        {
            return true;
        }
    }
    protected function room_bookings_check($room_bookings)
    {
        foreach ($room_bookings as $room_booking)
        {
            $old_arrival_date = Carbon::parse($room_booking->arrival_date)->format('Y/m/d');
            $old_departure_date = Carbon::parse($room_booking->departure_date)->format('Y/m/d');
            //Nếu ngày đến nhỏ hơn ngày đến đã có
            if ($this->new_arrival_date < $old_arrival_date)
            {
                // Và ngày đi lớn hơn ngày đi đã có
                if ($this->new_departure_date > $old_departure_date)
                    return false;
            //Nếu ngày đến lớn hơn ngày đến đã có
            } elseif ($this->new_arrival_date > $old_arrival_date)
            {
                // Nhưng ngày đi nhỏ hơn ngày đi đã có
                if ($this->new_arrival_date < $old_departure_date)
                    return false;
            //Nếu ngày đến bằng với ngày đến đã có
            } elseif ($this->new_arrival_date == $old_arrival_date)
            {
                return false;
            }
        }
        return true;
    }
    // Hàm kiểm tra
    public function passes($attribute, $value)
    {
        return $this->room_available();
    }
    // Hàm kiểm tra phòng có sẵn
    public function room_available()
    {
        $this->rooms_exist();
        foreach ($this->roomtype->rooms as $room) 
        {
            if ($this->room_bookings_exist($room)) 
            {
                if ($this->room_bookings_check($room->room_bookings) == false)
                    continue;
            }
            return true;
        }
    }
    //Hàm trả về 1 số phòng
    public function available_room_number()
    {
        //Tồn tại phòng
        $this->rooms_exist();
        foreach ($this->roomtype->rooms as $room) 
        {
            if ($this->room_bookings_exist($room))
            {
                if($this->room_bookings_check($room->room_bookings) == false)
                    continue;
            }
            return $room->room_number;
        }
    }
}