<x-layout>
    <form method="post" action="{{ route('login')}}">
        <h1>Login</h1>
        <input type="text" id="username" placeholder="Username" name="username">
        <input type="password" id="password" placeholder="Password" name="password">
        <button type="submit" name="login">Accedi</button>
    </form>
</x-layout>