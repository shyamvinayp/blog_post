<?php $yesNoOoptions = [''=> '--select--', 'yes' => 'Yes', 'no' => 'No'] ?>
@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('messages.view_user_details') }}</h4></div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.employee_type') }}</label>
                            <div class="col-sm-9">
                                {{  __('messages.'.$user['type']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.employee_id') }}</label>
                            <div class="col-sm-9">
                                {{  ($user['emp_id']) ? $user['emp_id'] : null }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.name') }}</label>
                            <div class="col-sm-9">
                                {{  ($user['name']) ? $user['name'] : null }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.email') }}</label>
                            <div class="col-sm-9">
                                {{  ($user['email']) ? $user['email'] : null }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.address') }}</label>
                            <div class="col-sm-9">
                                {{  ($user['address']) ? $user['address'] : null }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.phone_number') }}</label>
                            <div class="col-sm-9">
                                {{  ($user['phone']) ? $user['phone'] : null }}
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Country :</label>
                            <div class="col-sm-9">
                                {{  ($user['country']) ? $user['country'] : null }}
                            </div>
                        </div>--}}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.city') }}</label>
                            <div class="col-sm-9">
                                {{  ($user['city']) ? $user['city'] : null }}
                            </div>
                        </div>

                       {{-- <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">State :</label>
                            <div class="col-sm-9">
                                {{  ($user['state']) ? $user['state'] : null }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Zip :</label>
                            <div class="col-sm-9">
                                {{  ($user['zip']) ? $user['zip'] : null }}
                            </div>
                        </div>--}}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-sm-9 text-right">
                                <a href="#"><button onclick="window.history.back();" class="btn btn-primary hBack" type="button">{{ __('messages.back') }}</button></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('partials.footer')
@stop
