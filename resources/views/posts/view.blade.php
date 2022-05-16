<?php $yesNoOoptions = [''=> '--select--', 'yes' => 'Yes', 'no' => 'No'] ?>
@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ 'Post View' }}</h4></div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ 'Title' }}</label>
                            <div class="col-sm-9">
                                {{  $post->title }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ 'Description' }}</label>
                            <div class="col-sm-9">
                                {{  $post->description }}
                            </div>
                        </div>

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

