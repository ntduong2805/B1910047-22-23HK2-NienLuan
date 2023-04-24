@extends('layouts.dashboard')
@section('title', 'Dashboard | Setting')

@section('content')
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3>Edit Profile</h3>
                <p>Change your password by using following form.</p>
            </div>
            <div class="book-form inn-com-form db-form">

                <form action="{{ route('dashboard.setting') }}" class="col s12" method="POST">
                @method('put')
                @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" type="password"
                                   class="validate {{ $errors->has('password') ? ' invalid' : '' }}"
                                   id="userPassword"
                                   required>
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
                                   equalTo="#userPassword"
                                   required>
                            <label>Confirm password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="form-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
