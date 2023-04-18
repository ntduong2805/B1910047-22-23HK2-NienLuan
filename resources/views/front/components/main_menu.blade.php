@section('main_menu')
    <!--TOP SECTION-->
    <div class="row">
        <div class="logo">
            <a href="{{ route('hotel') }}"><img src="{{ asset("front/images/logo.png") }}" alt=""/>
            </a>
        </div>
        <div class="menu-bar">
            <ul>
                <li><a href="{{ route('hotel') }}">Home</a>
                </li>
                <li><a href="{{ route('rooms') }}">Rooms</a>
                </li>
                <li><a href="{{ route('about') }}">About</a>
                </li>
                <li><a href="{{ route('contact') }}">Contact Us</a>
                </li>


                @if (Auth::guest())
                    <li><a href="{{ route('register') }}">Register</a>
                    </li>
                    <li><a href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>




    <div class="all-drop-down">
        <!-- Dropdown Structure -->
        <ul id='drop-home' class='dropdown-content drop-con-man'>
            <li><a href="main.html">Home - Default</a>
            </li>
            <li><a href="index-1.html">Home - Reservation</a>
            </li>
        </ul>
    </div>
    <!--TOP SECTION-->
@show