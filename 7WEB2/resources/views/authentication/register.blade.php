

<form action="{{ route('register') }}" method="POST">
    <label>Name</label>
    <input type="text" name="full_name" placeholder="full_name">
    <label>Email</label>
    <input type="email" name="email" placeholder="email">
    <label>Password</label>
    <input type="password" name="password" placeholder="password">
    <label>Retype password</label>
    <input type="password" name="password_comfirmation" placeholder="Retype password">
</form>


