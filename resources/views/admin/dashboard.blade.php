@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>

@section('title', 'Dashboard | Lara Admin')

@section('content_header')
    <div class="col-sm-12">
        <h1> {{ __('messages.admin_dashboard') }}</h1>
    </div>
@stop

@section('content')

{{--<div class="row pb-3">
    <div class="col-lg-2">
        <a class="btn btn-info ml-2 p-4 pl-5 pr-5" href="{{URL::to('/')}}/uploads/create" > {{ __('messages.upload_files') }}</a>
    </div>
    <div class="col-lg-2">
        <a class="btn btn-info ml-2 p-4 pl-5 pr-5 p-2 text-center" href="{{URL::to('/')}}/users" > {{ __('messages.employees') }}</a>
    </div>
    <div class="col-lg-2">
        <a class="btn btn-info ml-2 p-4 pl-5 pr-5" href="{{URL::to('/')}}/recentreports" > {{ __('messages.reports') }}</a>
    </div>
    <div class="col-lg-3">
        <a class="btn btn-info ml-2 p-4 pl-5 pr-5" href=""> {{ __('messages.definitions') }}</a>
    </div>
</div>--}}

       {{-- <div class="row mt-5">
            <div class="col-lg-6 col-xs-6 text-center">
                <a class="btn btn-info ml-2 p-3" href="{{URL::to('/')}}/recentreports" >Reports</a>
            </div>
            <div class="col-lg-6 col-xs-6 text-left">
                <a class="btn btn-info ml-2 p-3" href="">Definitions</a>
            </div>
        </div>--}}


{{--<div class="row">
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $userCount }}</h3>
          <p>{{ __('messages.users') }}</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="{{URL::to('/')}}/users" class="small-box-footer">{{ __('messages.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-info">
          <div class="inner">
              <h3>{{ $attendance }}</h3>
              <p> {{ __('messages.attendance_list') }}</p>
          </div>
          <div class="icon">
              <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{URL::to('/')}}/attendancelogs" class="small-box-footer">{{ __('messages.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-warning">
              <div class="inner">
                  <h3>{{ $upload }}</h3>
                  <p>{{ __('messages.file_upload') }}</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{URL::to('/')}}/uploads" class="small-box-footer">{{ __('messages.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
  </div>--}}

    <!-- sencond row-->
{{--  <div class="row">
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-warning">
              <div class="inner">
                  <h3>{{ $reports }}</h3>
                  <p>{{ __('messages.recent_reports') }}</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{URL::to('/')}}/recentreports" class="small-box-footer">{{ __('messages.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success">
              <div class="inner">
                  <h3>{{ $customreport }}</h3>
                  <p>{{ __('messages.custom_reports') }}</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{URL::to('/')}}/reports/create" class="small-box-footer">{{ __('messages.more_info') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      --}}{{--<div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-info">
              <div class="inner">
                  <h3>{{ $agencycontactCount }}</h3>
                  <p>Agency Contact</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{URL::to('/')}}/agencycontact" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>--}}{{--
  </div>--}}
@endsection

@section('footer')
   @include('partials.footer')
@stop
