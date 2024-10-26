<x-layout>
    <form method="post" action="{{route('register')}}">
        @csrf
        <h1>Registrazione</h1>
        <input type="text" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
        @error('username')
        <div style="color:red">{{ $message }}</div>
        @enderror

        <input type="password" id="password" placeholder="Password" name="password" required>
        @error('password')
        <div style="color:red">{{ $message }}</div>
        @enderror
        <input type="password" id="password_confirmation" placeholder="Conferma Password" name="password_confirmation" required>

        <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <div style="color:red">{{ $message }}</div>
        @enderror

        <button type="submit" name="register">Registrati</button>
        @if (session('success'))
        <div style="color:green">{{ session('success') }}</div>
        @endif
    </form>
</x-layout>