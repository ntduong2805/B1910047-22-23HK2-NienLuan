@extends('layouts.admin')
@section('title', 'Room Type | Image - Create')

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
                            <h4 class="title">Add Image to Room Gallery</h4>
                        </div>
                        <div class="content">
                            
                        <form action="{{ route('admin.roomtype.image.store', $roomtype->id) }}" id="roomtype-add-form" enctype="multipart/form-data" method="POST">
                            @method('post')
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image<star>*</star></label>
                                        <input type="file" name="image" accept="image/*" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Caption</label>
                                        <input type="text" name="caption" class="form-control border-input" value="{{ old('caption') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Is Primary</label>
                                        <select name="is_primary" id="is_primary" class="form-control">
                                            <option value="1"
                                                {{ old('is_primary') == '1' ? 'selected' : '' }}
                                                >
                                                Yes
                                            </option>
                                            <option value="0"
                                                {{ old('is_primary') == '0' ? 'selected' : '' }}
                                                >
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                {{ old('status') == '1' ? 'selected' : '' }}
                                                >
                                                Active
                                            </option>
                                            <option value="0"
                                                {{ old('status') == '0' ? 'selected' : '' }}
                                                >
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Add Image</button>
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

            var $validator = $("#roomtype-add-form").validate({
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

