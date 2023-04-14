<?php

namespace App\Rules;
use App\Book\Booking;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class RoomAvailableRule implements Rule
{
    protected $roomtype;
    protected $new_arrival_date;
    protected $new_departure_date;
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($roomtype, $new_arrival_date, $new_daparture_date)
    {
        $this->roomtype = $roomtype;
        $this->new_arrival_date = $new_arrival_date;
        $this->new_departure_date = $new_daparture_date;
    }
    public function room_available()
    {
        $booking = new Booking($this->roomtype, $this->new_arrival_date, $this->new_departure_date);
        return $booking->room_available();
    }
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->room_available();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, no rooms are available in the given dates. Please try another date.';
    }
}
