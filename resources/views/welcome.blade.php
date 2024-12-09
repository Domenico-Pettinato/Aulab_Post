<x-layout>
    <!-- Messaggio di errore -->
    @if (session('alert'))
    <div class="alert alert-danger text-center w-auto mx-auto my-3" style="max-width: 500px;">
        {{ session('alert') }}
    </div>
    @endif

    <!-- Messaggio di conferma -->
    @if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show w-auto text-center" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <!-- Card articoli -->
    <div class="container my-5">
        <div class="row g-4">
            @foreach ($articles as $article)
            <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</x-layout>