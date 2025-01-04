<div class="col-12 col-sm-6 col-lg-4 mt-5 d-flex justify-content-center">
    <div class="card h-100 shadow-sm border-0" style="width: 18rem;">


        <!-- Immagine -->
        <div class="position-relative">
            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
            <span class="badge bg-primary position-absolute top-0 start-0 m-2 px-3 py-2 text-uppercase">Popolare</span>
        </div>


        <!-- Corpo della card -->
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title text-dark fw-bold">{{ $article->title }}</h5>
                @if ('$article->category')
                <p class="card-text text-muted small mb-2">
                    Categoria:
                    <a href="{{ route('articles.bycategory', $article->category) }}" class="text-decoration-none text-capitalize">{{ $article->category->name }}</a>
                </p>
                @else
                <p class="card-text text-muted small mb-2">Nessuna categoria</p>
                @endif

                <p class="card-text small text-muted mb-2">
                    Autore:
                    <a href="{{ route('articles.byuser', $article->user) }}" class="text-primary text-decoration-none">{{ $article->user->name }}</a>
                </p>

                <p class="card-text small text-muted mb-2">Tag:
                    @foreach ($article->tags as $tag)
                    #{{ $tag->name }}
                    @endforeach
                </p>
                <p class="card-text text-muted small mb-2">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
            </div>
            
            
            <div class="card-footer bg-transparent text-center">
                <a href="{{ route('articles.show', ['article' => $article->slug]) }}" class="btn btn-primary w-100">Leggi Ricetta</a>
            </div>
        </div>
    </div>
</div>