<form method="post">
    @csrf
    <input placeholder="Name" name="name" required>
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" value="Log In">
</form>
