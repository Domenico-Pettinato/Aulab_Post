<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 mb-4">
                <div class="card shadow-sm" style="border-radius: 8px; overflow: hidden;">
                    <img src="https://picsum.photos/{{ 500 + $article->id }}" class="card-img-top" alt="Immagine di esempio" style="height: 250px; object-fit: cover;">

                    <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">{{ $article->title }}</h4>
                        <p class="card-text mb-2"><strong>Categoria:</strong> {{ $article->category->name }}</p>
                        <p class="card-text mb-2"><strong>Autore:</strong> {{ $article->user->name }}</p>
                        <p class="card-text">{{ $article->body }}</p>
                    </div>

                    @if (Auth::user() && Auth::user()->is_revisor)
                        <!-- Pulsanti per revisore -->
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
                        <!-- Pulsante per gli utenti non revisori -->
                        <div class="card-footer text-center bg-light">
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-primary btn-sm mb-2">Torna alla lista degli articoli</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
