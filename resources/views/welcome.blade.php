<x-layout>
    <!-- Messaggio di errore -->
    @if (session('alert'))
    <div class="alert alert-danger text-center w-auto mx-auto my-3" style="max-width: 500px;">
        {{ session('alert') }}
    </div>
    @endif

    <!-- Messaggio di conferma -->
    @if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show w-auto text-center" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container my-5">
        <div class="row g-4">
            <!-- Tag --> <!-- card -->

            @foreach ($articles as $article)

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

                    <div class="card-footer bg-white text-center">
                        <a href="{{ route('articles.show', ['article' => $article->slug]) }}" class="btn btn-outline-primary btn-sm">Leggi Articolo</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>