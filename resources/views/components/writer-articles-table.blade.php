<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Data di pubblicazione</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <th scope="row">{{ $article->id }}</th>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name ?? 'N/A' }}</td>
            <td>
                @foreach ($article->tags as $tag)
                #{{ $tag->name }}
                @endforeach
            </td>
            <td>{{ $article->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{route('articles.show', $article)}}" class="btn btn-primary">Leggi Articolo</a>
                <a href="{{route('articles.edit', $article)}}" class="btn btn-primary">Modifica Articolo</a>
                <form action="{{route('articles.destroy', $article)}}" method="POST" class="btn btn-danger">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina Articolo</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>