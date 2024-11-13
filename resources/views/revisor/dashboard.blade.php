<x-layout>
<div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Bentornato, Revisore {{ Auth::user()->name }}!</h1>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success mt-1">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Articoli da revisionare</h1>
                <x-articles-table :articles="$unrevisonedArticles" />
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Articoli confermati</h1>
                <x-articles-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 bg-secondary-subtle text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-2">Articoli rifiutati</h1>
                <x-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>
</x-layout>
