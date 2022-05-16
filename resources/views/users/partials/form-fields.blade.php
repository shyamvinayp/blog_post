<input type="hidden" name="_token" value="{{ csrf_token() }}">


{{--<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.employee_type') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="type">
            @foreach($userType as $key=>$value)
                <option value="{!! $key !!}">{{ __('messages.'.$value) }}</option>
            @endforeach
        </select>
    </div>
</div>--}}

{{--<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.employee_id') }}</label>
    <div class="col-md-6">
        {!! Form::text('emp_id', null, [
          'class' => 'form-control',
        /*  'required'                      => 'required',*/
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('emp_id') }}</span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.attendance_user_id') }}</label>
    <div class="col-md-6">
        {!! Form::text('attendance_user_id', null, [
          'class' => 'form-control',
        /*  'required'                      => 'required',*/
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('attendance_user_id') }}</span>
    </div>
</div>--}}

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.name') }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::text('name', null, [
          'class' => 'form-control',
          'required'                      => 'required',
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.email') }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::text('email', null, [
            'class' => 'form-control',
            'required'                      => 'required',
            'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>
</div>

@if(empty($user))
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}<span style="color:red;"> *</span></label>
        <div class="col-md-6">
        <input id="password" required type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

   {{-- <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>--}}
@endif

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.address') }}</label>
    <div class="col-md-6">
        {!! Form::text('address', null, [
          'class' => 'form-control',
        /*  'required'                      => 'required',*/
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('address_1') }}</span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.phone') }}</label>
    <div class="col-md-6">
        {!! Form::text('phone', null, [
          'class' => 'form-control',
          'data-parsley-type' => "number",
         /* 'required'                      => 'required',*/
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('phone') }}</span>
    </div>
</div>

{{--<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
    <div class="col-md-6">
        {{Form::select('country_id', $countries, null, ["class" => "form-control", 'required' => 'required'])}}
        <span class="text-danger">{{ $errors->first('country_id') }}</span>
    </div>
</div>--}}

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.city') }}</label>
    <div class="col-md-6">
        {!! Form::text('city', null, [
          'class' => 'form-control',
          /*'required'                      => 'required',*/
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('city') }}</span>
    </div>
</div>

{{--<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
    <div class="col-md-6">
        {!! Form::text('state', null, [
           'class' => 'form-control',
           'required'                      => 'required',
           'data-parsley-trigger'          => 'change focusout',
           ]) !!}
        <span class="text-danger">{{ $errors->first('state') }}</span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>
    <div class="col-md-6">
        {!! Form::text('zip', null, [
           'class' => 'form-control',
           'required'                      => 'required',
           'data-parsley-trigger'          => 'change focusout',
           ]) !!}
        <span class="text-danger">{{ $errors->first('zip') }}</span>
    </div>
</div>--}}
