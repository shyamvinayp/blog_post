@extends('adminlte::page')
@section('content')
<div class="container">
    <script src="{!! asset('js/datatables/jquery.js') !!}"></script>
    <div class="row justify-content-center">
        @include('flash-message')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.email_address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('messages.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{URL::to('/')}}/forget-password/">
                                        {{ __('messages.forgot_password') }}
                                    </a>

                                @endif
								{{--<a class="btn btn-link" href="{{ route('users.create') }}">
                                        {{ __('messages.register_new_user') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('contacts.create') }}">
                                    {{ __('messages.create_contact') }}
                                </a>--}}

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.register').on('click', function (){
                let dataToggleVal = $(this).attr('data-toggle');
                if(dataToggleVal === 'dropdown'){
                    let url = $(this).attr('href');
                    //let url = document.location.origin+'/users/create';
                    window.location.href= url;
                }
            })

        });
    </script>

</div>
@endsection
