<x-layout>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @foreach ($articles as $article)
        <div class="container col-12 col-lg-6 mt-5 d-flex justify-content-center">
            <article>
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->body }}</p>
                <p>{{ $article->category->name ?? 'Categoria non disponibile' }}</p>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Immagine di {{ $article->title }}">
                <a href="{{ route('articles.show', $article) }}">Read more</a>  
            </article>
        </div>
    @endforeach
</x-layout>


