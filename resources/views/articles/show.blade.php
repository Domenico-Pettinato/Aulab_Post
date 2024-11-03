<x-layout>
    <div class="container mt-5">
        <div class="row">
            <!-- card -->
            <div class=" mb-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem; border: 1px solid #ccc">
                    <img src="https://picsum.photos/{{ 300 + $article->id }}" class="card-img-top" alt="Immagine di esempio">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">Categoria: {{$article->category->name}}</p>
                        <p class="card-text">Autore: {{$article->user->name}}</p>
                        <p class="card-text">{{$article->body}}.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('articles.index')}}" class="btn btn-primary">Torna alla lista degli articoli</a>
                    </div>
                </div>
            </div>
        </div>
</x-layout>