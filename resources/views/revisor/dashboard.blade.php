<x-layout>
<div class="container-fluid p-5  text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Bentornato,<br> revisore {{ Auth::user()->name }}!</h1>
            </div>
        </div>
    </div>

  <!-- Messaggio di conferma  -->
@if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show w-auto" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

    <div class="container-fluid p-5  text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Articoli da revisionare</h1>
                <x-revisor-articles-table :articles="$unrevisonedArticles" />
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Articoli confermati</h1>
                <x-revisor-articles-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Articoli rifiutati</h1>
                <x-revisor-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>
</x-layout>
