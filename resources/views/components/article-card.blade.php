<div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
    <div class="card h-100 shadow-sm border-0" style="width: 18rem;">
        <img src="https://picsum.photos/{{ 300 + $article->id }}" class="card-img-top" alt="Immagine di esempio per {{$article->title}}">

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

            <p class="card-text small text-muted">
                Autore:
                <a href="{{ route('articles.byuser', $article->user) }}" class="text-primary text-decoration-none">{{ $article->user->name }}</a>
            </p>

            <p class="card-text small text-muted">Tag:
                @foreach ($article->tags as $tag)
                #{{ $tag->name }}
                @endforeach
            </p>
        </div>
        <p class="card-subtitle mb-2 text-muted small">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
        <div class="card-footer bg-white text-center">
            <a href="{{ route('articles.show', ['article' => $article->slug]) }}" class="btn btn-outline-primary btn-sm">Leggi Articolo</a>
        </div>
    </div>
</div>