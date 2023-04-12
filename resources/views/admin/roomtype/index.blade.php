@extends('layouts.admin')
@section('title', 'Room Type')

@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="toolbar">
                                <a href="{{ route('admin.roomtype.create') }}" rel="tooltip" title="Add New Room Type"
                                   class="btn btn-danger" style="margin-right: 20px">
                                    <i class="ti-plus"></i>
                                </a>
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">#</th>
                                <th data-field="name" class="text-center">Name</th>
                                <th data-field="cost_per_day">Cost Per Day</th>
                                <th data-field="discount_percentage">Discount</th>
                                <th data-field="max_adult">Max Adult</th>
                                <th data-field="max_child">Max Child</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($roomtypes->count())
                                    @else
                                        @foreach($roomtypes as $index => $roomtype)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $roomtype->name }}</td>
                                               <td><span class="badge">{{ $roomtype->cost_per_day . config('app.currency') }}</span></td>
                                               <td><span class="badge">{{ $roomtype->discount_percentage."%" }}</span></td>
                                               <td><span class="btn btn-default btn-xs">{{ $roomtype->max_adult }}</span></td>
                                               <td><span class="btn btn-default btn-xs">{{ $roomtype->max_child }}</span></td>
                                                <td>
                                                    @if($roomtype->status == 1)
                                                        <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                    @else
                                                        <button class="btn btn-default btn-xs btn-fill">Inactive
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="table-icons">
                                                        <a rel="tooltip" title="Manage Images"
                                                           class="btn btn-simple btn-primary btn-icon table-action edit"
                                                           href="{{ route('admin.roomtype.image.index', $roomtype->id) }}">
                                                            <i class="ti-image"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Manage Rooms"
                                                           class="btn btn-simple btn-info btn-icon table-action edit"
                                                           href="{{route('admin.roomtype.room.index', $roomtype->id)}}">
                                                            <i class="ti-package"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{route('admin.roomtype.edit', $roomtype->id)}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <button rel="tooltip" title="Remove"
                                                                class="btn btn-simple btn-danger btn-icon table-action"
                                                                onclick="delete_button()">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                        <div class="collapse">
                                                            <form action="{{ route('admin.roomtype.destroy', $roomtype->id) }}" id="delete-roomtype" method="POST">
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                            
                                                            </form>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endunless
                                </tbody>
                            </table>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-table.js') }}"></script>
    <script type="text/javascript">

        var delete_button = function(){
            swal({  title: "Are you sure?",
                text: "You want to delete the roomtype. Deleting roomtype will also delete its rooms and its room bookings.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-roomtype').submit();
            });
        }


        var $table = $('#bootstrap-table');
        $().ready(function () {
            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8, 10, 25, 50, 100],

                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function (pageNumber) {
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

    </script>
@endsection

