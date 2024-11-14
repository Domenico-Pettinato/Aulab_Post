<x-layout>

    <!-- Messaggio di errore -->
    @if (session('alert'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid py-5 bg-light text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="mb-4">Pagina Candidature</h1>
                <p class="text-muted mb-4">Compila il modulo per inviare la tua candidatura alle posizioni disponibili</p>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-12">
                            <!-- Form per l'invio dei dati -->
                            <form method="POST" action="{{ route('candidature.submit') }}" class="p-4 border rounded-3 bg-white shadow">
                                @csrf
                                
                                <!-- Selezione Ruolo -->
                                <div class="mb-3">
                                    <label for="role" class="form-label fw-semibold">Ruolo di Candidatura</label>
                                    <select id="role" class="form-select" name="role" required>
                                        <option value="" selected disabled>Seleziona il ruolo desiderato</option>
                                        <option value="revisore">Revisore</option>
                                        <option value="redattore">Redattore</option>
                                    </select>
                                </div>

                                <!-- Input Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="Inserisci la tua email" value="{{ old('email') }}" required>
                                </div>

                                <!-- Messaggio di Presentazione -->
                                <div class="mb-3">
                                    <label for="message" class="form-label fw-semibold">Messaggio di Presentazione</label>
                                    <textarea id="message" class="form-control" name="message" rows="4" placeholder="Scrivi un breve messaggio di presentazione">{{ old('message') }}</textarea>
                                </div>

                                <!-- Bottone Invia Candidatura -->
                                <button class="btn btn-outline-primary btn-sm w-100" type="submit">Invia Candidatura</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Bottone Indietro -->
                    <div class="col-12 text-center mt-4">
                        <a href="{{ route('homepage') }}" class="btn btn-outline-secondary btn-sm">Indietro alla Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
