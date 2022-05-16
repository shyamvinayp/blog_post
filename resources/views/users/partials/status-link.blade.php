@if($user->status == 1)
<a onclick="return confirm('Are you sure you want to activate {{ $user->name }}?')" href="{{route('users.changeStatus', $user->id)}}"   class="edit btn btn-primary btn-sm">Activate</a>
@else
<a onclick="return confirm('Are you sure you want to deactivate {{ $user->name }}?')" href="{{route('users.changeStatus', $user->id)}}"   class="edit btn btn-secondary btn-sm">Deactive</a>
@endif

