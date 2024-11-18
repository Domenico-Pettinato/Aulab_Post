<x-layout 
    :metaTitle="$article->title" 
    :metaDescription="Str::limit($article->body, 150)" 
    :metaKeywords="$article->tags->pluck('name')->implode(', ')">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 mb-4">
                <div class="card shadow-sm" style="border-radius: 8px; overflow: hidden;">
                    <img src="https://picsum.photos/{{ 500 + $article->id }}" class="card-img-top" alt="Immagine di esempio" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">{{ $article->title }}</h4>
                        @if ('$article->category')
                            <p class="card-text small text-secondary">
                                Categoria:
                                <a href="{{ route('articles.bycategory', $article->category) }}" class="text-decoration-none text-capitalize">{{ $article->category->name }}</a>
                            </p>
                        @else
                            <p class="card-text small text-secondary">Nessuna categoria</p>
                        @endif
                        <p class="small text-muted my-0">
                            @foreach ($article->tags as $tag)
                                #{{ $tag->name }}
                            @endforeach
                        </p>
                        <p class="card-text small text-muted mb-2"><strong>Autore:</strong> {{ $article->user->name }}</p>
                        <p class="card-text mb-2">{{ $article->body }}</p>
                    </div>
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <div class="card-footer text-center bg-light">
                            <a href="{{ route('revisor.dashboard') }}" class="btn btn-outline-primary btn-sm mb-2">Torna alla lista degli articoli</a>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Accetta Articolo</button>
                                </form>
                                <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Rifiuta Articolo</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card-footer text-center bg-light">
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-primary btn-sm mb-2">Torna alla lista degli articoli</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
