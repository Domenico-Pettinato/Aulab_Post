<x-layout
    :metaTitle="$article->title"
    :metaDescription="Str::limit($article->body, 150)"
    :metaKeywords="$article->tags->pluck('name')->implode(', ')">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 mb-4">
                <div class="card shadow-lg border-0" style="border-radius: 12px; overflow: hidden;">
                    <!-- Immagine più grande -->
                     @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" 
                             class="card-img-top img-fluid" 
                             alt="{{$article->title}}" 
                             style="height: 400px; object-fit: cover;">
                    @else
                    <img src="https://picsum.photos/{{ 700 + $article->id }}" 
                         class="card-img-top img-fluid" 
                         alt="Immagine articolo" 
                         style="height: 400px; object-fit: cover;">
                    @endif
                    
                    <div class="card-body px-4 py-5">
                        <!-- Titolo accattivante -->
                        <h1 class="card-title text-dark fw-bold mb-3">{{ $article->title }}</h1>
                        
                        <!-- Categoria -->
                        @if ('$article->category')
                            <p class="text-secondary mb-2">
                                <span class="fw-semibold">Categoria:</span> 
                                <a href="{{ route('articles.bycategory', $article->category) }}" 
                                   class="text-decoration-none text-dark text-capitalize">
                                   {{ $article->category->name }}
                                </a>
                            </p>
                        @else
                            <p class="text-secondary mb-2">Nessuna categoria</p>
                        @endif
                        
                        <!-- Tag -->
                        <div class="mb-3">
                            @foreach ($article->tags as $tag)
                                <span class="badge bg-light text-danger me-1">#{{ $tag->name }}</span>
                            @endforeach
                        </div>

                        <!-- Autore -->
                        <p class="small text-muted mb-4">
                            <strong>Autore:</strong> {{ $article->user->name }}
                        </p>

                        <!-- Descrizione articolo -->
                        <div class="card-text">
                            <p class="text-dark" style="line-height: 1.8;">
                                {{$article->body}}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Footer con pulsanti -->
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <div class="card-footer  text-center py-3">
                            <a href="{{ route('revisor.dashboard') }}" class="btn btn-outline-secondary btn-sm mb-2">
                                Torna alla lista degli articoli
                            </a>
                            <div class="d-flex justify-content-center gap-3 mt-2">
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
                        <div class="card-footer text-center py-3">
                            <a href="/" class="btn btn-dark btn-sm">Torna alla lista degli articoli</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
