@section('dashboard_right')

    <div class="db-righ">
        <h4>Upcoming Bookings</h4>
        <ul>
            @foreach(\App\Models\RoomBooking::where('user_id', Auth::user()->id)->orderBy('arrival_date', 'desc')->limit('5')->get() as $room_booking)
            <li>
                <a href="{{ url('dashboard/room/booking') }}"> <img src="{{'/storage/roomtypes/'.$room_booking->room->room_type->images->first()->name}}" alt="">
                    <h5>{{ $room_booking->room->room_type->name }}, {{ $room_booking->room->room_number }} </h5>
                    @if($room_booking->status == "cancelled")
                        <p>Status: Cancelled</p>
                    @elseif($room_booking->status == "checked_in")
                        <p>Status: Checked In</p>
                    @elseif($room_booking->status == "checked_out")
                        <p>Status: Checked Out</p>
                    @elseif($room_booking->status == "pending")
                        <p>Status: Pending</p>
                    @endif
                    <span>{{ \Carbon\Carbon::parse($room_booking->arrival_date)->diffForHumans($room_booking->arrival_date) }}</span> </a>
            </li>
            @endforeach
        </ul>
    </div>
    @show