<x-layout>
    <h1>Dashboard</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                <h1 class="display-2">Bentornato, Amministartore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>

    @if (session('message))
    <div class="alert alert-success mt-1">
        {{ session('message') }}
    </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                <h1 class="display-2">Richieste per il ruolo di Amministartore</h1>
                <x-request-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                <h1 class="display-2">Richieste per il ruolo di Revisore</h1>
                <x-request-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                <h1 class="display-2">Richieste per il ruolo di redattore</h1>
                <x-request-table :roleRequests="$wrtiterRequests" role="redattore" />
            </div>
        </div>
    </div>
</x-layout>


  
    





    </x-request-table>
</x-layout>