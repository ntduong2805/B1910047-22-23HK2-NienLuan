@section('mobile_menu')
<!--MOBILE MENU-->
<section>
    <div class="mm">
        <div class="mm-inn">
            <div class="mm-logo">
                <a href="{{ route('hotel') }}"><img src="{{ asset("front/images/logo.png") }}" alt="">
                </a>
            </div>
            <div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
            </div>
            <div class="mm-menu">
                <div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
                </div>
                <ul>
                    <li><a href="{{ route('hotel') }}">Home</a>
                    </li>
                    <li><a href="{{ route('rooms') }}">Rooms</a>
                    </li>
                    <li><a href="{{ route('about') }}">About</a>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @show