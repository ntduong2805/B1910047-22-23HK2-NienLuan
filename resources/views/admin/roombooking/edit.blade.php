@extends('layouts.admin')
@section('title', 'Room Booking - Edit')

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
                            <h4 class="title">Update Booking Status</h4>
                        </div>
                        <div class="content">
                        <form action="
                        @if(Auth::user()->role == "admin")
                            {{ route('admin.roombooking.update', $room_booking->id) }}
                        @else
                            {{ route('roombooking.update', $room_booking->id) }}
                        @endif
                        " method="POST">
                            @method('put')
                            @csrf
                        
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="pending"
                                                    @if ($room_booking->status == 'pending') selected="selected" @endif>Pending
                                            </option>
                                            <option value="checked_in"
                                                    @if ($room_booking->checked_in == 'checked_in') selected="selected" @endif>
                                                Checked In
                                            </option>
                                            <option value="checked_out"
                                                    @if ($room_booking->checked_out == 'checked_out') selected="selected" @endif>
                                                Checked Out
                                            </option>
                                            <option value="cancelled"
                                                    @if ($room_booking->cancelled == 'cancelled') selected="selected" @endif>
                                                Cancelled
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <select name="payment" id="payment" class="form-control">
                                            <option value="1"
                                                    @if ($room_booking->payment == '1') selected="selected" @endif>Paid
                                            </option>
                                            <option value="0"
                                                    @if ($room_booking->payment == '0') selected="selected" @endif>
                                                Not Paid
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Booking</button>
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

