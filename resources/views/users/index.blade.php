@extends('adminlte::page')
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>
@section('title', 'Users | Lara Admin')

@section('content_header')
@include('flash-message')
<div class="row mb-2">
<div class="col-sm-6">
<h1>{{ __('messages.user_list') }}</h1>
</div>
<div class="col-sm-6">
    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/create" >{{ __('messages.create_new_user') }}</a>
{{--    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/export" >{{ __('messages.download_user_list') }}</a>
    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/print" >{{ __('messages.print_user_list') }}</a>--}}
{{--    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/printpreview" >Print Preview</a>--}}
</div>
</div>
@stop

@section('content')
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="20px">{{ __('messages.serial_number') }}</th>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.email') }}</th>
                <th>{{ __('messages.type') }}</th>
               {{-- <th>Status</th>--}}
                <th>{{ __('messages.created_date') }}</th>
                <th width="300px">{{ __('messages.action') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@stop

@section('footer')
    @include('partials.footer')
@stop

<meta name="csrf-token" content="{{ csrf_token() }}">
<!--<link href="{{ asset('css/datatables/bootstrap.min.css')}}" rel="stylesheet">-->

<link href="{{ asset('css/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>
<script src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('js/datatables/dataTables.bootstrap4.min.js') !!}"></script>

<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
		drawCallback: function () {
                    $(".user-del-btn").click(function () {
                        let r = confirm('Are you sure you want to delete this item?');
                        return (r === true);
                    })
                },
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'type', name: 'type'},
           /* {data: 'status', name: 'status'},*/
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
        "language":
            {
                "sProcessing": "{{ __('messages.processing') }}",
                "sLengthMenu": "{{ __('messages.show') }} _MENU_ {{ __('messages.entries') }}",
                "sZeroRecords": "{{ __('messages.no_data_available') }}",
                "sInfo": "{{ __('messages.showing') }} _START_ {{ __('messages.to') }} _END_ {{ __('messages.of') }} _TOTAL_ {{ __('messages.entries') }}",
                "sInfoEmpty": "{{ __('messages.showing') }} 0 {{ __('messages.to') }} 0 {{ __('messages.of') }} 0 {{ __('messages.entries') }}",
                "sInfoFiltered": "({{ __('messages.filtered_from') }} _MAX_ {{ __('messages.total_entries') }})",
                "sInfoPostFix": "",
                "sSearch": "{{ __('messages.search') }}:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "7الأول",
                    "sPrevious": "{{ __('messages.previous') }}",
                    "sNext": "{{ __('messages.next') }}",
                    "sLast": "8الأخير"
                }
            },
		columnDefs: [
			{
				orderable: false,
				targets: [0,3,5]
			},
			{
				searchable: false,
                targets: [0,3,5]
			}
		],
    });
  });
 </script>
