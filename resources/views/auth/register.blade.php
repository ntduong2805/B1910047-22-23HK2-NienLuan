@extends('layouts.front')

@section('content')
    <div class="inn-body-section pad-bot-55">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>Register</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
                <!--TYPOGRAPHY SECTION-->
                <div class="col-md-6">
                    <div class="head-typo typo-com collap-expand book-form inn-com-form">
                        <h2>Sign up with Email</h2>
                        <form class="col s12" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="first_name" type="text"
                                           class="validate {{ $errors->has('first_name') ? ' invalid' : '' }}" value="{{ old('first_name') }}" required autofocus>
                                    <label>First Name</label>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-field col s6">
                                    <input name="last_name" type="text"
                                           class="validate {{ $errors->has('last_name') ? ' invalid' : '' }}" value="{{ old('last_name') }}" required>
                                    <label>Last Name</label>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="email" type="email"
                                           class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ old('email') }}" required>
                                    <label>Email Address</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="gender">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male" @if($user->gender == "male") selected="selected"@endif>Male
                                        </option>
                                        <option value="female" @if($user->gender == "female") selected="selected"@endif>Female
                                        </option>
                                        <option value="others" @if($user->gender == "others") selected="selected"@endif>Others
                                        </option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password" type="password"
                                           class="validate {{ $errors->has('password') ? ' invalid' : '' }}" required>
                                    <label>Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password_confirmation" type="password"
                                           class="validate {{ $errors->has('password_confirmation') ? ' invalid' : '' }}"
                                           required>
                                    <label>Confirm Password</label>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="register">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--END TYPOGRAPHY SECTION-->
                <div class="col-md-6">
                    <!--=========================================-->
                    <div class="hp-call hp-right-com">
                        <div class="hp-call-in"> <img src="{{ asset("front/images/icon/dbc4.png") }}" alt="">
                            <h3><span>Call us!</span> {{ config('app.phone_number') }}</h3> <small>We are available 24/7 Monday to Sunday</small> <a href="#">Call Now</a> </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    
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
