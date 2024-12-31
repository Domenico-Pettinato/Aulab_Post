<table class="table table-striped">
    
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Writer</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->user->name }}</td>
                <td>{{ $article->body }}</td>

                <td>
                    @if ($article->is_accepted === null)
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi Articolo</a>
                    @else
                    <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Riporta l'articolo in revisione
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    
    
</table>
<!-- <div class="card-footer text-center bg">
        <a href="/" class="btn btn-dark btn-sm mb-2">HomePage</a>
    </div> -->