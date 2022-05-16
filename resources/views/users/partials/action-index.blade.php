@php $id = 10; @endphp

@if(Auth::user())
    @if(Auth::user()->type === 1 || Auth::user()->type === 2)
        <div class="text-center" style="width:100%; min-width:80px">
            <a href="{{URL::to('/')}}/users/{{ $user->id }}/edit"   class="btn btn-xs btn-info" style="padding: 8px 13px;"><i class="fa fa-edit"></i></a>
            <form method="POST" action="{{URL::to('/')}}/users/{{ $user->id }}" accept-charset="UTF-8" style="display:inline;">
                <input name="_method" value="DELETE" type="hidden"><input name="_token" value="{{ csrf_token() }}" type="hidden">
                <button class="btn btn-xs btn-danger user-del-btn" style="padding: 8px 13px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
            <a class="btn btn-primary p-sm-1 pl-1 pr-1" href="{{URL::to('/')}}/payments/makePayment" >Donate</a>
            {{--<a href="{{URL::to('/')}}/users/{{ $user->id }}/view" class="btn btn-xs btn-info" style="padding: 8px 13px; margin-right:3px;"><i class="fa fa-eye"></i></a>
            @if($user->attendance_user_id)
                <a href="{{URL::to('/')}}/user/attendance/{{ $user->attendance_user_id }}/view"   class="btn btn-xs btn-info" style="padding: 5px 13px;"><i class="fa fa-view"></i>{{ __('messages.attendance_summary') }}</a>
            @endif--}}
        </div>
   {{-- @elseif(Auth::user()->type === 3)
        <div class="text-center" style="width:100%; min-width:80px">
            <a href="{{URL::to('/')}}/uploads/{{ $upload->id }}/view" class="btn btn-xs btn-info" style="padding: 8px 13px;"><i class="fa fa-eye"></i></a>
        </div>--}}
    @endif

@endif
