<x-layout>
    <div class="container mt-5 text-center">
        <h1 class="display-1">Articoli della categoria "{{ $category->name }}"</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem; border: 1px solid #ccc">
                    <img src="https://picsum.photos/{{ 300 + $article->id }}" class="card-img-top" alt="Immagine di esempio">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>

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

                        <p class="card-text">Autore: {{ $article->user->name }}</p>
                        <p class="card-text small text-muted">Tag:
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p>
                        <!-- <p class="card-text">{{ $article->body }}.</p> -->
                        <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-outline-primary btn-sm">Leggi Articolo</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>