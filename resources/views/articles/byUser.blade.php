<x-layout>
    <div class="container mt-5 text-center">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-8">
            <h2 class="display-2">Articoli dell'utente "{{$user->name}}"</h2>
        </div>

        <!-- card -->
        <div class="row g-4 mt-5">
            @foreach ($articles as $article)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-start card-img-top" alt="{{ $article->title }}">

                    <div class="card-body border-1 border-top-0">
                        <h5 class="card-title text-dark fw-bold">{{ $article->title }}</h5>
                        @if ('$article->category')
                        <p class="card-text text-muted small mb-2">
                            Categoria:
                            <a href="{{ route('articles.bycategory', $article->category) }}" class="text-dark text-decoration-none">{{ $article->category->name }}</a>
                        </p>
                        @else
                        <p class="card-text text-muted small mb-2">Nessuna categoria</p>
                        @endif

                        <!-- <p class= "small text-muted my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p> -->



                        <p class="card-text text-muted small mb-2">Pubblicato il {{ $article->created_at->format('d/m/Y') }}</p>
                        <p class="card-text text-muted small mb-2">Da <a href="{{ route('articles.byuser', $article->user) }}" class="text-dark text-decoration-none">{{ $article->user->name }}</a></p>
                        <p class="card-text text-muted small mb-2">Tag:
                            @foreach ($article->tags as $tag)
                            <span class="card-text text-muted small mb-2">#{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-primary btn-sm">Leggi</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</x-layout>