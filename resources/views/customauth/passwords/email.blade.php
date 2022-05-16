@extends('adminlte::page')

@section('content')
<div class="container">
    <script src="{!! asset('js/datatables/jquery.js') !!}"></script>
    <div class="row justify-content-center">
        @include('flash-message')

        @if(isset($token))

        <div class="primary">
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}

                {{ __('OR') }}  <a href="http://payment.system.com/reset-password/{{ $token }}">Click Here</a>.
            </div>

        </div>
        @endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--<form method="POST" action="/forget-password">--}}
                        {!! Form::open(['route'=>'forget-password', 'id' => 'payment-system-main-form', 'class' => 'dirtyforms']) !!}

                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   {{-- {{ __('Send Password Reset Link') }}--}}
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.register').on('click', function (){
                let dataToggleVal = $(this).attr('data-toggle');
                if(dataToggleVal === 'dropdown'){
                    //let url = $(this).attr('href');
                    let url = document.location.origin+'/customers/create';
                    window.location.href= url;
                }
            })

        });
    </script>
</div>
@endsection

