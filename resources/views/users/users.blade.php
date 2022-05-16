@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{ __('User Information List ') }}</div>
                    <div class="card-body">
                       {{-- <h1>User Information List </h1>--}}
                        <table class="table" >
                            <tr><th>Id</th><th>Name</th><th>Email</th><th>Phone</th></tr>
                            @foreach($users as $user)
                                <tr><td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('users.partials.create-edit-scripts')
@endsection
