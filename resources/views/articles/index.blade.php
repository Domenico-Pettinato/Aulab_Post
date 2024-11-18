<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            
            <!-- Card articoli -->
            @foreach ($articles as $article)
                <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex justify-content-center">
                    <div class="card shadow-sm" style="width: 100%; max-width: 20rem; border: none;">
                        <img src="https://picsum.photos/{{ 300 + $article->id }}" class="card-img-top rounded-top" alt="Immagine di esempio">
                        
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $article->title }}</h5>
                            
                            @if ('$article->category')
                        <p class="card-text small text-secondary">
                            Categoria:
                            <a href="{{ route('articles.bycategory', $article->category) }}" class="text-decoration-none text-capitalize">{{ $article->category->name }}</a>
                        </p>
                        @else
                        <p class="card-text small text-secondary">Nessuna categoria</p>
                        @endif
                        
                        <p class= "small text-muted my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                            </p>
                            <p class="card-text small text-muted">
                                <strong>Autore:</strong>
                                <a href="{{ route('articles.byuser', $article->user) }}" class="text-primary text-decoration-none">{{ $article->user->name }}</a>
                            </p>
                            <p class="card-text small text-muted">Tag:
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p>
                        </div>
                        
                        <div class="card-footer text-center border-0 bg-light">
                            <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-outline-primary btn-sm">Leggi Articolo</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Paginazione -->
            <div class="d-flex justify-content-center mt-4">
                {{ $articles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</x-layout>
