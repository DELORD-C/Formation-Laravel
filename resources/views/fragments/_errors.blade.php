@if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">{{ $message }}</div>
@endif
