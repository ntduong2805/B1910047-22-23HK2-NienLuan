@extends('layouts.front')

@section('content')

    <div class="inn-body-section pad-bot-55">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>Room Types</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>All available hotel rooms and suites are listed below</p>
                </div>

            @foreach($roomtypes as $roomtype)
                <!--ROOM SECTION-->
                <div class="room">
                    @if($roomtype->cost_per_day !== $roomtype->discountedPrice)
                    <div class="ribbon ribbon-top-left"><span>Discount</span>
                    </div>
                    @endif
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="{{'/storage/roomtypes/'.$roomtype->images->first()->name}}" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>{{ $roomtype->name }}</h4>

                        <div class="r2-ratt">
                            @if($roomtype->getAggregatedRating() > 0)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($roomtype->getAggregatedRating() > 1)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($roomtype->getAggregatedRating() > 2)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($roomtype->getAggregatedRating() > 3)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($roomtype->getAggregatedRating() > 4)
                            <i class="fa fa-star"></i>
                            @endif
                            <p>
                                @if($roomtype->getAggregatedRating() == 0)
                                    No Ratings Yet
                                @elseif($roomtype->getAggregatedRating() <= 2)
                                Below Average
                                @elseif($roomtype->getAggregatedRating() <= 3)
                                    Satisfactory
                                @elseif($roomtype->getAggregatedRating() <= 4)
                                    Good
                                @elseif($roomtype->getAggregatedRating() <= 5)
                                    Excellent
                                @endif
                                {{$roomtype->getAggregatedRating()}} / 5
                            </p>
                        </div>
                        <ul>
                            <li>Max Adult : {{ $roomtype->max_adult }}</li>
                            <li>Max Child : {{ $roomtype->max_child }}</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            @foreach($roomtype->facilities as $facility)
                                <li>{{ $facility->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>

                        <p>
                            <span class="room-price-1">{{ number_format($roomtype->discountedPrice) . config('app.currency')}}</span>
                            @if($roomtype->cost_per_day !== $roomtype->discountedPrice)
                            <span class="room-price">{{ number_format($roomtype->cost_per_day). config('app.currency') }}</span>
                            @endif
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com"> <a href="
                        {{ route('rooms.show', $roomtype->id) }}
                        " class="inn-room-book">Book</a> </div>
                </div>
                <!--END ROOM SECTION-->
                
                @endforeach
            </div>
        </div>
@endsection
