@extends('layouts.admin')
@section('title', 'User - Create')

@section('style')
    @parent
@endsection
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Add User</h4>
                        </div>
                        <div class="content">
                            <form action="{{ route('admin.user.store') }}" id="user-add-form" method="POST" enctype="multipart/form-data">
                                @method('post') 
                                @csrf 
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control border-input"
                                               placeholder="ex: Leonardo" value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control border-input"
                                               placeholder="ex: Vinci" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option selected="" disabled="">- Select Gender -</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'male' ? 'selected' : '' }}>Female
                                            </option>
                                            <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Others
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control border-input"
                                               placeholder="Phone Number" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control border-input"
                                               value="{{ old('address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About</label>
                                        <input type="text" name="about" class="form-control border-input"
                                               value="{{ old('about') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" accept="image/*" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control border-input"
                                               placeholder="ex: hari@gmail.com" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control border-input"
                                               placeholder="new password for this user">
                                    </div>
                                </div>
                            </div>

                            @if(Auth::user()->role == "admin")
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Create User</button>
                            </div>
                            <div class="clearfix"></div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!--  Forms Validations Plugin -->
    <script src="{{asset("backend/js/jquery.validate.min.js")}}"></script>

    <!--  Select Picker Plugin -->
    <script src="{{asset('backend/js/bootstrap-selectpicker.js')}}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset("backend/js/moment.min.js")}}"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{asset('/backend/js/bootstrap-datetimepicker.js')}}"></script>
    <script>
        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
    </script>

    <script>
        $().ready(function () {

            var $validator = $("#user-add-form").validate({
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 25
                    },
                    last_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 25
                    },
                    gender: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    address: {
                        maxlength: 200
                    },
                    about: {
                        maxlength: 300
                    }
                }
            });
        });

    </script>





@endsection

