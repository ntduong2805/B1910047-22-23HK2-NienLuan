@extends('layouts.admin')
@section('title', 'Slider - Edit')

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
                            <h4 class="title">Update Slider Image</h4>
                        </div>
                        <div class="content">
                            
                        <form action="{{ route('admin.slider.update', $slider->id) }}" enctype="multipart/form-data" method="POST">
                                @method('put')
                                @csrf
                    
                            <div class="row">

                                <div class="col-md-12" align="center">
                                    <img height="250px" width="600px" src="{{'/storage/sliders/'.$slider->name}}"/>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" accept="image/*" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Small Title</label>
                                        <input type="text" name="small_title" class="form-control border-input" value="{{ $slider->small_title  }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Big Title</label>
                                        <input type="text" name="big_title" class="form-control border-input" value="{{ $slider->big_title  }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" rows="5" class="form-control border-input">{{ $slider->description }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="link" class="form-control border-input"
                                                   placeholder="ex: www.facebook.com/the-royal-hotel" value="{{ $slider->link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Link Text</label>
                                            <input type="text" name="link_text" class="form-control border-input"
                                                   placeholder="ex: Book Now" value="{{ $slider->link_text }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                    @if ($slider->status == '1') selected="selected" @endif>Active
                                            </option>
                                            <option value="0"
                                                    @if ($slider->status == '0') selected="selected" @endif>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Slider Image</button>
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
@endsection

