@if (Auth::guard('web')->check())
    <p class="text-success">
        You are Logged in as <strong>USER</strong>
    </p>

@else
    <p class="text-danger">
        You are Logged Out as a <strong>USER</strong>
    </p>

@endif

@if (Auth::guard('admin')->check())
    <p class="text-success">
        You are Logged in as <strong>ADMIN</strong>
    </p>

@else
    <p class="text-danger">
        You are Logged Out as a <strong>ADMIN</strong>
    </p>

@endif


@if (Auth::guard('tutor')->check())
    <p class="text-success">
        You are Logged in as a <strong>Tutor</strong>
    </p>
@else
    <p class="text-danger">
        You are Logged out as a <strong>Tutor</strong>
    </p>

@endif
