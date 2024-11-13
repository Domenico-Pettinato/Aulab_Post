<x-layout>
    <!-- Messaggio di errore -->
    @if (session ('alert'))
    <div class="alert alert-danger">
        {{session('alert')}}
    </div>
    @endif

<!-- Messaggio di conferma  -->
@if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show w-auto" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif


    <div class="container mt-5">
        <div class="row">
            <!-- card -->
            @foreach ($articles as $article)
            <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                <div class="card " style="width: 18rem; border: 1px solid #ccc;">
                    <img src="https://picsum.photos/{{ 300 + $article->id }}" class="card-img-top" alt="Immagine di esempio">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">Categoria:
                            <a href="{{ route('articles.bycategory', $article->category) }}">{{$article->category->name}}</a>
                        </p>
                        <p class="card-text">Autore:
                            <a href="{{ route('articles.byuser', $article->user) }}">{{$article->user->name}}</a>
                        </p>
                        <!-- <p class="card-text">{{$article->body}}</p> -->
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-primary">Leggi Articolo</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>