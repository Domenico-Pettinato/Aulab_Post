<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
    <!-- Messaggio di errore -->
    @if (session ('alert'))
    <div class="alert alert-danger">
        {{session('alert')}}
    </div>
    @endif
    
  <!-- Messaggio di conferma  -->
@if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show w-auto" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

    {{-- @dd($adminRequest); --}}

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Richieste per il ruolo di Amministratore</h1>
                <x-request-table :roleRequests="$adminRequest" role="amministratore" />
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Richieste per il ruolo di Revisore</h1>
                <x-request-table :roleRequests="$revisorRequest" role="revisore" />
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Richieste per il ruolo di Redattore</h1>
                <x-request-table :roleRequests="$writerRequest" role="redattore" />
            </div>
        </div>
    </div>

    <!-- Pulsante Homepage come Link -->
    <div class="container mt-5">
        <a href="{{ route('homepage') }}" class="btn btn-primary w-100 py-2">Homepage</a>
    </div>

</x-layout>