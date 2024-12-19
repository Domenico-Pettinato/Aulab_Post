<x-layout>
    <!-- Validazione della registrazione -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <form action="{{ route('register') }}" method="POST" class="p-4 shadow-lg rounded " style="max-width: 400px; width: 100%;">
            @csrf
            <h1 class="h3 mb-4 text-center text-primary fw-bold">Register</h1>

            <!-- Messaggi di errore -->
            @if ($errors->any())
            <div class="alert alert-danger text-center" style="max-width: 100%;">
                <ul class="mb-0" style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Campo Nome Completo -->
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Full Name" required>
                <label for="Name">Full Name</label>
            </div>

            <!-- Campo Email -->
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                <label for="email">Email</label>
            </div>

            <!-- Campo Password -->
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                <label for="password">Password</label>
            </div>

            <!-- Campo Conferma Password -->
            <div class="form-floating mb-3">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Repeat Password" required>
                <label for="password_confirmation">Repeat Password</label>
            </div>

            <!-- Termini e Condizioni -->
            <p class="text-muted small text-center mt-3">
                By creating an account, you agree to our <a href="#" class="text-primary">Terms & Privacy</a>.
            </p>

            <!-- Pulsante di Registrazione -->
            <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
        </form>
    </div>
</x-layout>

