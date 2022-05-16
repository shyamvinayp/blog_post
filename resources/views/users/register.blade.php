@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>
@section('content')

<div class="container">
    <div class="row justify-content-center">
	@include('flash-message')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Customer Signup</h4></div>
                <div class="card-body">
                    {!! Form::open(['route'=>'customers.store', 'id' => 'telecom-main-form', 'class' => 'dirtyforms', 'enctype' => "multipart/form-data"]) !!}
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('customers.partials.form-fields')
                        <div class="row mt-20 text-right">
                            <div class="col-sm-12">
                                @include('partials.form.save-cancel', ['submitValue'=>"Save", 'cancelValue' => 'Cancel', 'skipCancel'=> false, 'submitBtnStatus' => 'Primary'])
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
    @include('customers.partials.create-edit-scripts')
@endsection
