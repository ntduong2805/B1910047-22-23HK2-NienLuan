@extends('layouts.front')

@section('content')

    <!--TOP SECTION-->
    <div class="hp-banner"> <img src="{{'/storage/roomtypes/'.$roomtype->images->first()->name}}" alt=""> </div>
    <!--END HOTEL ROOMS-->
    <!--CHECK AVAILABILITY FORM-->
    <div class="check-available">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inn-com-form">
                        <form action="
                        {{ route('book', $roomtype->id) }}
                        " class="col s12" method="POST">
                        @method('post')
                        @csrf
                        
                        

                        @if ($errors->any())
                            <div class="row">
                                <div class="col-md-12 alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                            <div class="row">
                                <div class="col s12 avail-title">
                                    <h4>Check Availability</h4>
                                    <p>The final price is calculated by giving {{$roomtype->discount_percentage}}% discount, adding {{config('app.service_charge_percentage')}}% service charge and adding {{config('app.vat_percentage')}}% VAT in the room's original price.</p>
                                </div>
                            </div>
                        <input name="booking_validation" type="hidden" value="0">

                        <div class="row">
                                <div class="input-field col s12 m4 l2">
                                    {{-- Price --}}
                                    <input type="text" style="color: black" value="{{ number_format($roomtype->finalPrice) . config('app.currency')}}" class="form-btn" disabled>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    {{-- Adult --}}
                                    <select name="number_of_adult">
                                        <option value="" disabled selected>No of adults</option>
                                        @for($i = 1; $i <= $roomtype->max_adult; $i++ )
                                            <option value="{{ $i }}" {{ old('number_of_adult') == $i && old('number_of_adult') != 0 ? 'selected' : '' }} >
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    {{-- Children --}}
                                    <select name="number_of_child">
                                        <option value="" disabled selected>No of childs</option>
                                        @for($i = 0; $i <= $roomtype->max_adult; $i++ )
                                            <option value="{{ $i }}" {{ old('number_of_child') == $i && old('number_of_child') != 0 ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    {{-- Start --}}
                                    <input type="text" id="from" name="arrival_date" value="{{ old('arrival_date') }}">
                                    <label for="from">Arrival Date</label>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    {{-- Finish --}}
                                    <input type="text" id="to" name="departure_date" value="{{ old('departure_date') }}">
                                    <label for="to">Departure Date</label>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="submit" value="submit" class="form-btn">
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CHECK AVAILABILITY FORM-->
    <div class="hom-com">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                {{-- TEN PHONG --}}
                                <h4><span>{{ $roomtype->name }}</span> Room</h4>
                            </div>
                            <div class="hp-amini">
                                {{-- MO TA --}}
                                <p>{{ $roomtype->description }}</p>
                            </div>
                        </div>
                                {{-- CO SO VAT CHAT --}}
                        @if(count($roomtype->facilities) > 0)
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Facilities</span></h4>
                                <p>All of the following facilities comes with the room.</p>
                            </div>
                            <div class="hp-amini">
                                <ul>
                                    @foreach($roomtype->facilities as $facility)
                                    <li><img src="{{('/storage/facilities/'.$facility->icon)}}" alt="">{{ $facility->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Overview</span></h4>
                                <p>Following the main features of the room</p>
                            </div>
                            <div class="hp-over">
                                <ul class="nav nav-tabs hp-over-nav">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home"><img src="{{ asset("front/images/icon/a8.png") }}" alt=""> <span class="tab-hide">Overview</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active tab-space">
                                        <div class="hp-main-overview">
                                            {{-- TONG QUAN --}}
                                            <ul>
                                                <li>Occupancy: <span>Max {{ $roomtype->max_adult + $roomtype->max_child }} Persons</span>
                                                </li>
                                                <li>Size : <span>{{ $roomtype->size }} sq. feet</span>
                                                </li>
                                                <li>Room Service : <span>{{  $roomtype->room_service==true ? "Available" : "Not Available" }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if(count($roomtype->images) > 0)
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Photo Gallery</span></h4>
                                <p>View the actual room by following images.</p>
                            </div>
                            <div class="">
                                <div class="h-gal">
                                    <ul>
                                        {{-- HINH ANH --}}
                                        @foreach($roomtype->images as $image)
                                        <li><img class="materialboxed" data-caption="{{ $image->caption }}" src="{{('/storage/roomtypes/'.$image->name)}}" alt="">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Ratings</span></h4>
                                <p>If you have good experience with the hotel, please leave a review to recommend others.</p>
                            </div>
                            <div class="hp-review">
                                <div class="hp-review-left">
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Excellent</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Good</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-Good"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Satisfactory</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-satis"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Below Average</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-below"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Below Average</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-poor"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hp-review-right">
                                    <h5>Overall Ratings</h5>
                                    <p><span>
                            {{ $roomtype->getAggregatedRating() }} <i class="fa fa-star" aria-hidden="true"></i></span> based on {{$roomtype->getRatingsCount() }} reviews</p>
                                </div>
                            </div>
                        </div>
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>USER</span> REVIEWS</h4>
                                <p>View all reviews from our customer regarding this room.</p>
                            </div>
                            <div class="lp-ur-all-rat">
                                <ul>
                                    @if(count($roomtype->rooms) > 0)
                                    @foreach($roomtype->rooms as $room)
                                            @if(count($room->reviews) > 0)
                                            @foreach($room->reviews as $review)

                                                    <li>
                                                        <div class="lr-user-wr-img"> <img src="{{'/storage/avatars/'.$review->room_booking->user->avatar}}" alt=""> </div>
                                                        <div class="lr-user-wr-con">
                                                            <h6>{{ $review->room_booking->user->first_name." ".$review->room_booking->user->last_name }} 
                                                                @if($review->rating > 0)
                                                                    <span> {{ $review->rating }} 
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                @endif
                                                            </h6>
                                                            <span class="lr-revi-date"> {{ \Carbon\Carbon::parse($review->updated_at)->diffForHumans() }}</span>
                                                            <p>{{ $review->review }}</p>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--=========================================-->
                    <div class="hp-call hp-right-com">
                        <div class="hp-call-in"> <img src="{{ asset("front/images/icon/dbc4.png") }}" alt="">
                            <h3><span>Call us!</span> {{ config('app.phone_number') }}</h3> <small>We are available 24/7 Monday to Sunday</small> <a href="#">Call Now</a> </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-book hp-right-com">
                        <div class="hp-book-in">
                            <a href="" id="bookmark_button" class="like-button"><i class="fa fa-heart-o"></i> Bookmark this listing</a> <!--<span>159 people bookmarked this place</span>-->
                            <ul>
                                <li><a href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" rel="me" title="Facebook" target="_blank"><i class="fa fa-facebook"></i> Share</a>
                                </li>
                                <li><a href="https://twitter.com/share?url={{ Request::url() }}&text={{ $roomtype->name }}" rel="me" title="Twitter" target="_blank"><i class="fa fa-twitter"></i> Tweet</a>
                                </li>
                                <li><a href="https://plus.google.com/share?url={{ Request::url() }}" rel="me" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i> Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-card hp-right-com">
                        <div class="hp-card-in">
                            <h3>We Accept</h3> <img src="{{ asset("front/images/card.png") }}" alt=""> </div>
                    </div>
                    <!--=========================================-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        $(function() {
            $('#bookmark_button').click(function() {
                if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
                    window.sidebar.addPanel(document.title, window.location.href, '');
                } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
                    window.external.AddFavorite(location.href, document.title);
                } else if (window.opera && window.print) { // Opera Hotlist
                    this.title = document.title;
                    return true;
                } else { // webkit - safari/chrome
                    alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
                }
            });
        });
    </script>

    @endsection
