@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ 'Add Post' }}</div>
                    <div class="card-body">
                        {!! Form::open(['route'=>'admin.post.store', 'id' => 'demo-main-form', 'class' => 'dirtyforms']) !!}
                        @include('posts.partials.form-fields')
                        <div class="row mt-20 text-right">
                            <div class="col-sm-12">
                                @include('partials.form.save-cancel', ['submitValue'=>"save", 'cancelValue' => 'cancel', 'skipCancel'=> false, 'submitBtnStatus' => 'Primary'])
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    @include('posts.partials.create-edit-scripts')
@endsection
