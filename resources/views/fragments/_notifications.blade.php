@if ($message = Session::get('notif'))
    <div class="alert alert-primary">{{ $message }}</div>
@endif
