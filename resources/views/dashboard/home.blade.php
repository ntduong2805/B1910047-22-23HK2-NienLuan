@extends('layouts.dashboard')

@section('content')
    <div class="db-cent-2 row">
        <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""> <span> Room Bookings</span>
                <p></p>
                <h2>{{ $total_room_bookings }}</h2> </div>
        </div>
        
        <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc3.png") }}" alt=""> <span> Due Payments</span>
                <p></p>
                <h2>{{ $total_pending_payments }}</h2> </div>
        </div>
    </div>
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> Room Bookings</h3>
                <p>View your upcoming hotel bookings here</p>
            </div>
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th>Room No</th>
                    <th>Type</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                @forelse($room_bookings as $index => $room_booking)
                    <tr>
                        <td>{{ $room_booking->room->room_number}}</td>
                        <td>{{ $room_booking->room->room_type->name}}</td>
                        <td>{{ $room_booking->arrival_date }}</td>
                        <td>{{ $room_booking->departure_date }}</td>
                        <td>{{ number_format($room_booking->room_cost) }}VNĐ</td>
                        <td>
                            @if($room_booking->status == "pending")
                                <span class="label label-default">Pending</span>
                            @elseif($room_booking->status == "checked_in")
                                <span class="label label-primary">Checked In</span>
                            @elseif($room_booking->status == "checked_out")
                                <span class="label label-success">Checked Out</span>
                            @else
                                <span class="label label-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            @if($room_booking->payment == true)
                                <span class="db-success">Paid</span>
                            @else
                                <span class="db-not-success">Not Paid</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>Sorry, no room bookings found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="db-cent-3">
        <div class="db-cent-acti">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/review.png") }}" alt=""/> My Reviews</h3>
                <p>Latest reviews submitted by me.</p>
            </div>
            <ul>
                @forelse($room_booking_with_reviews as $room_booking)
                <li>
                    <div class="db-cent-wr-img"> <img src="{{ asset("/storage/avatars/" .Auth::user()->avatar)}}" alt=""> </div>
                    <div class="db-cent-wr-con">
                        <h6>Hotel Booking
                            @if($room_booking->status == "cancelled")
                                <span class="label label-danger">Cancelled</span>
                            @elseif($room_booking->status == "checked_in")
                                <span class="label label-primary">Checked In</span>
                            @elseif($room_booking->status == "checked_out")
                                <span class="label label-success">Checked Out</span>
                            @elseif($room_booking->status == "pending")
                                <span class="label label-default">Pending</span>
                            @endif
                        </h6>
                        <span class="lr-revi-date">Review Date: {{ \Carbon\Carbon::parse($room_booking->review->updated_at)->format('Y-m-d') }}</span>
                        <br>
                        <span class="lr-revi-date">Rating: {{ $room_booking->review->rating }}/5</span>

                        <p>
                            {{ $room_booking->review->review }}
                        </p>
                        <a href="{{ route('dashboard.review', $room_booking->id) }}" class="btn btn-danger btn-sm">Update Review</a>

                    </div>
                </li>
                    @empty
                    Sorry, you have not submitted any reviews yet.
                    @endforelse
            </ul>
        </div>
    </div>
@endsection
