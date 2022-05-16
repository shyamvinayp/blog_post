<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ 'Title' }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::text('title', null, [
          'class' => 'form-control',
          'required'                      => 'required',
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ 'Description' }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::textarea('description', null, [
            'class' => 'form-control',
            'required'                      => 'required',
            'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('description') }}</span>
    </div>
</div>
