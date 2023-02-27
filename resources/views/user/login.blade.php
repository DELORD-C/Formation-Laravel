<form method="post">
    @csrf
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" value="Log In">
</form>
