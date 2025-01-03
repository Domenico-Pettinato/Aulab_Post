<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-primary">Articoli trovati per "{{$query}}"</h1>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($articles as $article)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-start card-img-top" alt="{{ $article->title }}">

                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{$article->title}}</h5>
                        
                        @if ('$article->category')
                        <p class="card-text small text-secondary">
                            Categoria:
                            <a href="{{ route('articles.bycategory', $article->category) }}" class="text-decoration-none text-capitalize">{{ $article->category->name }}</a>
                        </p>
                        @else
                        <p class="card-text small text-secondary">Nessuna categoria</p>
                        @endif
                       
                        <!-- <p class= "small text-muted my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p> -->
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <div class="small text-muted">
                            <p class="mb-1">Pubblicato il {{$article->created_at->format('d/m/Y')}}</p><br>
                            <p class="mb-0">Da <a href="{{ route('articles.byuser', $article->user) }}" class="text-primary text-decoration-none">{{$article->user->name}}</a></p><br>
                            <p class="card-text small text-muted">Tag:
                                @foreach ($article->tags as $tag)
                                #{{ $tag->name }}
                                @endforeach
                            </p>
                        </div>
                        <a href="{{route('articles.show', $article)}}" class="btn btn-outline-primary btn-sm">Leggi</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>