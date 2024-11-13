<table class="table table-striped">
    <table class="table">
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
                    @if (is_null($article->is_accepted))
                    <a href="{{route('articles.show', $article)}}" class="btn btn-primary">Leggi Articolo</a>
                    @else
                    <form action="{{route('revisor.undoArticle', $article)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Riporta l'articolo in revisione</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</table>