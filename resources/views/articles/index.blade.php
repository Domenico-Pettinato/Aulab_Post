<x-layout>

    @foreach ($articles as $article)
    <article>
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
    </article>
    @endforeach
</x-layout>

