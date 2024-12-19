<x-layout>
    <!-- Card articoli -->
    <div class="container mt-5">
        <div class="row g-4">
            @foreach ($articles as $article)
            <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>

    <!-- Paginazione -->
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links('pagination::bootstrap-4') }}
    </div>
</x-layout>