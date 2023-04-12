@section('side-navbar')
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="logo">
            <a href="{{ route('admin') }}" class="simple-text">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="{{ route('admin') }}" class="simple-text">
                JP
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{'/storage/avatars/'.Auth::user()->avatar}}"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        {{Auth::user()->first_name." ".Auth::user()->last_name}}
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li><a href="{{ route('admin.user.edit', Auth::user()->id) }}">Edit Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                @if($admin_nav)
                    @foreach($admin_nav as $item)
                    <li @if (Request::is('admin/'.strtolower($item['name']).'/*')) class="active" @endif>
                        <a href="{{ url($item['actions']['view'])}}">
                            <i class="{{$item['icon']}}"></i>
                            <p>{{$item['name']}}</p>
                        </a>
                    </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@show