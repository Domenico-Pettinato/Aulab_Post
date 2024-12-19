<x-layout>

    <!-- Validazione del login -->
    @if ($errors->any())
    <div class="alert alert-danger text-center mx-auto mt-3" style="max-width: 500px;">
        @foreach ($errors->all() as $error)
        <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <form method="POST" action="{{ route('login') }}" class="p-4 shadow-lg rounded " style="max-width: 400px; width: 100%;">
            @csrf
            <h1 class="h3 mb-4 text-center text-primary fw-bold">Sign In</h1>

            <!-- Campo Email -->
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email Address</label>
            </div>

            <!-- Campo Password -->
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <!-- Checkbox Remember Me -->
            <div class="form-check text-start mb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label text-muted" for="flexCheckDefault">Remember me</label>
            </div>

            <!-- Pulsante di Login -->
            <button class="btn btn-primary w-100 py-2" type="submit">Sign In</button>

            <!-- Messaggio di successo -->
            @if (session('success'))
            <div class="alert alert-success text-center mt-3" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </form>
    </div>

</x-layout>
