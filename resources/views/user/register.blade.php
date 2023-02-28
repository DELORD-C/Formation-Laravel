<form method="post">
    @csrf
    @if ($errors->has('name'))
        <span>{{$errors->first('name')}}</span>
    @endif
    <input placeholder="Name" name="name" required>
    @if ($errors->has('email'))
        <span>{{$errors->first('email')}}</span>
    @endif
    <input type="email" placeholder="Email" name="email" required>
    @if ($errors->has('password'))
        <span>{{$errors->first('password')}}</span>
    @endif
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" value="Log In">
</form>
