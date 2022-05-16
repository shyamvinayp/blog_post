@extends('adminlte::page')
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>
@section('title', 'Users | Lara Admin')

@section('content_header')
@include('flash-message')
<div class="row mb-2">
<div class="col-sm-6">
<h1>{{ 'Post List' }}</h1>
</div>
    @if(Auth::user())
        @if(Auth::user()->type === 1)
            <div class="col-sm-6">
                <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/admin/post/create" >{{ 'Create New Post' }}</a>
            </div>
        @endif
    @endif
</div>
@stop

@section('content')
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="20px">{{ 'Sr. No' }}</th>
                <th>{{ 'Title' }}</th>
                <th>{{ 'Description' }}</th>
                <th>{{ 'Created Date' }}</th>
                <th width="300px">{{ 'Action' }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
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
                    $(".post-del-btn").click(function () {
                        let r = confirm('Are you sure you want to delete this item?');
                        return (r === true);
                    })
                },
        serverSide: true,
        ajax: "{{ route('admin.post.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
		columnDefs: [
			{
				orderable: false,
				targets: [0,4]
			},
			{
				searchable: false,
                targets: [0,4]
			}
		],
    });
  });
 </script>
