@extends('layouts.front')

@section('content')
    <!--Check Availability SECTION-->
    <div>
        <div class="slider fullscreen">
            <ul class="slides">
                @forelse($slider_images as $image)
                <li> <img src="{{'/storage/sliders/'.$image->name}}" alt="">
                    <!-- random image -->
                    <div class="caption center-align slid-cap">
                        <h5 class="light grey-text text-lighten-3">{{ $image->small_title }}</h5>
                        <h2>{{ $image->big_title }}</h2>
                        <p>{{ $image->description }}</p>
                        <a href="{{ $image->link }}" class="waves-effect waves-light">{{ $image->link_text }}</a></div>
                </li>
                    @empty
                    <li> <img src="{{ asset("front/images/slider/1.jpg") }}" alt="">
                    <!-- random image -->
                    <div class="caption center-align slid-cap">
                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        <h2>This is our big Tagline!</h2>
                        <p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a></div>
                </li>
                    @endforelse
            </ul>
        </div>
    </div>
    <!--End Check Availability SECTION-->
    <!--HOTEL ROOMS SECTION-->

    @if(count($roomtypes) > 0)
    <div class="hom1 hom-com pad-bot-40">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Our Hotel Rooms</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Every hotel stay provides you with great experience and hospitality.</p>
                </div>
            </div>
            <div class="row">
                <div class="to-ho-hotel">
                    @foreach($roomtypes as $roomtype)
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Rooms: {{ count($roomtype->rooms) }} </div> <img src="{{'/storage/roomtypes/'.$roomtype->images->first()->name}}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="
                                    {{ route('rooms.show', $roomtype->id) }}
                                    "><h4>{{ $roomtype->name }}</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
                                        </li>
                                        <li>
                                            @if($roomtype->cost_per_day !== $roomtype->discountedPrice)
                                            <span class="ho-hot-pri-dis">{{ number_format($roomtype->cost_per_day).' ' . config('app.currency') }}</span>
                                            @endif
                                            <span class="ho-hot-pri">{{ number_format($roomtype->discountedPrice).' ' . config('app.currency')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--END HOTEL ROOMS-->

    
    <div class="blog hom-com pad-bot-0">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Photo Gallery</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>View photos of hotel rooms.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="inn-services head-typo typo-com mar-bot-0">
                        <ul id="filters" class="clearfix">
                            <li><span class="filter" data-filter=".room">All Rooms</span>
                            </li>
                        </ul>
                        <div id="portfoliolist">
                            <!-- Room Types -->
                            @foreach($images as $image)
                                <div class="portfolio room" data-cat="room">
                                    <div class="label">
                                        <div class="label-text"><a class="text-title">{{ $image->caption }}</a></div>
                                        <div class="label-bg"></div>
                                    </div>
                                    <div class="portfolio-wrapper"> <img src="{{'/storage/roomtypes/'.$image->name}}" alt="" />
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog hom-com">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Read More</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($slider_images)> 0)
                <div class="col-md-4">
                    <div class="bot-gal h-gal">
                        <h4>Photo Gallery</h4>
                        <ul>
                            @foreach($slider_images as $image)
                            <li><img class="materialboxed" data-caption="{{ $image->big_title }}" src="{{ '/storage/sliders/'.$image->name }}" alt="">
                            </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <div class="col-md-4">
                    <div class="bot-gal h-vid">
                        <h4>Video Gallery</h4>
                        <iframe src="{{config('app.video')}}?autoplay=0&amp;showinfo=0&amp;controls=0" allowfullscreen></iframe>
                        <h5>Introductory Video</h5>
                        <p>Watch this video to learn more about our hotel facilities, luxuries and environment</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-blog">
                        <h4>Latest Reviews</h4>
                        <ul>
                            @if(count($reviews) > 0)
                                @foreach($reviews as $review)
                            <li>
                                <a href="#!"> <img src="{{'/storage/avatars/'.$review->room_booking->user->avatar}}" alt="">
                                    <h5>{{ $review->room_booking->user->first_name }}@if($review->rating > 0), {{ $review->rating }} <i class="fa fa-star" aria-hidden="true"></i>@endif</h5> <span>{{ \Carbon\Carbon::parse($review->updated_at)->diffForHumans() }}</span>
                                    <p>{{ $review->review }}</p>
                                </a>
                            </li>
                           @endforeach
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
