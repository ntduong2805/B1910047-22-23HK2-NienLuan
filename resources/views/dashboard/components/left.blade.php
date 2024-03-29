@section('dashboard_left')
    <div class="db-left">
        <div class="db-left-1"
        style="
                padding: 116px 50px 30px 50px;
                background: url({{ asset("/storage/avatars/" .Auth::user()->avatar)}}) no-repeat center center;
                background-size: cover;
                position: relative;">
            <h4>{{ Auth::user()->first_name }}</h4>
            <p>{{ Auth::user()->address }}</p>
        </div>
        <div class="db-left-2">
            <ul>
                <li>
                    <a href="
                    {{ route('dashboard') }}
                    "><img src="{{ asset("front/images/icon/db1.png") }}" alt="" /> All</a>
                </li>
                <li>
                    <a href="
                    {{ route('dashboard.room') }}
                    "><img src="{{ asset("front/images/icon/db2.png") }}" alt="" /> Rooms</a>
                </li>
                <li>
                    <a href="
                    {{ route('dashboard.profile')}}
                    "><img src="{{ asset("front/images/icon/db7.png") }}" alt="" /> Profile</a>
                </li>
                <li>
                    <a href="
                    {{ url('/dashboard/setting') }}
                    " alt="Change Password"><img src="{{ asset("front/images/icon/key.png") }}" alt="Change Password" /> Password</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-dash-form').submit();"><img src="{{ asset("front/images/icon/db8.png") }}" alt=""> Logout</a>
                </li>
            </ul>
        </div>
    </div>



    <form id="logout-dash-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @show