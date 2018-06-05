@if(Auth::guard('admin')->check())
    <p>You are logged in as <strong>admin</strong></p>
@else
    <p class="text-danger">
        You are logged out as a <strong>admin</strong>
    </p>
@endif


@if(Auth::guard('web')->check())
    <p>You are logged in as <strong>customer</strong></p>
@else
    <p class="text-danger">
        You are logged out as a <strong>customer</strong>
    </p>
@endif