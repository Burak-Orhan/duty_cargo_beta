<form action="{{ route("register.post") }}" method="post">

    @csrf

    <input type="text" name="name" id="name">
    <input type="text" name="email" id="email">
    <input type="text" name="phone" id="phone">
    <input type="text" name="address" id="address">
    <input type="password" name="password" id="password">
    <input type="password" name="password_confirmation" id="password_confirmation">
    <button type="submit">Gönder</button>
</form>