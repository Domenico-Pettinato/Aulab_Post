<x-layout>      
    <div class="container mt-5 flex flex-col items-center justify-center gap-12 px-4 py-16">                
        <h1 class="text-5xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white md:text-[5rem]">Laravel</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-8">
            <h1 class="display-1">Ssc Bari Post</h1>
            <h2 class="display-2">Articoli dell utente "{{$user->name}}"</h2>
        </div>
        <!-- card -->
        @foreach ($articles as $article)
        <div class="container mt-5 ">
            <div class="card" style="width: 18rem; border: 1px solid #ccc">
                <img src="https://picsum.photos/{{ 300 + $article->id }}" class="card-img-top" alt="Immagine di esempio">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">Categoria: {{$article->category->name}}</p> 
                    <p class="card-text">Autore: {{$article->user->name ?? 'Autore non disponibile'}}</p>
                    <p class="card-text">{{$article->body}}.</p>
                    <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>  
</x-layout>